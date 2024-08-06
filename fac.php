
<?php
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// If user is logged in, welcome message
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home - FACULTY MANAGEMENT SYSTEM</title>
    <link rel="stylesheet" href="s.css">
</head>
<body>

    <div class="main">
        <div class="navbar">
        <div class="icon">
    <h2 class="logo">WELCOME, <?php echo $username; ?>!</h2>
</div>


            <div class="menu">
                <ul>
                    <li class="active"><a href="fac.php">Home</a></li>
                    <li><a href="depart.php">Departments</a></li>
                    <li><a href="salary.php">Salary</a></li>
                    <li><a href="ratings.php">Ratings</a></li>
                    <li><a href="attendance.php">Attendance</a></li>
                    <li><a href="profile.php">My Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>

        </div> 
        <div class="search">
            <input class="srch" type="search" name="" placeholder="Type To text">
            <a href="#"> <button class="btn">Search</button></a>
        </div>

        <div class="content">
            <h1>Welcome to Faculty Management System</h1>
            <p class="par">
            <h1>A Gist of our PROS !!</h1><br>
          <h2>  
     
            Your details are Organized!! <br>
            No tension on remembering data!!! <br>
            Get your salary and ratings in a couple of minutes !! <br>
            Talk and interact with Fac Fetcher AI bot !<br></h2>

            </p>
           
          <center>  <button class="cn"><a href="chatbot.php">Talk to Fac Fetcher !! </a></button> </center>
        </div>
    </div>

    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
  
</body>

</html>
