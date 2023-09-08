<?php 
  include('con.php')

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
    
    
    .container {
    display: flex;
    justify-content:flex-end;
    align-items:center;
    height: calc(100vh - 60px); /* Subtract the height of the navbar to ensure the container doesn't overlap with the navbar */
    margin-top:30px;
    background-color: #f8f5f5;
    width: 100%; /* Set the container width to 100% to take the full width of the viewport */
    padding: 0; 
    position: relative;
  
  
  }
  .login-container {
    background-color: #f9f9f9;
    border: 1px solid #dddddd;
    padding: 30px;
    border-radius: 6px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
    margin-right: 380px; /* Create space between the picture and the form */
    
  }
 .login{
    display: block;
    max-width: 100px;
    height:70px;
    margin: 0 auto;
    position: absolute;
    top:60px;
    right:560px;
    transition: right 0.3s ease-in-out;
  }
  
  .login-form {
    background-color: #f9f9f9;
    border: 1px solid #dddddd;
    padding: 30px;
    border-radius: 6px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
  }
  
  .login-form h2 {
    text-align: center;
    margin-bottom: 40px;
    color: #333333;
  }
  .container.mentor-selected .login {
    right: 250px;
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
    background-color: #3834a2;
  }
  
  .error {
    color: #ff0000;
    margin-bottom: 10px;
  }
  
  #signupLink {
    text-align: center;
    margin-top: 20px;
  }
  
  #signupLink a {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
  }
  
  #signupLink a:hover {
    text-decoration: underline;
  }
  


  </style>
</head>
<body>
  <?php include 'navbar.php' ?>
  
  <div class="container">
    <img src="logo.jpg"  alt="login "class="login" id="loginImage">

        <div class="login-container">
         <form method="POST" id="loginForm" class="login-form">
            
            <h2>Login</h2>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Enter your @stanley.edu.in email" required>
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
            <?php if (isset($errors['login'])) : ?>
            <div class="error">
                <?php echo $errors['login']; ?>
            </div>
            <?php endif; ?>
            <div class="form-group">
                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </div>
            
            <div id="signupLink">
                <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
            </div>
        </form>
    </div>
    
    
</body>
</html>
