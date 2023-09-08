<?php
include 'nav1.php';
include 'con.php';

$rollno = $_GET['editid'];
$sql = "SELECT * FROM `pi` WHERE Rollno = $rollno";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$rollno = $row['Rollno'];
$name = $row['name'];
$email = $row['email'];
$mobileno = $row['mobileno'];

if (isset($_POST['submit'])) {
    $rollno = $_POST['Rollno'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobileno = $_POST['mobileno'];

    // File Upload
    $photo = $_FILES['photo'];
    $photoName = $photo['name'];
    $photoTmpName = $photo['tmp_name'];

    // Move the uploaded file to a desired location
    $targetDirectory = 'uploads/';
    $targetFile = $targetDirectory . basename($photoName);
    move_uploaded_file($photoTmpName, $targetFile);
  


    $updateSql =  "UPDATE `pi` SET Rollno = $rollno, name = '$name', email = '$email', mobileno = '$mobileno', formfilled = 1 WHERE Rollno = $rollno";

    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        header("location: student1.php");
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
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
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Rollno</label>
            <input type="text" class="form-control" placeholder="Enter Rollno" name="Rollno" autocomplete="off"
                   value="<?php echo $rollno; ?>" required>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Enter Name" name="name" autocomplete="off" value="" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" placeholder="Enter Email" name="email" autocomplete="off"
                   value="" required>
        </div>
        <div class="form-group">
            <label>Mobileno</label>
            <input type="text" class="form-control" placeholder="Enter Mobileno" name="mobileno" autocomplete="off"
                   value="" required>
        </div>
        <div class="form-group">
            <label>Photo</label>
            <input type="file" class="form-control-file" name="photo" accept="image/jpeg" required>
        </div>
        <button type="submit" class="btn btn-info btn-xs" name="submit">Edit<i class="fas fa-edit"></i></button>
    </form>
</div>
</body>
</html>
