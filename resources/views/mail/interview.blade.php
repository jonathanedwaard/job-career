<!DOCTYPE html>
<html>
<head>
    <title>Interview Invitation</title>
</head>
<body>
    <h1>Interview Invitation</h1>
    <p>Dear {{ $candidateName }},</p>
    <p>We are pleased to invite you for an interview at JobCareer.</p>
    <p><strong>Interview Date:</strong> {{ $interviewDate }}</p>
    <p><strong>Interview At  :</strong> Jl. Jalur Sutera Bar. No.Kav. 21, RT.001/RW.004, Panunggangan, Kec. Pinang, Kota Tangerang, Banten 15143 </p>
    <p>We look forward to meeting you and discussing your qualifications in more detail.</p>
    <p>Best regards,</p>
    <p>{{ Auth::user()->name }}</p>
</body>
</html>
