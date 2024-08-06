<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Management System</title>
    <style>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background: linear-gradient(to right, #add8e6, #ffb6c1, #E6E6FA, #FFDAB9);
    animation: shiftBackground 20s infinite alternate; /* Animation for background */
}

@keyframes shiftBackground {
    0% {
        background-position: 0% 50%; /* Start position */
    }
    100% {
        background-position: 100% 50%; /* End position */
    }
}





        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #ffffff; /* White background */
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            color: #ff7f00; /* Orange color for logo */
            font-size: 32px;
            text-transform: uppercase;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        nav ul li {
            display: inline-block;
            margin-right: 20px;
        }

        nav ul li a {
            color: #333333; /* Dark gray color for links */
            text-decoration: none;
            transition: color 0.3s ease-in-out;
            font-size: 18px;
        }

        nav ul li.active a {
            color: #007bff; /* Blue color for active link */
        }

        .content {
            text-align: justify;
        }

        .content h2 {
            color: #333333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .content p {
            color: salmon; /* Medium gray color for paragraphs */
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .action-btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #007bff; /* Blue color for button */
            color: #ffffff; /* White color for button text */
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
            font-size: 18px;
        }

        .action-btn:hover {
            background-color: #0056b3; /* Darker blue color on hover */
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <h1 class="logo">Faculty Management System</h1>
    </header>
    <nav>
        <ul>
            <li class="active"><a href="#">Home</a></li>
            <li><a href="depart.php">Departments</a></li>
            <li><a href="login.php">Faculty Login</a></li>
            <li><a href="admin_login.php">Admin Login</a></li>
        </ul>
    </nav>
    <div class="content">
        <h2>Welcome to the Faculty Management System</h2>
        <p>
            A Gist of our PROS !!

            Your details are Organized!!
            No tension on remembering data!!!
            Get your salary and ratings in a couple of minutes !!
            Talk and interact with Fac Fetcher AI bot !
        </p>
        <a href="#" class="action-btn">Click here</a>
    </div>
</div>

</body>
</html>