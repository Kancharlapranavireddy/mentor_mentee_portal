<?php
include 'nav1.php';
include 'con.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="delete from `student` where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        header('location:display.php');
    }
    else{
        die("error".mysqli_connect_error());
    }

}
?>