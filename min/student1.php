<?php
include 'nav1.php';
include 'con.php';

$username = $_SESSION['username'];
$atendanceSql = "SELECT rollno, name, sub1, sub2, sub3, sub4, attendance_status
FROM semester6
WHERE name = '$username'
UNION ALL
SELECT rollno, name, sub1, sub2, sub3, sub4, attendance_status
FROM semester6
WHERE rollno = '';";
$atendanceResult = mysqli_query($conn, $atendanceSql);

        // Loop through attendance data and display it
// Fetch student personal info from the database
$personalInfoSql = "SELECT * FROM pi WHERE name = '$username'";
$personalInfoResult = mysqli_query($conn, $personalInfoSql);

if (mysqli_num_rows($personalInfoResult) > 0) {
    $personalInfoRow = mysqli_fetch_assoc($personalInfoResult);
    $rollno = $personalInfoRow['Rollno'];
}
else {
  // Handle the case when no personal info is found for the student
  // You can redirect the user or display an error message
  die("No personal info found for the student.");
}
$academicInfoSql = "SELECT * FROM student WHERE name = '$username'";
$academicInfoResult = mysqli_query($conn, $academicInfoSql);

if (mysqli_num_rows($academicInfoResult) > 0) {
    $academicInfoRow = mysqli_fetch_assoc($academicInfoResult);
    $rollno = $academicInfoRow['Rollno'];
}
else {
  // Handle the case when no personal info is found for the student
  // You can redirect the user or display an error message
  die("No academic info found for the student.");}
    

    // Check if the form has already been filled by the student
    $isFormFilled = $personalInfoRow['formfilled'];





    
 
?>

<!DOCTYPE html>
<html>
<head>
  <title>Student Portal</title>
  <style>
    .dropdown {
      position: relative;
      display: block;
      margin-bottom: 10px;
    }
    
    .dropdown-content {
      display: none;
      background-color: #f9f9f9;
      border: 1px solid #ccc;
      padding: 8px;
      margin-top: 5px;
    }
    
    table {
      border-collapse: collapse;
    }
    
    th, td {
      border: 1px solid black;
      padding: 8px;
    }
  </style>
  <script>
    function toggleDropdown(id) {
      var dropdownContent = document.getElementById(id);
      dropdownContent.style.display = dropdownContent.style.display === 'none' ? 'block' : 'none';
    }
  </script>
</head>
<body>
  <h1>Student Portal</h1>

  <?php if (!$isFormFilled): ?>
    <a href="form.php?editid=<?php echo $rollno; ?>" class="btn btn-info mr-1">Fill Details</a>
  <?php else: ?>
    <p>Form is already submitted.</p>
  <?php endif; ?>
 
    <a href="form1.php?editid=<?php echo $rollno; ?>" class="btn btn-info mr-1">Internships</a>
    <a href="edit.php?editid=<?php echo $rollno; ?>" class="btn btn-info mr-1">Academic Details</a>

  <div class="dropdown">
    <button type="button" class="btn btn-info btn-lg btn-block text-left" onclick="toggleDropdown('personal-details')">Personal Information</button>
    <div class="dropdown-content" id="personal-details">
      <table>
        <tr>
          <th>Roll No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Contact Information</th>
        </tr>
        <tr>
          <td><?php echo $personalInfoRow['Rollno']; ?></td>
          <td><?php echo $personalInfoRow['name']; ?></td>
          <td><?php echo $personalInfoRow['email']; ?></td>
          <td><?php echo $personalInfoRow['mobileno']; ?></td>
        </tr>
      </table>
    </div>
  </div>
  <div class="dropdown">
    <button type="button" class="btn btn-info btn-lg btn-block text-left" onclick="toggleDropdown('academic-details')">Academic Details</button>
    <div class="dropdown-content" id="academic-details">
      <table>
        <tr>
          <th>RollNo</th>
          <th>Name</th>
          <th>CGPA</th>
          <th>Backlogs</th>
          <th>Subjects</th>
        </tr>
          <tr>
          <td><?php echo $academicInfoRow['Rollno']; ?></td>
          <td><?php echo $academicInfoRow['Name']; ?></td>
          <td><?php echo $academicInfoRow['cgpa']; ?></td>
          <td><?php echo $academicInfoRow['backlogs']; ?>
          <td><?php echo $academicInfoRow['subjects']; ?>

        </td>
          </tr>
      </table>
    </div>
  </div>


  
  <!-- Add more dropdown sections for other features/sections -->
  <div class="dropdown">
    <button type="button" class="btn btn-info btn-lg btn-block text-left" onclick="toggleDropdown('atendance')">Attendance from csv</button>
    <div class="dropdown-content" id="atendance">
  <table>
    <thead>
        <tr>
            <th> rollno</th>
            <th>name</th>
            <th>sub1</th>
            <th>sub2</th>
            <th>sub3</th>
            <th>sub4</th>
            <th>attendanced_status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Loop through attendance data and display it
        while ($atendanceRow = mysqli_fetch_assoc($atendanceResult)):
        ?>
        <tr>
            <td><?php echo $atendanceRow['rollno']; ?></td>
            <td><?php echo $atendanceRow['name']; ?></td>
            <td><?php echo $atendanceRow['sub1']; ?></td>
            <td><?php echo $atendanceRow['sub2']; ?></td>
            <td><?php echo $atendanceRow['sub3']; ?></td>
            <td><?php echo $atendanceRow['sub4']; ?></td>
            <td><?php echo $atendanceRow['attendance_status']; ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</div>
</div>
<?php
    // Close the database connection
    mysqli_close($conn);
  ?>
</body>
</html>

