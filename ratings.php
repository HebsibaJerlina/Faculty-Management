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

    // Retrieve ratings details where emp_id matches user_id
    $sql_ratings = "SELECT * FROM ratings WHERE fac_id = $user_id";
    $result_ratings = $conn->query($sql_ratings);

    // Check if there are any results
    if ($result_ratings->num_rows > 0) {
        // Output data of each row
        ?>
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Ratings</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f2f2f2;
                    margin: 0;
                    padding: 0;
                }
                
                .ratings-container {
                    width: 100%;
                    text-align: center;
                }
                
                .rating-box {
                    display: inline-block;
                    width: 100px; /* Adjust width as needed */
                    margin: 20px;
                    padding: 10px;
                    background-color: white;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                }
                
                .stars {
                    font-size: 30px; /* Adjust size as needed */
                }
                
                .gold-star {
                    color: gold;
                }
            </style>
        </head>
        <body>
        <center><h1>RATINGS</h1></center>
        <div class='ratings-container'>
        <?php
        // Output data of each row
        while ($row = $result_ratings->fetch_assoc()) {
            $rating = $row["rating"];
            // Convert rating to star symbols
            $stars = "";
            for ($i = 0; $i < $rating; $i++) {
                $stars .= "<span class='gold-star'>★</span>"; // Full star
            }
            for ($i = $rating; $i < 5; $i++) {
                $stars .= "<span class='gold-star'>☆</span>"; // Empty star
            }
            echo "<div class='rating-box'>" . $stars . "</div>";
        }
        ?>
        </div>
        </body>
        </html>
        <?php
    } else {
        echo "No ratings found for the current user.";
    }
} else {
    echo "Error: Unable to retrieve user information.";
}

$conn->close();
?>
