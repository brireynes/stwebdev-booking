@extends('layouts.app')

@section('content')

<h2>Book Appointment</h2>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<form action="{{ route('booking.store') }}" method="POST">

@csrf

<label>Service</label>

<select name="service_id">

@foreach($services as $service)
    <option value="{{ $service->id }}">
        {{ $service->name }} - {{ $service->price }}
    </option>
@endforeach

</select>

<br><br>

<label>Date</label>
<input type="date" name="date">

<br><br>

<label>Time</label>
<input type="time" name="time">

<br><br>

<label>Stylist</label>
<input type="text" name="stylist">

<br><br>

<button type="submit">Book Now</button>

</form>

@endsection