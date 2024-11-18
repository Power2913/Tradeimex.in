<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: left;
        }
        
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        
        p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Contact Information</h2>
        <p><strong>IP:</strong> {{$formData['user_ip']}}</p>
        <p><strong>Name:</strong> {{ $formData['name'] }}</p>
        <p><strong>Email:</strong> {{ $formData['email'] }}</p>
        <p><strong>Country Region:</strong> {{ $formData['country_region'] }}</p>
        <p><strong>Number:</strong> {{ $formData['number'] }}</p>
        <p><strong>Company:</strong> {{ $formData['company'] }}</p>
        <p><strong>Role:</strong> {{ $formData['role'] }}</p>
        <p><strong>Message:</strong> {{ $formData['message'] }}</p>
    </div>
</body>
</html>
