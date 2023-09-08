<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
    .about-us{
  height:100%;
  width: 100%;
  padding: 90px 0;
  background: #ddd;
}
.pic{
  height: auto;
  width:  302px;
}
.about{
  width: 1130px;
  max-width: 85%;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-around;
}
.text{
  width: 540px;
}
.text h2{
  font-size: 90px;
  font-weight: 600;
  margin-bottom: 10px;

}
.text h5{
  font-size: 22px;
  font-weight: 500;
  margin-bottom: 20px;
}
span{
  color: #4070f4;
}
.text p{
  font-size: 18px;
  line-height: 25px;
  letter-spacing: 1px;
}
.data{
  margin-top: 30px;
}
.hire{
  font-size: 18px;
  background: #4070f4;
  color: #fff;
  text-decoration: none;
  border: none;
  padding: 8px 25px;
  border-radius: 6px;
  transition: 0.5s;
}
.hire:hover{
  background: #000;
  border: 1px solid #4070f4;
}
</style>
</head>
<body>
    <?php include 'navbar.php'?>
    <section class="about-us">
    <div class="about">
       <img src="about.jpg" class="pic">
      <div class="text">
        <h2>About Us</h2>
          <p>Stanley College of Engineering and Technology for Women – a temple of learning was established in the year 2008 on a sprawling 6-acre campus of historic Stanley College campus at Abids, Hyderabad.

            The college provides a serene and tranquil environment to the students, boosting their mental potential and preparing them in all aspects to face the cut-throat global competition with a smile on the face and emerge victorious. Stanley College of Engineering and Technology for Women has been established with the support of Methodist Church of India that has been gracious and instrumental in making the vision of an Engineering College on this campus a reality.
           
           ​The College is affiliated to the prestigious Osmania University, Hyderabad. it has been approved by AICTE, New Delhi & permitted by the Government of Telangana . it has been sanctioned six UG – courses Computer Science & Engineering, Electronics and Communication Engineering ,Electrical and Electronics Engineering, Information Technology, Computer Engineering, Artificial Intelligence and Data Science  and three PG courses M.Tech in CSE, M.E in Embedded systems and Masters Degree in Business Administration.</p>
        <div class="data">
        <a href="#" class="About"></a>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
