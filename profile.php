<?php
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Assuming you have a database connection established
$servername = "localhost";
$username = "root";
$password = "";
$database = "fdms";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the user_id of the currently logged-in user using the username
$username = $_SESSION['username'];
$sql_user = "SELECT fac_id FROM user_login WHERE username = '$username'";
$result_user = $conn->query($sql_user);

if ($result_user->num_rows > 0) {
    $row_user = $result_user->fetch_assoc();
    $user_id = $row_user["fac_id"];

    // Retrieve profile details from employee table where emp_id matches user_id
    $sql_profile = "SELECT * FROM faculty WHERE fac_id = $user_id";
    $result_profile = $conn->query($sql_profile);

    // Check if there are any results
    if ($result_profile->num_rows > 0) {
        // Output data of the profile
        $row_profile = $result_profile->fetch_assoc();
        ?>
       <!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile Details</title>

    <link rel="stylesheet" href="styles.css">

</head>

<body>

<div class="profile-container">

    <h2>Profile Details</h2>

    <div class="profile-info">

        <label>Faculty ID:</label>

        <span><?php echo $row_profile["fac_id"]; ?></span>

    </div>

    <div class="profile-info">

        <label>Faculty Name:</label>

        <span><?php echo $row_profile["fac_name"]; ?></span>

    </div>

    <div class="profile-info">

        <label>Mobile:</label>

        <span><?php echo $row_profile["fac_mobile"]; ?></span>

    </div>

    <div class="profile-info">

        <label>Email:</label>

        <span><?php echo $row_profile["fac_mail"]; ?></span>

    </div>

    <div class="profile-info">

        <label>Department ID:</label>

        <span><?php echo $row_profile["dept_id"]; ?></span>

    </div>

    <div class="profile-info">

        <label>Address:</label>

        <span><?php echo $row_profile["fac_add"]; ?></span>

    </div>

</div>

</body>

</html>
        <?php
    } else {
        echo "No profile details found for the current user.";
    }
} else {
    echo "Error: Unable to retrieve user information.";
}

$conn->close();
?>
