
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
       *{
        padding: 0;
        margin: 0;
        text-decoration: none;
        list-style: none;
        box-sizing: border-box;
       }
       body{
        
    font-family: montserrat;
       }
       nav{
            background: #033747;
            height: 80px;
            width: 100%;
       }
       label.logo{
        color: white;
        font-size: 20px;
        line-height: 80px;
        
       }
        nav ul{
            float: right;
        }
        nav ul li{
            display: inline-block;
            line-height: 80px;
            margin: 0 5px;
        }
        nav ul li a{
            color: white;
            font-size: 17px;
            text-transform: uppercase;
        }
        a:hover{
            color: yellow;
            transition: all 0.4s ease 0s;
  
        }
       

    </style>
</head>
<body>
    <nav>
        <label class="logo">STANLEY COLLEGE OF ENGINEERING AND TECHNOLOGY FOR WOMEN</label>
            
                <ul>
                  <li><a class="active" href="indexx.php">Home</a></li>
                  <li><a href="about.php">About</a></li>
                  <li><a href="cu.php">Contact</a></li>
                  <li><a href="logout.php">Logout</a></li>
                </ul>
                
           
        
    </nav>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/js/bootstrap.min.js"></script>
</body>
</head>