<?php
include 'nav1.php';
include 'con.php';
if(isset($_POST['submit'])){
    $rollno=$_POST['Rollno'];
    $name=$_POST['name'];
    $cgpa=$_POST['cgpa'];
    $backlogs=$_POST['backlogs'];
    $username = $_SESSION['username'];
    
    $sql= "insert into `student` (Rollno,name,cgpa,backlogs,mentor) values ('$rollno','$name','$cgpa','$backlogs','$username')";
    $result=mysqli_query($conn,$sql);
    if($result){
    header('location:display.php');
}else{
    die("error".mysqli_connect_error());
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   

    <title>crud</title>
  </head>
  <body>
    <div class="container my-5">
    <form method="post">
    <div class="form-group">
    <label>Rollno</label>
    <input type="text" class="form-control" placeholder="Enter Rollno" name="Rollno" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Enter Name" name="name" autocomplete="off">
  </div>
  <div class="form-group">
    <label>CGPA</label>
    <input type="text" class="form-control" placeholder="Enter CGPA" name="cgpa" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Backlogs</label>
    <input type="text" class="form-control" placeholder="Enter Backlogs" name="backlogs" autocomplete="off">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form> 
    </div>