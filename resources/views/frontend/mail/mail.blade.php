<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <h1>Contact Message</h1>
    <p><strong>Name:</strong>{{$details['name']}}</p>
    <p><strong>Email:</strong>{{$details['email']}}</p>
    <p><strong>Subject:</strong>{{$details['subject']}}</p>
    <p><strong>Message:</strong>{{$details['message']}}</p>
</body>
</html>