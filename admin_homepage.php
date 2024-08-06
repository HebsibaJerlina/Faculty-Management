<?php
session_start();

// Check if admin is not logged in, redirect to admin login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
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

// Check if form is submitted to change salary or ratings
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['change_salary'])) {
        // Get input values
        $employee_id = $_POST['employee_id'];
        $new_salary = $_POST['new_salary'];

        // Update salary in the database for the specified employee
        $sql_update_salary = "UPDATE salary SET salary_amt = $new_salary WHERE fac_id = $employee_id";
        if ($conn->query($sql_update_salary) === TRUE) {
            echo "Salary updated successfully.";
        } else {
            echo "Error updating salary: " . $conn->error;
        }
    }

    if (isset($_POST['change_ratings'])) {
        // Get input values
        $employee_id = $_POST['employee_id'];
        $new_ratings = $_POST['new_ratings'];

        // Update ratings in the database for the specified employee
        $sql_update_ratings = "UPDATE ratings SET rating = $new_ratings WHERE fac_id = $employee_id";
        if ($conn->query($sql_update_ratings) === TRUE) {
            echo "Ratings updated successfully.";
        } else {
            echo "Error updating ratings: " . $conn->error;
        }
    }
}

// Retrieve employee details from the database
$sql_employee = "SELECT * FROM faculty";
$result_employee = $conn->query($sql_employee);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Homepage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            margin-bottom: 20px;
        }
        .input-group {
            margin-bottom: 10px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
        }
        .input-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, Admin!</h1>
        <h2>Faculty Details</h2>
        <table>
            <tr>
                <th>Faculty ID</th>
                <th>Name</th>
                <th>Salary</th>
                <th>Ratings</th>
            </tr>
            <?php
            if ($result_employee->num_rows > 0) {
                while ($row = $result_employee->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["fac_id"] . "</td>";
                    echo "<td>" . $row["fac_name"] . "</td>";
                    // Retrieve salary from the salary table based on employee ID
                    $sql_salary = "SELECT * FROM salary WHERE fac_id = " . $row["fac_id"];
                    $result_salary = $conn->query($sql_salary);
                    $salary = ($result_salary->num_rows > 0) ? $result_salary->fetch_assoc()["salary_amt"] : "-";
                    echo "<td>" . $salary . "</td>";
                    // Retrieve ratings from the ratings table based on employee ID
                    $sql_ratings = "SELECT * FROM ratings WHERE fac_id = " . $row["fac_id"];
                    $result_ratings = $conn->query($sql_ratings);
                    $ratings = ($result_ratings->num_rows > 0) ? $result_ratings->fetch_assoc()["rating"] : "-";
                    echo "<td>" . $ratings . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No employee records found.</td></tr>";
            }
            ?>
        </table>
        <h2>Change Salary</h2>
        <form method="post">
            <div class="input-group">
                <label for="employee_id">Faculty ID:</label>
                <input type="text" id="employee_id" name="employee_id" required>
            </div>
            <div class="input-group">
                <label for="new_salary">New Salary:</label>
                <input type="text" id="new_salary" name="new_salary" required>
            </div>
            <button type="submit" name="change_salary" class="btn">Change Salary</button>
        </form>
        <h2>Change Ratings</h2>
        <form method="post">
            <div class="input-group">
                <label for="employee_id">Faculty ID:</label>
                <input type="text" id="employee_id" name="employee_id" required>
            </div>
            <div class="input-group">
                <label for="new_ratings">New Ratings:</label>
                <input type="text" id="new_ratings" name="new_ratings" required>
            </div>
            <button type="submit" name="change_ratings" class="btn">Change Ratings</button>
        </form>
        <a href="admin_logout.php" class="btn">Logout</a>
    </div>
</body>
</html>
