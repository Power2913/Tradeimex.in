<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Confirmation</title>
    <style>
        /* Your inline CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            animation: fadeIn 0.5s ease;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Mail from {{$formData['fname']}}!</h2>
        <ul style="list-style: none">
            <li><strong>First Name:</strong> {{$formData['fname'] }}</li>
            <li><strong>Last Name:</strong> {{$formData['lname'] }}</li>
            <li><strong>Email:</strong> {{ $formData['email'] }}</li>
            <li><strong>Phone:</strong> {{ $formData['number'] }}</li>
            <li><strong>Message:</strong> {{ $formData['msg'] }}</li>
            <li><strong>Apply:</strong> {{ $formData['apply'] }}</li>
        </ul>
       
    </div>
</body>
</html>
