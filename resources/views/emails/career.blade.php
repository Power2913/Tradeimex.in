<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Career Application</title>
</head>
<body>
    <h2>New Career Application</h2>

    <p>Name: {{ $formData['name'] }}</p>
    <p>Email: {{ $formData['email'] }}</p>
    <p>Phone Number: {{ $formData['number'] }}</p>
    <p>Date of Birth: {{ $formData['dob'] }}</p>
    <p>Position Applied For: {{ $formData['position'] }}</p>

    <hr>

    <p>Please find the attached CV.</p>
</body>
</html>
