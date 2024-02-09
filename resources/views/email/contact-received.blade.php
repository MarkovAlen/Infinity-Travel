<!DOCTYPE html>
<html>
<head>
    <title>Contact Received</title>
</head>
<body>
    <h1>Contact Received</h1>
    <p>Dear {{ $contact->name }},</p>
    <p>Thank you for contacting us. We have received your message and will get back to you as soon as possible.</p>
    <p>Message Details:</p>
    <ul>
        <li>Name: {{ $contact->name }}</li>
        <li>Email: {{ $contact->email }}</li>
        <li>Message: {{ $contact->message }}</li>
    </ul>
    <p>Best regards,<br> Infinity Travel</p>
</body>
</html>
