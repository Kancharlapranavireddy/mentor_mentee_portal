<?php
include 'nav1.php';
include 'con.php';
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
    <style>
        .btn-icon {
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Rollno</th>
                    <th scope="col">Name</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Classes Held</th>
                    <th scope="col">Classes Attended</th>
                    <th scope="col">Percentage</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    $conn = mysqli_connect("localhost", "root", "", "demo");
                    if (!$conn) {
                        die("Error: " . mysqli_connect_error());
                    }
                    $sql = "SELECT Rollno, Name, subjectname, held, attended, percentage FROM dup1 WHERE mentor = '$username' ORDER BY rollno ASC";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $rollno = $row['Rollno'];
                            $name = $row['Name'];
                            $subjectname = $row['subjectname'];
                            $held = $row['held'];
                            $attended = $row['attended'];
                            $percentage = $row['percentage'];
                ?>
                            <tr>
                                <th scope="row"><?php echo $rollno; ?></th>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $subjectname; ?></td>
                                <td><?php echo $held; ?></td>
                                <td><?php echo $attended; ?></td>
                                <td><?php echo $percentage; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="edit2.php?editid=<?php echo $rollno; ?>&subjectname=<?php echo $subjectname; ?>" class="btn btn-info btn-xs btn-icon mr-1">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </a>
                                        <a href="delete2.php?deleteid=<?php echo $rollno; ?>&subjectname=<?php echo $subjectname; ?>" class="btn btn-danger btn-xs btn-icon" onclick="return confirm('Are you sure you want to delete this record of <?php echo $name; ?>?')">
                                            <i class="fas fa-minus"></i>
                                            Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                <?php
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
