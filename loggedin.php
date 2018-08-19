<?php/*desig 
1= admin
2= user
*/?>


<?php
   include('header.php');
        if(isset($_SESSION['login_user']))
         {    $conn=mysqli_connect('localhost', 'root', "", 'project');
              $user=$_SESSION['login_user'] ;
              $sql="SELECT COUNT(*) FROM comments WHERE username='$user'";
              $sql1="SELECT * FROM user WHERE username='$user'";
              $sql2="SELECT COUNT(*) FROM comments";
              $res= mysqli_fetch_assoc(mysqli_query($conn, $sql));
              $res1=mysqli_fetch_assoc(mysqli_query($conn, $sql1));
              $res2=mysqli_fetch_assoc(mysqli_query($conn, $sql2));
              mysqli_close($conn);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
    <?php if($res1['desig']==1)
  { ?>
      
    <h1>WELCOME <?php echo $user;?></h1>
    </br>
     <h6><?php echo "(ADMINISTATOR)";?> </h6>
     <a href="newcomm.php"><h3>NEW POST</h3></a>
     <a href="rempost.php"><h3>REMOVE POSTS</h3></a>
     <a href="man_user.php"><h3>MANAGE USERS</h3></a>
     <a href="cnt.php"><h3>CONTACT PAGE CONTENT</h3></a>
     <a href="Services.php"><h3>SERVICES PAGE CONTENT</h3></a>
     <h2>TOTAL POSTS=<?php echo $res2['COUNT(*)']?></h2>
     
     <h5><a href="logout.php"> LOGOUT</a></h5>
    
    
    
    
    
    <?php }
     else if($res1['desig']==2)
     { ?>
     <h1>WELCOME <?php echo $user;?></h1>
    </br>
     <a href="newcomm.php"><h3>NEW POST</h3></a>
     <a href="rempost.php"><h3>REMOVE POSTS</h3></a>
     <h2>TOTAL POSTS=<?php echo $res['COUNT(*)']?></h2>
     
     <h5><a href="logout.php"> LOGOUT</a></h5>
     <?php } ?>
    

</body>
</html>

<?php

      include('footer.php');
}
else
header("Location: login.php");
?>