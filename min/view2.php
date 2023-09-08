<?php
include 'nav1.php';
include 'con.php';

// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all the roll numbers from the 'pi' table
$username = $_SESSION['username'];
$sql = "SELECT Rollno FROM pi WHERE mentor = '$username'";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <h1>Dashboard</h1>
    <ul>
        <?php
        // Display the roll numbers as buttons
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<li><a href="view1.php?viewid=' . $row["Rollno"] . '"><button>' . $row["Rollno"] . '</button></a></li>';
            }
        } else {
            echo "No roll numbers found.";
        }
        ?>
    </ul>
</body>
</html>
