<?php 
  include "cone.php";
  
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
         /* Style the signup form similar to the login form */
         .container {
    display: flex;
    justify-content: flex-end;
    height: calc(100vh - 60px); /* Subtract the height of the navbar to ensure the container doesn't overlap with the navbar */
    margin-top:30px;
    background-color: #f5f5f5;
    width: 100%; /* Set the container width to 100% to take the full width of the viewport */
    padding: 0; 
        }
        .signup-container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 100%; 
    margin-right: 20px; /* Add this line to create a space between the container and the right edge */
    
  }
  .signup{
    display: block;
    max-width: 150px;
    height:100px;
    margin: 0 auto;
    position: absolute;
    top:100px;
    right:700px;
  }
  .signup-form {
    background-color: #f9f9f9;
    border: 1px solid #dddddd;
    padding: 30px;
    border-radius: 6px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
  }

.signup-container h2 {
  text-align: center;
  margin-bottom: 20px;
  color: #333333;
}

.form-group {
  margin-bottom: 10px;
}

.form-control {
  padding: 12px;
  border: 1px solid #dddddd;
  border-radius: 5px;
  width: 100%;
  font-size: 16px;
}

.form-control:focus {
  border-color: #007bff;
}

.btn-primary {
  background-color: #007bff;
  color: #ffffff;
  padding: 12px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  width: 100%;
  transition: background-color 0.3s;
}

.btn-primary:hover {
  background-color: #0056b3;
}

.error {
  color: #ff0000;
  margin-bottom: 10px;
}


</style>
</head>
<body>
<?php
include 'navbar.php';
?>
  
    <!-- signup form HTML here -->
    <div class="container">
    <img src="logo.jpg"  alt="signup" class="signup">
        <div class="signup-container">
            <form method="POST" id="signupForm" class="signup-form">
                <h2>Sign Up</h2>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your @stanley.edu.in email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select id="role" name="role" class="form-control">
                        <option value="student">Student</option>
                        <option value="mentor">Mentor</option>
                    </select>
                </div>
                <?php if (isset($errors['email'])) : ?>
                    <div class="error">
                        <?php echo $errors['email']; ?>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
    
        <?php if (isset($errors['email'])) : ?>
            <div class="error">
                <?php echo $errors['email']; ?>
            </div>
        <?php endif; ?>
      
    
</body>
</html>