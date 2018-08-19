<?php
 include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
</head>
<body>
    <h2>Contact Us</h2>
        <?php
         $conn=mysqli_connect('localhost', 'root', "", 'project');
         $sql="SELECT data FROM contactpage";
         $res= mysqli_fetch_assoc(mysqli_query($conn, $sql));
         echo $res["data"];
    ?>
    
</body>
</html>
<?php
include('footer.php');
?>