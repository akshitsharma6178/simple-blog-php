<?php include("header.php");
if(isset($_SESSION["login_user"])) {
$conn=mysqli_connect('localhost', 'root', "", 'project');
$sql="SELECT * FROM comments";
$res= mysqli_query($conn, $sql);
$message = "";
if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['sno'])){
  $sno = $_POST['sno'];
  $sql = "DELETE FROM comments WHERE sno = ".mysqli_real_escape_string($conn, $_POST['sno']);
  if (mysqli_query($conn, $sql)) {$message = "Successfully done";}
  else {$message = "Unable to complete";}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    
       <h1>ALL ACTIVE POSTS</h1>
       <h3><?php echo $message; ?></h3>
       <table>
       <tr>
           <td><h2>NAME&nbsp;&nbsp;&nbsp;</h2></td>
           <td><h2>TITLE&nbsp;&nbsp;&nbsp;</h2></td>
           <td><h2>CATEGORY&nbsp;&nbsp;&nbsp;</h2></td>
           <td><h2>DATE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2></td>
           <td><h2>REMOVE</h2></td>
           
       </tr>
       <?php 
       while($res1=mysqli_fetch_assoc($res))
        {//unset($_POST['rem']);
    //var_dump($_POST['rem']);
    ?>
      
       
         
        <tr>
            <td><h4><?php echo $res1['username']; ?></h4></td>
            <td><h4><?php echo $res1['Title']; ?></h4></td>
            <td><h4><?php echo $res1['category']; ?> </h4></td>
            <td><h4><?php echo gmdate(" Y-m-d ", $res1['date']); ?></h4></td>
            <td>
              <form action method="post">
                <input type="hidden" name="sno" value="<?php echo $res1['sno']; ?>">
                <input type="submit" name="rem" value="Remove Post">
              </form>
            </td>
        </tr>
        <?php  } ?>
    </table>
    
    
</body>
</html>
<?php }
    else 
     {header("Location: login.php"); }
include("footer.php");?>