<?php
include 'nav1.php' ?>
<?php include 'con.php'
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  </head>
  <body>
<div class="container">
    <button class="btn btn-primary my-5"><a href="add.php" class="text-light">Insert</a></button>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">rollno</th>
      <th scope="col">name</th>
      <th scope="col">cgpa</th>
      <th scope="col">backlogs</th>
      <th scope="col">operations</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $conn = mysqli_connect ("localhost", "root", "","demo");
    $username = $_SESSION['username'];
    if(!$conn){
       die("error".mysqli_connect_error());
   }   

    $sql="SELECT  Rollno,name,cgpa, backlogs from student WHERE mentor='$username' ";
    $result=mysqli_query($conn,$sql);
    if($result){
      while($row=mysqli_fetch_assoc($result)){
        $id=$row['Rollno'];
        $name=$row['name'];
        $cgpa=$row['cgpa'];
        $backlogs=$row['backlogs'];
        echo ' <tr>
        <th scope="row">'.$id.'</th>
        <td>' .$name.'</td>
        <td>' .$cgpa.'</td>
        <td>' .$backlogs.'</td>
        <td>
        <button class="btn btn-primary"><a href="edit.php?editid=' .$id.'" class="text-light">Edit</a></button>
        <button class="btn btn-danger">
  <a href="delete.php?deleteid='.$id.'" class="text-light" onclick="return confirm(\'Are you sure you want to delete this record of '.$name.' ?\');">Delete</a>
</button>


       </td>
        </tr>';
      }
    }
    ?>
    
 </tbody>   
</table>
</div>

  </body>