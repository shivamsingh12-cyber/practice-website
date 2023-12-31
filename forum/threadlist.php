<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>CodeMe</title>

  <style>
    #ques {
      min-height: 433px;
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
      $id=$_GET['catid'];
      $sql="SELECT * FROM categories where category_id='$id'";
      $result=mysqli_query($conn, $sql);
      while ($row=mysqli_fetch_assoc($result)) {
        $category_name=$row['category_name'];
        $category_desc=$row['category_description'];
        $categoryid=$row['category_id'];

      }
      ?>
    <div class='jumbotron'>
      <h1 class='display-4'> Welcome to <?php echo $category_name; ?> forum
      </h1>
      <p class='lead'>
        <?php echo $category_desc ?>
      </p>
      <hr class='my-4'>
      <p>It uses utility classes for typography and spacing to space content out within the larger container.lorem12.</p>
       <button class="btn btn-success">Learn more</button></b>
    </div>
    <?php
   $showAlert=false;
    $method=$_SERVER['REQUEST_METHOD'];

    if ($method=='POST') {                                                                     
          $sno=$_POST['sno'];
          $th_title=$_POST['title'];
          $th_desc=$_POST['desc'];

          $th_title=str_replace("<","&lt;",$th_title);
          $th_title=str_replace(">","&gt;",$th_title);

          $th_desc=str_replace("<","&lt;",$th_desc);
          $th_desc=str_replace(">","&gt;",$th_desc);
         
          $sql="INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
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
    <?php
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
    echo '<div class="container">
    <h2>Start a Discussion</h2>
    <form action="'. $_SERVER["REQUEST_URI"].'" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Elaborate concern</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc"></textarea>
        <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div> 
  </div>';
      }
      else{
        echo '<div class="container">
        <h2>Start a Discussion</h2>
        <form action="'. $_SERVER["REQUEST_URI"].'" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1 "><p class="lead">
            you are not login !  Please first login    </p></label>
          
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1 "></label>
           
          </div>
    
     
        </form>
      </div> 
      </div>';
      }
    ?>




  
  <div class="container my-4 mb-0" id="ques">
    <h2>Browse Questions</h2>
    <?php
    $id=$_GET['catid'];
        $noResult=true;
      $sql="SELECT * FROM `threads` WHERE thread_cat_id=$id";
      $result=mysqli_query($conn, $sql);
      while ($row=mysqli_fetch_assoc($result)) {
        $noResult=false;
        $thread_title=$row['thread_title'];
        $thread_user=$row['thread_user_id'];
        $thread_desc=$row['thread_desc'];
        $thread_id=$row['thread_id'];


        $time=date("dS F Y g:s:i",strtotime($row['timestamp']));
        $sql2="SELECT user_email FROM `users` WHERE sno='$thread_user'";
        $result2=mysqli_query($conn, $sql2);
        $row2=mysqli_fetch_assoc($result2);
    
 

        echo " <div class='media my-3'>
        <img src='img/slide-1.jpeg' class='mr-3' alt='...' width='54px'>
        <div class='media-body'>
        <p class='font-weight-bold my-0'>".$row2['user_email']."
 at ".$time."</p>
          <h5 class='mt-0'><a href='thread.php?threadid=".$thread_id."'>".$thread_title."</a></h5>
         ".$thread_desc."
        </div>
      </div>";
      }
      if ($noResult) {
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