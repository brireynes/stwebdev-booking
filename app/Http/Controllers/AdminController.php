<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Service;
use App\Models\HomepageImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'totalBookings' => Booking::count(),
            'totalServices' => Service::count(),

            'recentBookings' => Booking::with(['user', 'service'])
                ->latest()
                ->take(5)
                ->get(),
        ]);
    }

    public function users()
    {
        $users = User::where('role', '!=', 'super_admin')->latest()->get();

        return view('admin.users', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $authUser = auth()->user();

        if ($authUser->id == $user->id) {
            return redirect()->back()->with('error', 'You cannot delete your own account.');
        }

        if ($user->role === 'admin' && $authUser->role !== 'super_admin') {
            return redirect()->back()->with('error', 'You do not have permission to delete admins.');
        }

        if ($user->role === 'super_admin') {
            return redirect()->back()->with('error', 'You cannot delete super admin users.');
        }

        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    public function bookings()
    {
        $bookings = Booking::with(['user', 'service'])
            ->latest()
            ->get();

        return view('admin.bookings', compact('bookings'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,completed,cancelled',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return redirect()->back()->with('success', 'Booking status updated successfully.');
    }

    public function services()
    {
        $services = Service::latest()->get();

        return view('admin.services.index', compact('services'));
    }

    public function createService()
    {
        return view('admin.services.create');
    }

    public function storeService(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'type' => 'required|in:service,package,promo',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $validated['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('services', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        Service::create($validated);

        return redirect()
            ->route('admin.services')
            ->with('success', 'Service created successfully.');
    }

    public function editService(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function updateService(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'type' => 'required|in:service,package,promo',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $validated['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('image')) {
            $this->deleteUploadedImageIfExists($service->image);

            $path = $request->file('image')->store('services', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        $service->update($validated);

        return redirect()
            ->route('admin.services')
            ->with('success', 'Service updated successfully.');
    }

    public function deleteService(Service $service)
    {
        $this->deleteUploadedImageIfExists($service->image);

        $service->delete();

        return redirect()
            ->route('admin.services')
            ->with('success', 'Service deleted successfully.');
    }

    public function homepageImages()
    {
        $homepageImages = HomepageImage::all();

        return view('admin.homepage-images.index', compact('homepageImages'));
    }

    public function updateHomepageImage(Request $request, HomepageImage $homepageImage)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $this->deleteUploadedImageIfExists($homepageImage->image);

        $path = $request->file('image')->store('homepage', 'public');

        $homepageImage->update([
            'image' => 'storage/' . $path,
        ]);

        return redirect()
            ->route('admin.homepage-images')
            ->with('success', 'Homepage image updated successfully.');
    }

    private function deleteUploadedImageIfExists(?string $image): void
    {
        if (!$image) {
            return;
        }

        // Only delete admin-uploaded images.
        // Do not delete seeded files like images/Haircut.png or images/home-hero.png.
        if (!str_starts_with($image, 'storage/')) {
            return;
        }

        $path = str_replace('storage/', '', $image);

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}