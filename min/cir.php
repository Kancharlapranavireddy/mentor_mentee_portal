<?php
// Include necessary files and database connection here
include 'nav1.php';
include 'con.php';

// Initialize message
$message = "";

// Check if the form was submitted
if (isset($_POST['upload'])) {
    // Check if a CSV file was uploaded successfully
    if ($_FILES['attendance_csv']['error'] === UPLOAD_ERR_OK) {
        $csvFile = $_FILES['attendance_csv']['tmp_name'];

        // Get the selected semester from the form
        $selectedSemester = $_POST['semester'];

        // Prepare the table name based on the selected semester
        $semesterTableName = "semester" . $selectedSemester;

        // Parse and process the CSV file
        $attendanceData = []; // Store attendance data in an array
        if (($handle = fopen($csvFile, "r")) !== false) {
            // Prepare the insert query and update query outside the loop
            $insertQuery = "INSERT INTO $semesterTableName (rollno, name, sub1, sub2, sub3, sub4, attendance_status) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $updateQuery = "UPDATE $semesterTableName SET sub1 = ?, sub2 = ?, sub3 = ?, sub4 = ?, attendance_status = ? WHERE rollno = ?";
            $stmtInsert = mysqli_prepare($conn, $insertQuery);
            $stmtUpdate = mysqli_prepare($conn, $updateQuery);

            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                // Assuming the CSV structure is: rollno, name, attendance_status
                $rollno = $data[0];
                $name = $data[1];
                $sub1 = $data[2];
                $sub2 = $data[3];
                $sub3 = $data[4];
                $sub4 = $data[5];
                $attendance_status = $data[6];

                // Check if the record already exists in the table
                $checkExistenceQuery = "SELECT * FROM $semesterTableName WHERE rollno = ?";
                $stmtCheckExistence = mysqli_prepare($conn, $checkExistenceQuery);
                mysqli_stmt_bind_param($stmtCheckExistence, 's', $rollno);
                mysqli_stmt_execute($stmtCheckExistence);
                $result = mysqli_stmt_get_result($stmtCheckExistence);

                if (mysqli_num_rows($result) > 0) {
                    // Update existing record
                    mysqli_stmt_bind_param($stmtUpdate, 'ssssss', $sub1, $sub2, $sub3, $sub4, $attendance_status, $rollno);
                    $updateResult = mysqli_stmt_execute($stmtUpdate);

                    if (!$updateResult) {
                        $message = "Error updating attendance data into the database: " . mysqli_error($conn);
                        break;
                    }
                } else {
                    // Insert new record
                    mysqli_stmt_bind_param($stmtInsert, 'sssssss', $rollno, $name, $sub1, $sub2, $sub3, $sub4, $attendance_status);
                    $insertResult = mysqli_stmt_execute($stmtInsert);

                    if (!$insertResult) {
                        $message = "Error inserting attendance data into the database: " . mysqli_error($conn);
                        break;
                    }
                }
            }

            // Close the prepared statements
            mysqli_stmt_close($stmtInsert);
            mysqli_stmt_close($stmtUpdate);
            mysqli_stmt_close($stmtCheckExistence);

            // Close the CSV file handle
            fclose($handle);

            // Display a success message
            if (empty($message)) {
                $message = "Attendance data uploaded successfully for Semester " . $selectedSemester . "!";
            }
        } else {
            $message = "Error reading the CSV file.";
        }
    } else {
        $message = "Error uploading file.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Attendance</title>
    <style>
        /* Styling for the container */
        .container {
            background-color: #f0f8ff; /* Light blue background color */
            max-width: 600px;
            margin: 0 auto; /* Center horizontally */
            margin-top: 50px; /* Add top margin for separation from navbar */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Styling for form elements */
        label {
            display: block;
            
            margin-bottom: 10px;
        }

        select, input[type="file"], button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007bff; /* Blue button color */
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <h1>Upload Attendance</h1>
    <?php if (!empty($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data">
        <label for="semester">Select Semester:</label>
        <select id="semester" name="semester" required>
            <option value="4">Semester 1</option>
            <option value="5">Semester 5</option>
            <option value="6">Semester 6</option>
            <!-- Add more options for other semesters as needed -->
        </select>
        <br>
        <label for="attendance_csv">Select CSV File:</label>
        <input type="file" id="attendance_csv" name="attendance_csv" accept=".csv" required>
        <button type="submit" name="upload">Upload Attendance</button>
    </form>
</body>
</html>