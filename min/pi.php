
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

    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">-->
    </head>
  <body>
<div class="container">
    <button class="btn btn-success my-5">
    <i class="fas fa-plus"></i>
    <a href="add1.php" class="text-light">Add Student</a></button>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">rollno</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">mobileno</th>
      <th scope="col">operations</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $conn = mysqli_connect ("localhost","root","","demo");
    if (isset($_SESSION['username'])) 
    $username = $_SESSION['username'];
    if(!$conn){
       die("error".mysqli_connect_error());
    if (isset($_POST['edit'])) {
      $editid = $_POST['selected_id'];
      header("Location: edit1.php?editid=" . $editid);
      exit();
    }
   }   

    $sql="SELECT  Rollno,name,email,mobileno from pi WHERE mentor='$username'  ORDER BY Rollno ASC ";
    $result=mysqli_query($conn,$sql);
    if($result){
      while($row=mysqli_fetch_assoc($result)){
        $rollno=$row['Rollno'];
        $name=$row['name'];
        $email=$row['email'];
        $mobileno=$row['mobileno'];

        echo ' <tr>
        <th scope="row">'.$rollno.'</th>
        <td>' .$name.'</td>
        <td>' .$email.'</td>
        <td>' .$mobileno.'</td>
        <td>
       <button type="button" class="btn btn-info btn-xs">
        <i class="fas fa-edit"></i>
        <a href="edit1.php?editid=' . $rollno . '" class="text-light">Edit</a>
        </button>
        <button type="button" class="btn btn-danger btn-xs">
        <i class="fas fa-minus"></i>
        <a href="delete1.php?deleteid=' . $rollno . '" class="text-light" onclick="return confirm(\'Are you sure you want to delete this record of '.$name.' ?\');">Delete</a>
        </button>
        <button type="button" class="btn btn-primary btn-xs">
        <i class="fas fa-view"></i>
        <a href="view.php?editid=' . $rollno . '" class="text-light">View</a>
        </button>
        </tr>';
      }
    }
    ?>
    
 </tbody>   
</table>
</div>

  </body>



