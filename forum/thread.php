<!DOCTYPE html>
<html lang="en">

<head>
    <!-- INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('1', 'this is a comment', '1', '0', current_timestamp()); -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>CodeMe</title>

    <style>
        #ques{
            min-height:433px;
        }
    </style>
</head>

<body>
    <?php
            require "partials/dbconnect.php";
            require "partials/_nav.php";
  ?>


    <div class="container my-4">
    <?php
      $id=$_GET['threadid'];
      $sql="SELECT * FROM `threads` WHERE thread_id='$id'";
      $result=mysqli_query($conn, $sql);
      
      while ($row=mysqli_fetch_assoc($result)) {
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];

        $sql2="SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result2=mysqli_query($conn, $sql2);
        $row2=mysqli_fetch_assoc($result2);
        $posted_by = $row2['user_email'];
       
      }
      ?>

     <?php
   $showAlert=false;
    $method=$_SERVER['REQUEST_METHOD'];
    if ($method=='POST') {
           $sno=$_POST["sno"];
          $comment=$_POST['comment'];
          $comment=str_replace("<","&lt;",$comment);
          $comment=str_replace(">","&gt;",$comment);
          $sql="INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp())";
          $result=mysqli_query($conn, $sql);
          $showAlert=true;
          if ($showAlert) {
            echo '<div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <p>Aww yeah, you have successfully added question.</p>
            <hr>
          </div>';
          }
    } 
    
    ?>

      <div class='jumbotron'>
        <h1 class='display-4'> <?php echo $title; ?> </h1>
        <p class='lead'><?php echo $desc; ?></p>
        <hr class='my-4'>
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
      <p>Posted by: <b><?php echo $posted_by; ?></b> </p>  
    </div>

   
   
      <!-- form -->
      <?php
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
    echo '    <div class="container">
    <h2>Post a comment</h2>
    <form action="'. $_SERVER['REQUEST_URI'].'" method="post">
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Type your comments</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
        <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  </div>';
      }
      else{
        echo '    <div class="container">
        <h2>Post a comment</h2>
        <form action="'. $_SERVER['REQUEST_URI'].'" method="post">
        <div class="form-group">
        <label for="exampleInputEmail1 "><p class="lead">
        you are not login !   Please first login   </p></label>
      
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1 "></label>
       
      </div>
        </form>
      </div>
      </div>';
      }
    ?>


    <div class="container my-4" id="ques">
        <h2>Discussion</h2>
         <?php
         $noResult=false;
      $sql="SELECT * FROM `comments` WHERE thread_id= $id";
      $result=mysqli_query($conn, $sql);
      while ($row=mysqli_fetch_assoc($result)) {
        $noResult=true;
        $comment_id=$row['comment_id'];
        $comment=$row['comment_content'];
        $time=date("dS F Y g:i:s ",strtotime($row['comment_time']));
        $thread_user=$row['comment_by'];

        $sql2="SELECT user_email FROM `users` WHERE sno='$thread_user'";
        $result2=mysqli_query($conn, $sql2);
        $row2=mysqli_fetch_assoc($result2);

        echo "<div class='media my-3'>
        <img src='img/slide-1.jpeg' class='mr-3' alt='...' width='54px'>
        <div class='media-body'>
        <p class='font-weight-bold my-0'>".$row2['user_email']." at ".$time."</p>
         ".$comment."
        </div>
      </div>";
      } 
      if (!$noResult) {
        echo "<div class='jumbotron jumbotron-fluid>
        <div class='container'>
          <h1 class='display-4 text-center'>Be the first to ask</h1>
        </div>
      </div>";
      }
      ?>
  

    </div>
    <?php
            require "partials/_footer.php";
  ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</body>

</html>