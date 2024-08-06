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

    // Retrieve salary details where emp_id matches user_id
    $sql_salary = "SELECT * FROM salary WHERE fac_id = $user_id";
    $result_salary = $conn->query($sql_salary);

    // Check if there are any results
    if ($result_salary->num_rows > 0) {
        // Output data of each row
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Salary Details</title>
            <link rel="stylesheet" href="styles.css">
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                }

                /* Background image styles */
                .background-image {
                    background-image: url('https://images7.alphacoders.com/718/thumb-1920-718139.jpg'); /* Replace 'background-image.jpg' with your actual image file */
                    background-size: cover;
                    background-position: center;
                    height: 100vh; /* Adjust as needed */
                }

                /* Popup container styles */
                .popup-container {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100%;
                }

                /* Salary container styles */
                .salary-container {
                    background-color: rgba(255, 255, 255, 0.9); /* Adjust opacity as needed */
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
                }

                .salary-container h2 {
                    text-align: center;
                    margin-bottom: 20px;
                }

                /* Salary info styles (example) */
                .salary-info {
                    margin-bottom: 10px;
                }

                .salary-info label {
                    font-weight: bold;
                }

                .salary-info span {
                    margin-left: 10px;
                    color: #333; /* Adjust color as needed */
                }
            </style>
        </head>
        <body>
        <div class="background-image">
            <div class="popup-container">
                <div class="salary-container">
                    <h2>Salary Details</h2>
                    <?php
                    while ($row = $result_salary->fetch_assoc()) {
                        ?>
                        <div class="salary-info">
                            <label>Salary ID:</label>
                            <span><?php echo $row["salary_id"]; ?></span>
                        </div>
                        <div class="salary-info">
                            <label>Faculty ID:</label>
                            <span><?php echo $row["fac_id"]; ?></span>
                        </div>
                        <div class="salary-info">
                            <label>Salary Amount:</label>
                            <span><?php echo $row["salary_amt"]; ?></span>
                        </div>
                       
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        </body>
        </html>
        <?php
    } else {
        echo "No salary details found for the current user.";
    }
} else {
    echo "Error: Unable to retrieve user information.";
}

$conn->close();
?>
