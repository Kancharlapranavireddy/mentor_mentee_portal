<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  
</head>

<style>
    .contactUs {
    padding: 40px;
    text-align: center;
  }
  
  .contactUs .title {
    margin-bottom: 20px;
  }
  
  .contactUs .title h2 {
    color: #1f1e1e;
    font-size: 24px;
  }
  
  .contactUs .contact {
    margin-bottom: 20px;
    background-color: #fdf2f2;
    padding: 20px;
    box-shadow: 0 5px 35px rgba(0, 0, 0, 0.15);
  }
  
  .contactUs .contact h3 {
    color: #0e3959;
    font-size: 20px;
    font-weight: 500;
    margin-bottom: 10px;
  }
  
  .contactUs .contact .infoBox div {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
  }
  
  .contactUs .contact .infoBox span {
    margin-right: 10px;
    color: #0e3959;
    font-size: 16px;
  }
  
  .contactUs .contact .infoBox a {
    color: #0e3959;
  }
  
 
  
  .contactUs .map iframe {
    width: 100%;
    height: 100%;
  }
  </style>
  <body>
  <?php include 'navbar.php' ?>
  <div class="contactUs">
    <div class="title"> 
        <h2>Contact Us</h2>
    </div>
    
<div class="contact info"> 
    <h3>Contact Info</h3>
<div class="infoBox" >
<div>
<span><ion-icon name="location-outline"></ion-icon></span>
<p>Abids,Chapel Road <br>Hyderabad</p>
</div>
<div>
<span><ion-icon name="mail"></ion-icon></span>
<a href="#">stanleycollege@email.com</a>
</div> 
<div>
<span><ion-icon name="call-outline"></ion-icon></span>
<a href="#">040 27812123</a>


</div>
 
<div class="contact map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3807.3186438500984!2d78.4730265!3d17.396489300000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb97625935a20f%3A0x58f1f866d641477d!2sStanley%20College%20of%20Engineering%20%26%20Technology%20for%20Women!5e0!3m2!1sen!2sin!4v1684614072687!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

</div>
</div> 
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
  