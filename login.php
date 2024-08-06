<?php
session_start();

// Check if user is already logged in, redirect to home page
if(isset($_SESSION['username'])) {
    header("Location: fac.php");
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
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user_login WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: fac.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #7d7dff, #ff8c00); /* Gradient background */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: fadeIn 1s ease-in-out; /* Fade-in animation */
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .login-container {
            width: 300px;
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.3);
            text-align: center;
            animation: slideIn 0.5s ease-out; /* Slide-in animation */
        }
        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: none;
            border-radius: 20px;
            box-sizing: border-box;
            font-size: 16px;
            transition: all 0.3s ease-in-out;
            background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent white background */
        }
        input[type="text"]:focus, input[type="password"]:focus {
            outline: none;
            background-color: rgba(255, 255, 255, 0.9); /* Slightly more opaque white on focus */
        }
        input[type="submit"] {
            width: 100%;
            background-color: #ff8c00; /* Orange color */
            color: #fff; /* White color */
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s ease-in-out;
        }
        input[type="submit"]:hover {
            background-color: #ff5a00; /* Darker orange color on hover */
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
        h2 {
            color: #ff8c00; /* Orange color for title */
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2> <!-- Title color -->
    <?php if(isset($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>
    <form method="post">
        <input type="text" id="username" name="username" placeholder="Username" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <input type="submit" name="login" value="Login">
    </form>
</div>

</body>
</html>