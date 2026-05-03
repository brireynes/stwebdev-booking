<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
</head>
<body>
    <h2>New Contact Message - Bong's Salon</h2>

    <p><strong>Name:</strong> {{ $contactMessage->name }}</p>
    <p><strong>Email:</strong> {{ $contactMessage->email }}</p>
    <p><strong>Subject:</strong> {{ $contactMessage->subject ?? 'No subject' }}</p>

    <p><strong>Message:</strong></p>
    <p>{{ $contactMessage->message }}</p>
</body>
</html>