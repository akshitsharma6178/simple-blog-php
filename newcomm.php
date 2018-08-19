<?php
include('header.php');
if(isset($_SESSION['login_user']))
{   
?>
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <title>New Post</title>
   </head>
   <body>
       <form action="" method="post">
       <label for="title">Title&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
          <input type="text" name="title" placeholder="TITLE" required>
           </br></br>
        <label for="category">Category &nbsp;</label>
          <input type="text" name="category" placeholder="CATEGORY">
       </br></br>
        <p> <div><label for="content" style="positionheight: 100px;">Content&nbsp;&nbsp;&nbsp;&nbsp;</label>
          <input type="text" name="content" style="height: 420px; width: 300px" required></div></p>
        <input type="submit" name="submit">         
     </form>
   </body>
   </html>
<?php
if(isset($_POST['submit'])) 
{$user=$_SESSION['login_user'];
 $title=$_POST['title'];
 $date=time();
 $category=$_POST['category'];
 $content=$_POST['content'];
  
            
$conn=mysqli_connect('localhost', 'root', "", 'project');
$sql="INSERT INTO `comments` (`username`, `Title`, `date`, `category`, `content`) VALUES ('$user', '$title', '$date', '$category', '$content');";
mysqli_query($conn, $sql);
mysqli_close($conn);
 echo "POST SAVED"
    ?>
    <a href="index.php">click here</a> to go back to the home page
    <?php
}
}
   else 
   header("Location: login.php");
include("footer.php");    
    ?>