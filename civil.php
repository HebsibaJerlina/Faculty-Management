<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSE Department Faculties</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
            background-image:url('https://static.vecteezy.com/system/resources/previews/006/936/709/non_2x/space-particle-background-for-background-concept-free-photo.jpg');
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .faculty-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
            transition: box-shadow 0.3s ease-in-out;
            width: 300px;
            text-align: center;
        }
        .faculty-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .faculty-card h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }
        .faculty-card p {
            font-size: 16px;
            color: #666;
            margin-bottom: 5px;
        }
        .faculty-card a {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
        }
        .faculty-card a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="faculty-card">
        <h2>Dr. Emily Johnson</h2>
        <p>Professor</p>
        <p>Areas of Interest: Artificial Intelligence, Machine Learning</p>
        <a href="emily.php">View Profile</a>
    </div>
    <div class="faculty-card">
        <h2>Prof. Alex Smith</h2>
        <p>Associate Professor</p>
        <p>Areas of Interest: Data Science, Computer Vision</p>
        <a href="alex.html">View Profile</a>
    </div>
    <div class="faculty-card">
        <h2>Dr. Sarah Davis</h2>
        <p>Assistant Professor</p>
        <p>Areas of Interest: Software Engineering, Web Development</p>
        <a href="#">View Profile</a>
    </div>
    <!-- Add more faculty cards here -->
</div>

</body>
</html>