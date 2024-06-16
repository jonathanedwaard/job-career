<!DOCTYPE html>
<html>
<head>
    <title>Accepted Candidate</title>
</head>
<body>
    <h1>Congratulations!</h1>
    <p>Dear {{ $candidateName }},</p>
    <p>We are pleased to inform you that you have been accepted to join our team at JobCareer.</p>
    <p>We were very impressed with your qualifications and experience. We believe you will be a great fit for our team and contribute significantly to our success.</p>
    <p>Please expect further communication from us regarding the next steps.</p>
    <p>Welcome aboard!</p>
    <p>Best regards,</p>
    <p>{{ Auth::user()->name }}</p>
</body>
</html>
