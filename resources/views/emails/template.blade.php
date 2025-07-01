<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Message from Website</title>
</head>
<body>
    <h1>Message Notification</h1>

    @if(isset($data['cname']))
        {{-- Become a Partner Form --}}
        <p><strong>Company Name:</strong> {{ $data['cname'] }}</p>
        <p><strong>Company Website:</strong> <a href="{{ $data['cweb'] }}">{{ $data['cweb'] }}</a></p>
        <p><strong>Full Name:</strong> {{ $data['fullName'] }}</p>
        <p><strong>Title:</strong> {{ $data['title'] }}</p>
        <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Country:</strong> {{ $data['country'] }}</p>
        <p><strong>Message:</strong></p>
        <p>{{ $data['message'] }}</p>

    @else
        {{-- Contact Us Form --}}
        <p><strong>Name:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
        <p><strong>Message:</strong></p>
        <p>{{ $data['message'] }}</p>
    @endif
</body>
</html>
