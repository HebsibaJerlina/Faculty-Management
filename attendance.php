<?php
session_start();


if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];


function generateAttendanceReport($username) {
    
}

$attendanceReport = generateAttendanceReport($username);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Tracking</title>
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #4285f4;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        main {
            padding: 20px;
            animation: fadeIn 1s ease;
        }

        #loginForm, #attendanceReport {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        button {
            cursor: pointer;
            background-color: #4285f4;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #3367d6;
        }

        footer {
            background-color: #4285f4;
            color: #fff;
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<header>
    <h1>Attendance Tracking System</h1>
</header>

<main>
    <section id="login">
        <h2 style="color: #4285f4;">Login</h2>
        <form id="loginForm">
            <label for="username">fac_id:</label><br>
            <input type="text" id="username" name="username" required><br><br>
            <button type="button" onclick="login()">Login</button>
        </form>
    </section>

    <section id="attendance" style="display: none;">
        <h2 style="color: #4285f4;">Attendance Report</h2>
        <div id="attendanceReport">
            <!-- Attendance report will be displayed here -->
        </div>
    </section>
</main>

<footer>
    <p>&copy; 2024 Attendance Tracking System</p>
</footer>

<script>
    function login() {
        var username = document.getElementById('username').value;
        if (username) {
            document.getElementById('login').style.display = "none";
            document.getElementById('attendance').style.display = "block";
            showAttendance(username);
        } else {
            alert("Please enter a username.");
        }
    }

    function showAttendance(username) {
        var reportDiv = document.getElementById('attendanceReport');
        var attendanceReport = generateAttendanceReport(username);
        var duplicateReport = "<div style='background-color: #f0f0f0; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); margin-top: 20px;'>";
        duplicateReport += "<h3 style='color: #4285f4;'>" + username + "'s Attendance Report</h3>";
        duplicateReport += attendanceReport;
        duplicateReport += "</div>";
        reportDiv.innerHTML += duplicateReport;
    }

    function generateAttendanceReport(username) {
        var report = "<table border='1' style='width:100%;'>";
        report += "<tr style='background-color: #4285f4; color: #fff;'><th>Date</th><th>Status</th></tr>";
        var today = new Date();
        for (var i = 0; i < 730; i++) { // 2 years of data (365 * 2)
            var date = new Date(today.getTime() - i * 24 * 60 * 60 * 1000);
            var status = Math.random() < 0.8 ? "Present" : (Math.random() < 0.5 ? "Absent" : "On Duty");
            report += "<tr><td>" + formatDate(date) + "</td><td>" + status + "</td></tr>";
        }
        report += "</table>";
        return report;
    }

    function formatDate(date) {
        var dd = String(date.getDate()).padStart(2, '0');
        var mm = String(date.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = date.getFullYear();

        return mm + '/' + dd + '/' + yyyy;
    }
</script>

</body>
</html>