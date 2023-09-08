<?php
include 'nav1.php';
include 'con.php';

$rollno = $_GET['editid'];
$message = "";

if (isset($_POST['submit'])) {
    $rollno = $_POST['Rollno'];
    $name = $_POST['name'];
    $role = $_POST['role'];
    $company_name = $_POST['company_name'];
   
    $startdate = $_POST['start_date'];
    $enddate = $_POST['end_date'];
    $offerletter = $_FILES['offer_letter'];
    $photoName = $offerletter['name'];
    $photoTmpName = $offerletter['tmp_name'];
    $targetDirectory = 'internships/';
    $targetFile = $targetDirectory . basename($photoName);
    move_uploaded_file($photoTmpName, $targetFile);

    // Insert the rollno and mentor into the internships table using a parameterized query
    $insertQuery = "INSERT INTO internships ( Rollno, name,company_name, role, start_date, end_date, offer_letter, mentor)
    SELECT ?, ?, ?, ?,? ,? ,?,d.mentor
    FROM internships AS i
    LEFT JOIN dup1 AS d ON i.Rollno = d.Rollno 
    WHERE d.Rollno = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $insertQuery);
    mysqli_stmt_bind_param($stmt, 'ssssssss',  $rollno,$name,$company_name, $role, $startdate, $enddate, $targetFile,$rollno);
    $insertResult = mysqli_stmt_execute($stmt);



    if ($insertResult) {
        $message = "Form submitted successfully!";
        echo "<script>
        setTimeout(function(){
            window.location.href = 'student1.php';
        }, 20000);
    </script>";
    } else {
        die("Error: " . mysqli_error($conn));
    }

    mysqli_stmt_close($stmt);
}

// Rest of your code...
?>

<!doctype html>
<html lang="en">
<head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    

    <title>crud</title>
</head>
<body>
<div class="container my-5">
<?php if (!empty($message)) : ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Rollno</label>
            <input type="text" class="form-control" placeholder="Enter Rollno" name="Rollno" autocomplete="off" required
                   value="<?php echo $rollno; ?>">
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Enter Name" name="name" autocomplete="off" value="" required>
        </div>
        <div class="form-group">
            <label>Company Name</label>
            <input type="text" class="form-control" placeholder="Enter Company Name" name="company_name" autocomplete="off"
                   value="" required>
        </div>
        <div class="form-group">
            <label>Role</label>
            <input type="text" class="form-control" placeholder="Enter Role" name="role" autocomplete="off" required
                   value="">
        </div>
        <div class="form-group">
            <label>Start date</label>
            <input type="date" class="form-control" placeholder="Enter Start date" name="start_date" autocomplete="off"
                   value="" required>
        </div>
        <div class="form-group">
            <label>End date</label>
            <input type="date" class="form-control" placeholder="Enter End date" name="end_date" autocomplete="off"
                   value="" required>
        </div>
        <div class="form-group">
            <label>Offer letter</label>
            <input type="file" class="form-control-file" name="offer_letter" accept="application/pdf" required>
        </div>
        <button type="submit" class="btn btn-info btn-xs" name="submit">Submit</button>
    </form>
</div>
</body>
</html>