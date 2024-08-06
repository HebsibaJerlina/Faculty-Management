<?php
session_start();

// Check if admin is already logged in, redirect to admin home page
if(isset($_SESSION['admin_id'])) {
    header("Location: admin_homepage.php");
    exit;
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "fdms";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Login functionality
if(isset($_POST['login'])) {
    $admin_name = $_POST['admin_name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE admin_name = '$admin_name' AND password = '$password'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['admin_id'] = $row['admin_id'];
        header("Location: admin_homepage.php");
        exit;
    } else {
        $error = "Invalid admin name or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image:url("https://media.istockphoto.com/id/872177140/photo/abstract-bokeh-lights-with-colorful-background.jpg?s=612x612&w=0&k=20&c=kePKjz9yBhgIOOQ-TmnyrQdlG9eYnfvdhXBszoT4l7s=");
            height:100%;
            background-repeat: repeat-y;
            background-size: cover;
            background-position: center;
        }
        .login-container {
            text-align: center;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
        .input-group {
            margin-bottom: 20px;
        }
        .input-group label {
            display: block;
            color: #333;
            margin-bottom: 5px;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-btn {
            width: 100%;
            background-color: #007bff;
            color: #fff;
            padding: 12px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        <?php if(isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <form method="post">
            <div class="input-group">
                <label for="admin_name">Admin Name:</label>
                <input type="text" id="admin_name" name="admin_name" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="login" class="login-btn">Login</button>
        </form>
    </div>
</body>
</html>
