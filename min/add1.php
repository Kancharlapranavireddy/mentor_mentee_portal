<?php
include 'nav1.php';
include 'con.php';
if(isset($_POST['submit'])){
    $rollno=$_POST['Rollno'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobileno=$_POST['mobileno'];
    $username = $_SESSION['username'];
    
    $sql= "insert into `pi` (Rollno,name,email,mobileno,mentor) values ('$rollno','$name','$email','$mobileno','$username')";
    $result=mysqli_query($conn,$sql);
    if($result){
    header('location:pi.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Bootstrap CSS -->
   <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">-->

    <title>crud</title>
  </head>
  <body>
    <div class="container my-5">
    <form method="post">
    <div class="form-group">
    <label>RollNo</label>
    <input type="text" class="form-control" placeholder="Enter Rollno" name="Rollno" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Enter Name" name="name" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" placeholder="Enter Email" name="email" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Mobileno</label>
    <input type="text" class="form-control" placeholder="Enter Mobile Number" name="mobileno" autocomplete="off">
  </div>
  <button class="btn btn-success my-5" class="text-light" name="submit">
    <i class="fas fa-plus"></i>Add Student</button>
 <!-- <button type="submit" class="btn btn-primary" name="submit">Submit</button>-->
</form> 
    </div>
