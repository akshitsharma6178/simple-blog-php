<?php
include('header.php');
if(isset($_SESSION['login_user']))
   {header("Location: loggedin.php");}
else
{    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="NAME">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="PASSWORD" required>
       
        <input type="submit" name="submit" value="Login">
        </br>
        <h5>New user? 
        <a href="register.php">Sign Up</a>
        </h5>
    </form>
</body>
</html>
<?php
include('footer.php');

if(isset($_POST['submit']))
{
   
   $user=$_POST['name'];
$pass=$_POST['password'];
    $conn=mysqli_connect('localhost', 'root', "", 'project');
$sql="SELECT password FROM user WHERE username='$user'";
$res= mysqli_fetch_assoc(mysqli_query($conn, $sql));

 mysqli_close($conn);
//var_dump($res);echo "</br>";
 //var_dump($pass);
if($res['password']==$pass)
     { $_SESSION['login_user']=$user;
     header("Location:loggedin.php");
     }
else
{echo "Username or Password is incorrect";}
}
}
?>


