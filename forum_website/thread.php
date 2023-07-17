<!DOCTYPE html>
<html lang="en">

<head>
    <!-- INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('1', 'unable to install pyaudio. help me', 'bhai install nhi ho rha h koi madad kro meri bhai.', '1', '0', current_timestamp()); -->
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
            require "headers/dbconnect.php";
            require "headers/nav.php";
  ?>
    <!-- carousel -->

    <div class="container my-4">
    <?php
      $id=$_GET['threadid'];
      $sql="SELECT * FROM threads where thread_id='$id'";
      $result=mysqli_query($conn, $sql);
      while ($row=mysqli_fetch_assoc($result)) {
        $title=$row['thread_title'];
        $desc=$row['thread_desc'];
       
      }
      ?>
      <div class='jumbotron'>
        <h1 class='display-4'> <?php echo $title ?> </h1>
        <p class='lead'><?php echo $desc ?></p>
        <hr class='my-4'>
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
      <p>Posted by: <b>Shivam</b> </p>  
    </div>
       
    </div>
    <div class="container my-4" id="ques">
        <h2>Discussion</h2>
        <!-- <?php
      $sql="SELECT * FROM `threads` WHERE thread_cat_id=$id";
      $result=mysqli_query($conn, $sql);
      while ($row=mysqli_fetch_assoc($result)) {
        $thread_title=$row['thread_title'];
        $thread_desc=$row['thread_desc'];
        $thread_id=$row['thread_id'];
        echo "    <div class='media my-3'>
        <img src='img/slide-1.jpeg' class='mr-3' alt='...' width='54px'>
        <div class='media-body'>
          <h5 class='mt-0'><a href='thread.php'>".$thread_title."</a></h5>
         ".$thread_desc."
        </div>
      </div>";
      } 
      ?>-->
  

    </div>
    <?php
            require "headers/footer.php";
  ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</body>

</html>