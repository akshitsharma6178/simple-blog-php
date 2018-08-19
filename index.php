<?php include('header.php');  
$conn=mysqli_connect('localhost', 'root', "", 'project');
$sql="SELECT * FROM comments";
$rowe= mysqli_query($conn, $sql);
while($row=mysqli_fetch_assoc($rowe))
{    

?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $row['Title'];?></h1>

                <!-- Author -->
                <p class="lead">
                    by<?php echo $row['username'];?>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span><?php echo " Posted on " . gmdate(" Y-m-d H:i:s", $row['date']); ?> </p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="http://localhost/hmrpro/img/fps.png" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $row['content'];
}?></p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form  method="post">
                        <div class="form-group">
                            <input type="text" style="height: 100px; width: 650px;" name="comment">
                        </div>
                        <input type="submit" class="btn btn-primary " name="submit">
                    </form>
                </div>

                <hr>
                <?php
                if(isset($_POST['submit'] ))
                {$content=$_POST['comment'];
                 $u=$_SESSION['login_user'];
                 $d=time();
                 
                 
                 $conn=mysqli_connect('localhost', 'root', "", 'project');
$sql="INSERT INTO `ucomments` (`username`, `date`, `comment`) VALUES ('$u', '$d', '$content')";
mysqli_query($conn, $sql);
mysqli_close($conn);
                 unset($_POST);
                 unset($_REQUEST);
                 
                 
                
                
                }
                ?>

                <!-- Posted Comments -->
<?php
                $conn=mysqli_connect('localhost', 'root', "", 'project');
$sql1="SELECT * FROM ucomments";
$user1=mysqli_query($conn, $sql1);
while($row1=mysqli_fetch_assoc($user1))                
{
                ?>
               
                <!-- Comment -->
                <div class="media">
                    <a  href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php 
    
                              if(isset($_SESSION['login_user']))
                              {}
                            else
                            {
                               $sqli="UPDATE `ucomments` SET `username` = 'Anonymous'";
                             mysqli_query($conn,$sqli);
                            }
                                echo $row1['username']; 
                            
                            ?>
                            <small><?php echo " Posted on " . gmdate(" Y-m-d H:i:s", $row1['date']); ?></small>
                        </h4>
                        <?php echo $row1['comment'];}
                        ?>
                        </br></br>
                    </div>
        </div>
        
                
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4-lg-6">

                <!-- Blog Search Well -->
                
                   <div>
                   <div class="well" >
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <form method="post"> <input type="text" class="form-control" name="postname" placeholder="Enter Post Name">
                                                    
                           <span class="input-group-btn">
                            <input  class="btn btn-default" type="submit" value="Search" name="Src"></form>
                                <span class="glyphicon glyphicon-search"></span>
                            </form>
                    </div>
                    <!-- /.input-group -->
                <?php if (isset($_POST["Src"])){
    $conn=    
    $name=$_POST["postname"];
    $conn=mysqli_connect('localhost', 'root', "", 'project');                    
    $sql="SELECT * FROM `comments`
 WHERE Title='$name'  ";
                    $res=mysqli_fetch_assoc(mysqli_query($conn,$sql));               
    echo "</br>" . "NAME:  ". $res['username'] ."</br>";
                    echo "TITLE:  ". $res['Title'] ."</br>";
                    echo "CATEGORY: ". $res['category']. "</br>";
}?>
                </div></div>

                

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <?php include('footer.php');?>