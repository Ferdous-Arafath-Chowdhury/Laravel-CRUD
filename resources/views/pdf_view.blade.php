<!DOCTYPE html>
<html>
<head>
    <title>Student Admit Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .admit-card {
            border: 2px solid #000;
            padding: 20px;
            width: max-content;
            margin: 0 auto;
           
            background-color: #fff;
            position: relative;
        }

        .header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .student-info {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .student-image {
            max-width: 150px;
            max-height: 150px;
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 20px;
        }

        img 
        {
            width: 50;
            height: 50;
        }
    </style>
</head>
<body>
    <div class="admit-card">
        <img src="{{ $imageUrl }}" alt="Student Image" class="student-image">
        <div class="header">Student Admit Card</div>
        <div class="student-info">Registration No: {{ $student->id }}</div>
        <div class="student-info">Name: {{ $student->Name }}</div>
        <div class="student-info">Class: {{ $student->Class }}</div>
        <div class="student-info">Address: {{ $student->Address }}</div>
     
    </div>

    <div class="footer">
        This is an official admit card. Please keep it safe.
    </div>
</body>
</html>
