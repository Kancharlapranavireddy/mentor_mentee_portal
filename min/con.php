<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "demo";
$errors = array();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

if (!$conn) {
    die("error" . mysqli_connect_error());
}

if (isset($_POST['login'])) {
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $password = $_POST['password'];

    if (empty($role) || empty($password)) {
        $errors['login'] = "Invalid role or password";
    } else {
        if ($role === 'student') {
            // Student login with username
            $username = mysqli_real_escape_string($conn, $_POST['email']);

            if (empty($username)) {
                $errors['login'] = "Invalid username or password";
            } else {
                $query = "SELECT * FROM pass WHERE username=? AND role=?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ss", $username, $role);
            }
        } elseif ($role === 'mentor') {
            // Mentor login with email
            $email = mysqli_real_escape_string($conn, $_POST['email']);

            if (empty($email)) {
                $errors['login'] = "Invalid email or password";
            } else {
                $query = "SELECT * FROM pass WHERE email=? AND role=?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ss", $email, $role);
            }
        } else {
            $errors['login'] = "Invalid role or password";
        }

        // Proceed with login if no errors
        if (count($errors) === 0) {
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $storedHash = $row['pass'];
                $username = $row['username'];
                $email = $row['email'];

                if (password_verify($password, $storedHash)) {
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $storedHash; // Store the bcrypt hash, not the plaintext password
                    $_SESSION['success'] = "You are now logged in";
                    $_SESSION['role'] = $role;

                    if ($role == 'student') {
                        header('location: student.php');
                        exit();
                    } else {
                        header('location: dashboard.php');
                        exit();
                    }
                } else {
                    $errors['login'] = "Invalid username or password";
                }
            } else {
                $errors['login'] = "Invalid username or password or role or combination";
            }
        }
    }
}

if (isset($_POST['signup'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    // Check if the email is in the correct format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/@stanley\.edu\.in$/", $email)) {
        $errors['email'] = "Invalid email format. Please use an email ending with @stanley.edu.in.";
    }

    // Check if the email already exists in the database
    $query = "SELECT * FROM pass WHERE email=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $errors['email'] = "This email already exists. Please use a different email.";
    }

    // If there are no errors, insert the new user into the database
    if (count($errors) === 0) {
        // Hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert user data into the database
        $query = "INSERT INTO pass (username, email, pass, role) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssss", $username, $email, $hashedPassword, $role);
        $stmt->execute();

        // Redirect to login page after successful signup
        header('location: login.php');
        exit();
    }
}
?>