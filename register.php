<?php include('header.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <form action="" method="post">
    <label for="name">User Name&nbsp;&nbsp;</label>
    <input type="text" name="name" placeholder="USER NAME">
        
    <label for="pass">Password</label>
    <input type="password" name=pass placeholder="PASSWORD" required>
    </br>
    </br></br>
    <input type="submit" name="submit" value="Register">
    </form>
</body>
</html>  
   

   
   
   
   
<?php
if(isset($_POST['submit'])) 
{$user=$_POST['name'];
 $pass=$_POST['pass'];
  
        
            
$conn=mysqli_connect('localhost', 'root', "", 'project');
$sql="INSERT INTO `user` (`username`, `password`,`desig`) VALUES ('$user', '$pass', '2')";
mysqli_query($conn, $sql);
mysqli_close($conn);
}
include('footer.php'); 

?>