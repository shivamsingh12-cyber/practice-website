<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>CodeMe</title>

  <style>
    .container {
      min-height: 85vh;
    }
  </style>
</head>

<body>
  <?php
            require "partials/dbconnect.php";
            require "partials/_nav.php";
  ?>

  <div class="container my-4">
    <h2 class="text-center">Contact Us</h2>
  <form action="<?php  $_SERVER['REQUEST_URI'];?>" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Your Concern</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
        <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
      </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

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