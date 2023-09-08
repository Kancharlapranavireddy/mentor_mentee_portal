<?php
include 'con.php';
if(isset($_GET['deleteid'])){
    $rollno=$_GET['deleteid'];
    $sql="delete from `pi` where Rollno=$rollno";
    $result=mysqli_query($conn,$sql);
    if($result){
        header('location:pi.php');
    }
    else{
        die("error".mysqli_connect_error());
    }

}
?>
