<?php
include 'nav1.php';
include 'con.php';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $conn = mysqli_connect("localhost", "root", "", "demo");
    if (!$conn) {
        die("Error: " . mysqli_connect_error());
    }

    $sql = "SELECT Rollno, Name, subjectname, held, attended, percentage FROM dup1 WHERE mentor = '$username' ORDER BY Rollno ASC";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '
        <div class="container my-5">
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
                <tbody>';

        while ($row = mysqli_fetch_assoc($result)) {
            $rollno = $row['Rollno'];
            $name = $row['Name'];
            $subjectname = $row['subjectname'];
            $held = $row['held'];
            $attended = $row['attended'];
            $percentage = $row['percentage'];

            echo '<tr>
                <td>' . $rollno . '</td>
                <td>' . $name . '</td>
                <td>' . $subjectname . '</td>
                <td>' . $held . '</td>
                <td>' . $attended . '</td>
                <td>' . $percentage . '</td>
                <td>
                    <button type="button" class="btn btn-info btn-xs">
                        <i class="fas fa-edit"></i>
                        <a href="edit2.php?editid=' . $rollno . '&subjectname=' . urlencode($subjectname) . '" class="text-light">Edit</a>
                    </button>
                    <button type="button" class="btn btn-danger btn-xs">
                        <i class="fas fa-minus"></i>
                        <a href="delete2.php?deleteid=' . $rollno . '" class="text-light" onclick="return confirm(\'Are you sure you want to delete this record of ' . $name . ' ?\');">Delete</a>
                    </button>
                </td>
            </tr>';
        }

        echo '
                </tbody>
            </table>
        </div>';
    }
}
?>