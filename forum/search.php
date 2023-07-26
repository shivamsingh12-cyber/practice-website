<!DOCTYPE html>
<html lang="en">

<head>
  <!-- INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES ('1', 'Python', 'Python is awesome.', current_timestamp()); -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>CodeMe</title>
  <style>
    #maincontainer{
        min-height:100vh;
    }
  </style>
</head>

<body>
  <?php
            require "partials/dbconnect.php";
            require "partials/_nav.php";
  ?>


            <div class="container my-3" id="maincontainer">
                <h1 class="py-2">Search result for <em>"<?php echo $_GET['search']?>"</em></h1>
                <?php
                $noresults=true;
                $query=$_GET["search"];
     $sql="SELECT * FROM `threads` WHERE MATCH (thread_title,thread_desc) against ('$query')";
     $result=mysqli_query($conn, $sql);
     while ($row=mysqli_fetch_assoc($result)) {
       $title = $row['thread_title'];
       $desc = $row['thread_desc'];
       $thread_id = $row['thread_id'];
       $url="thread.php?threadid=".$thread_id;
       $noresults=false;
                
       echo '<div class="result">
       <h3><a href="'.$url.'" class="text-dark">'.$title.'</a> </h3>
       <p>'.$desc.'</p>
            </div>';
      
     }
     if ($noresults) {
        echo '<div class="jumbotron jumbotron-fluid>
        <div class=" container">
        <p class="display-4">No Results Found</p>
        <p class="lead">Suggestions:
        make sure that alll words are spelled correctly
        </p>
        </div>
        </div>';
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