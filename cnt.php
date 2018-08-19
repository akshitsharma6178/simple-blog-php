<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Page Content</title>
</head>
<body>
    <h2>Contact Page Data</h2>
    </br>
       
       
    <?php
         $conn=mysqli_connect('localhost', 'root', "", 'project');
         $sql="SELECT data FROM contactpage";
         $res= mysqli_fetch_assoc(mysqli_query($conn, $sql));
         echo $res["data"];
    ?>
    
    
    
    
    
</body>
</html>