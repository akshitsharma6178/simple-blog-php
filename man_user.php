<?php include("header.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title</title>
</head>
<body>
      <h1>ALL ACTIVE USERS</h1>   
      <?php
        $conn=mysqli_connect('localhost', 'root', "", 'project');
        $sql="SELECT * FROM user";
        $res1= mysqli_query($conn, $sql);
       ?>
      <table>
          <tr>
              <td><h2>Username&nbsp;&nbsp;&nbsp;</h2></td>
              <td><h2>Administator Access&nbsp;&nbsp;&nbsp;</h2></td>
              <td><h2>Give Administator Access</h2></td>
          </tr>
          <?php  $cnt=0; while($res=mysqli_fetch_assoc($res1))
{    ?>
         <tr>
             <td><h3><?php echo $res['username'];?></h3></td>
             <td><h3><centre><?php if($res['desig']==1){echo 'Yes';}else {echo 'No';}?></centre></h3></td>
             <?php if($res['desig']==1)
{?>
             <td><h3>Already an Admin</h3></td>
             <?php } elseif($res['desig']==2){ ?>
             <td><form method="post"><input type="submit" name='admin' value='Grant Access'></form></td>
             <?php $user2=array();
                if(isset($_POST['admin']))
                 { $user3=$res['username'];                       
                 $sql3="UPDATE `user` SET `desig` = '1' WHERE `user`.`username` = '$user3'";
                 mysqli_query($conn, $sql3);
                  header("Refresh:0");
                 
                 }
                                             }}
             ?>
         </tr>
         </table>
    </br>

</body>
</html>
<?php

?>