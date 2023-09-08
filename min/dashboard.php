<?php
include "nav1.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="dashboard.css" />
  <!-- Font Awesome Cdn Link -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<style>
	*{
  margin: 0;
  padding: 0;
  outline: none;
  border: none;
  text-decoration: none;
  box-sizing: border-box;
  
}
body{
  background: #dfe9f5;
}

.main{
  position: relative;
  padding: 20px;
  width: 100%;
}
.main-top{
  display: flex;
  width: 100%;
}
.main-top i{
  position: absolute;
  right: 0;
  margin: 10px 30px;
  color: rgb(110, 109, 109);
  cursor: pointer;
}
.main-skills{
  display: flex;
  justify-content:center;
  margin-top: 150px;
}
.main-skills .card{
  width: 25%;
  margin: 10px;
  background: #fff;
  text-align: center;
  border-radius: 20px;
  padding: 10px;
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
}
.main-skills .card h3{
  margin: 10px;
  text-transform: capitalize;
}
.main-skills .card p{
  font-size: 12px;
}
.main-skills .card button{
  background: rgb(183, 81, 44);
  color: #0e0d0d;
  padding: 7px 15px;
  border-radius: 10px;
  margin-top: 15px;
  cursor: pointer;
  text-decoration:none;
  
}
.main-skills .card button:hover{
  background: rgba(223, 70, 15, 0.856);
}
.main-skills .card i{
  font-size: 22px;
  padding: 10px;
}
</style>
<body>
  
    <section class="main">
      <div class="main-top">
        <h1>Dashboard</h1>
      </div>
      <div class="main-skills">
        <div class="card">
          <i class="fas fa-female"></i>
          <h3>Personal Information</h3>
          <p>See students personal details</p>
          <button><a href="pi.php" class="text-light">Show</a></button>
        </div>
        <div class="card">
          <i class="fas fa-book"></i>
          <h3>Academic Information</h3>
          <p>See students academic information</p>
          <button><a href="display.php" class="text-light">Show</a></button>
        </div>
        <div class="card">
          <i class="fas fa-percentage"></i>
          <h3>Attendance</h3>
          <p>See students attendance</p>
          <button><a href="attendance.php" class="text-light">Show</a></button>
        </div>
        <div class="card">
          <i class="fas fa-percentage"></i>
          <h3>View Details</h3>
          <p>View Student Details</p>
          <button><a href="view2.php" class="text-light">Show</a></button>
        </div>
        <div class="card">
          <i class="fas fa-percentage"></i>
          <h3>Uploads</h3>
          <p>Upload circulars</p>
          <button><a href="cir.php" class="text-light">Show</a></button>
        </div>
    
      </div>

      
        
      </section>
    </section>
  </div>
</body>
</html>