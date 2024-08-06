<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Cards</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0;
            background-image:url('https://thumb.ac-illust.com/0d/0d0ac07f033bc554c0113106f08ee5c3_t.jpeg');
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .card {
            width: 200px;
            height: 150px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
            cursor: pointer;
        }
        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .card h2 a{
            font-size: 20px;
            color: #333;
        }
        .card p {
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
<center><h1 style="font-family: 'Times New Roman', Times, serif;">Departments</h1></center>
<div class="container">
    <div class="card">
        <h2><a href="cs.php">CSE</a></h2>
        <p>Computer Science and Engineering</p>
    </div>
    <div class="card">
        <h2><a href="ee.php">EE</a></h2>
        <p>Electrical Engineering</p>
    </div>
    <div class="card">
        <h2><a href="ece.php">ECE</a></h2>
        <p>Electronics and Communication Engineering</p>
    </div>
    <div class="card">
        <h2><a href="mech.php">MECH</a></h2>
        <p>Mechanical Engineering</p>
    </div>
    <div class="card">
        <h2><a href="it.php">IT</a></h2>
        <p>Information Technology</p>
    </div>
    <div class="card">
        <h2><a href="civil.php">CIVIL</a></h2>
        <p>Civil Engineering</p>
    </div>
</div>

</body>
</html>

