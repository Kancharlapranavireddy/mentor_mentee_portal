<?php
include 'nav1.php';
include 'con.php';
$id=$_GET['editid'];
$sql="Select * from `student` where id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$cgpa=$row['cgpa'];
$backlogs=$row['backlogs'];
$subjects=$row['subjects'];
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $cgpa=$_POST['cgpa'];
    $backlogs=$_POST['backlogs'];
    $subjects=$_POST['subjects'];
    
    $sql="update `student` set id=$id,name='$name',cgpa=$cgpa,backlogs=$backlogs,subjects=$subjects where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
    header("location:student.php");
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
   

    <title>crud</title>
  </head>
  <body>
    <div class="container my-5">
    <form method="post">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Enter Name" name="name" autocomplete="off" value="<?php echo $name; ?>">
  </div>
  <div class="form-group">
    <label>CGPA</label>
    <input type="text" class="form-control" placeholder="Enter CGPA" name="cgpa" autocomplete="off" value=<?php echo $cgpa;?>>
  </div>
  <div class="form-group">
    <label>Backlogs</label>
    <input type="text" class="form-control" placeholder="Enter Backlogs" name="backlogs" autocomplete="off" value=<?php echo $backlogs;?>>
  </div>
  <div class="form-group">
    <label>Subjects</label>
    <input type="text" class="form-control" placeholder="Enter Backlogs Subjects" name="subjects" autocomplete="off" value="<?php echo $subjects;?>">
  </div>
  
  
  <button type="submit" class="btn btn-primary" name="submit">Edit</button>
</form> 
    