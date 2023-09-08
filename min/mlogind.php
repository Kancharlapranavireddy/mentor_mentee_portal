<?php include 'navbar.php' ?>
<?php include 'con.php' ?>

<!DOCTYPE html>

<html>
    <head>
       <title>mentor</title>
    </head>
    <body>
        <table>
            <tr>
                <th>name</th>
                <th>cgpa</th>
                <th>backlogs</th>
                
        
            </tr>
            
             <?php 
                $conn = mysqli_connect ("localhost", "root", "","demo");
                $username = $_SESSION['username'];
                if(!$conn){
                   die("error".mysqli_connect_error());
               }   
        
            
               
            $sql = "SELECT  name,cgpa, backlogs from student WHERE mentor='$username' ";
            $result = $conn-> query($sql);
            if ($result-> num_rows > 0) {
                while ($row = $result-> fetch_assoc()) {
                    echo "<tr><td>" . $row["name"] . "</td><td>" . $row["cgpa"] ."</td><td>" . $row["backlogs"] . "</td></tr>";
                } 
                echo "</table>";

            }    
            else {
                echo "0";
            }    
            $conn-> close();
               ?>

    
                    
    
        </table>
    </body>
</html>>


