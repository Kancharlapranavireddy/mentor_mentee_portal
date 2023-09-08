<?php
include 'nav1.php';
include 'con.php';

if (isset($_GET['editid'])) {
    $rollno = $_GET['editid'];
    $subjectname = $_GET['subjectname'];
    $sql = "SELECT * FROM `dup1` WHERE Rollno='$rollno' AND subjectname='$subjectname'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $rollno = $row['Rollno'];
    $name = $row['Name'];
    $subjectname = $row['subjectname'];
    $held = $row['held'];
    $attended = $row['attended'];
    $percentage = $row['percentage'];

    if (isset($_POST['submit'])) {
      $rollno = $_POST['Rollno'];
      $name = $_POST['Name'];
      $newSubjectName = $_POST['subjectname']; 
      $held = $_POST['held'];
      $attended = $_POST['attended'];
      $percentage = $_POST['percentage'];
  
      $sql = "UPDATE `dup1` SET Rollno=?, Name=?, subjectname=?, held=?, attended=?, percentage=? WHERE rollno=? AND subjectname=?";
      $stmt = mysqli_prepare($conn, $sql);
      mysqli_stmt_bind_param($stmt, "issiisis", $rollno, $name, $newSubjectName, $held, $attended, $percentage, $rollno, $subjectname);
      $result = mysqli_stmt_execute($stmt);
  
      
  
  
        if ($result) {
            header("location: attendance1.php");
            exit();
        } else {
            die("Error: " . mysqli_error($conn));
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">-->

    <title>crud</title>
</head>
<body>
<div class="container my-5">
    <form method="post">
        <div class="form-group">
            <label>RollNo</label>
            <input type="text" class="form-control" placeholder="Enter Rollno" name="rollno" autocomplete="off" value="<?php echo $rollno;?>">
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Enter Name" name="name" autocomplete="off" value="<?php echo $name;?>">
        </div>
        <div class="form-group">
            <label>Subject Name</label>
            <input type="text" class="form-control" placeholder="Enter subject name" name="subjectname" autocomplete="off" value="<?php echo $subjectname;?>">
        </div>
        <div class="form-group">
            <label>Classes Held</label>
            <input type="text" class="form-control" placeholder="Classes Held" name="held" autocomplete="off" value="<?php echo $held;?>">
        </div>
        <div class="form-group">
            <label>Classes Attended</label>
            <input type="text" class="form-control" placeholder="Classes Attended" name="attended" autocomplete="off" value="<?php echo $attended;?>">
        </div>
        <div class="form-group">
            <label>Percentage</label>
            <input type="text" class="form-control" placeholder="Percentage" name="percentage" autocomplete="off" value="<?php echo $percentage;?>">
        </div>
        <button type="submit" class="btn btn-info btn-xs" name="submit">Edit<i class="fas fa-edit"></i></button>

        <!--<button type="submit" class="btn btn-primary" name="submit">Edit</button> -->
  </form>
</div>