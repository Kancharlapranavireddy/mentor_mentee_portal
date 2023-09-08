<?php
include 'nav1.php';
include 'con.php';

$username = $_SESSION['username'];
$rollno = $_GET['viewid'];

if (isset($_GET['viewid'])) {
    $rollno = $_GET['viewid'];
    
    $personalInfoSql = "SELECT * FROM pi WHERE Rollno = '$rollno'";
    $personalInfoResult = mysqli_query($conn, $personalInfoSql);
    $personalInfoRow = mysqli_fetch_assoc($personalInfoResult);
    $attendanceSql = "SELECT * FROM dup1 WHERE Rollno = '$rollno'";
$attendanceResult = mysqli_query($conn, $attendanceSql);
$academicsql = "SELECT * FROM student WHERE  Rollno = '$rollno'";
$academicresult = mysqli_query($conn, $academicsql);
$academicRow =  mysqli_fetch_assoc($academicresult);
    if (isset($_POST['submit'])) {
        // Update personal information here
        $newName = mysqli_real_escape_string($conn, $_POST['new_name']);
        $newEmail = mysqli_real_escape_string($conn, $_POST['new_email']);
        $newMobileno = mysqli_real_escape_string($conn, $_POST['new_mobileno']);
        
        $updateSql = "UPDATE pi SET name = '$newName', email = '$newEmail', mobileno = '$newMobileno' WHERE Rollno = '$rollno'";
        mysqli_query($conn, $updateSql);
        
        // Refresh the page after updating
        header("Location: view2.php?viewid=$rollno");
        exit;
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        
        .info {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        
        h2 {
            margin-top: 0;
            font-size: 24px;
            color: #333;
        }
        
        img {
            position: absolute;
            top: 300px;
            right: 300px;
            width: 100px;
            height: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th, td {
            padding: 10px;
            text-align: left;
        }
        
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        tbody tr:hover {
            background-color: #eaf4fd;
        }
    </style>
</head>
<body>
<div class="info">
    <?php if (isset($personalInfoRow)): ?>
        <!-- Personal details and edit form -->
        <form method="post">
            <h2>PERSONAL DETAILS</h2>
            
            <p>Rollno: <?php echo $personalInfoRow['Rollno']; ?></p>
            <input type="text" name="new_name" value="<?php echo $personalInfoRow['name']; ?>">
            <input type="email" name="new_email" value="<?php echo $personalInfoRow['email']; ?>">
            <input type="text" name="new_mobileno" value="<?php echo $personalInfoRow['mobileno']; ?>">
            
            <?php if ($personalInfoRow['photo']): ?>
                <img src="<?php echo $personalInfoRow['photo']; ?>" alt="Student Photo">
            <?php else: ?>
                <p>No photo available</p>
            <?php endif; ?>
            
            <button type="submit" name="submit">Save Changes</button>
        </form>
    <?php else: ?>
        <p>No personal information found.</p>
    <?php endif; ?>
    
    <h2>ACADEMIC PERFORMANCE</h2>
        
        <p>Rollno: <?php echo $academicRow['Rollno']; ?></p>
        <p>Name: <?php echo $academicRow['Name']; ?></p>
        <p>cgpa: <?php echo $academicRow['cgpa']; ?></p>
        <p>Backlogs: <?php echo $academicRow['backlogs']; ?></p>
        <p>Backlog subjects: <?php echo $academicRow['subjects']; ?></p>
        
        <h2>ATTENDANCE</h2>
        <table>
            <thead>
                <tr>
                    <th>Subject name</th>
                    <th>Classes held</th>
                    <th>Classes attended</th>
                    <th>Percentage</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($attendanceRow = mysqli_fetch_assoc($attendanceResult)): ?>
                    <tr>
                        <td><?php echo $attendanceRow['subjectname']; ?></td>
                        <td><?php echo $attendanceRow['held']; ?></td>
                        <td><?php echo $attendanceRow['attended']; ?></td>
                        <td><?php echo $attendanceRow['percentage']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div> 
</div>
</body>
</html>
