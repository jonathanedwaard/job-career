<!DOCTYPE html>
<html>
<head>
    <title>Application Update</title>
</head>
<body>
    <h1>Application Update</h1>
    <p>Dear {{ $candidateName }},</p>
    <p>We regret to inform you that your application to join our team at JobCareer has not been successful.</p>
    <p>We appreciate the time you took to apply and wish you the best in your future endeavors.</p>
    <p>Thank you.</p>
    <p>Best regards,</p>
    <p>{{ Auth::user()->name }}</p>
</body>
</html>
