<!DOCTYPE html>
<html lang="en">

<head>
  <!-- INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES ('1', 'Python', 'Python is awesome.', current_timestamp()); -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>CodeMe</title>
</head>

<body>
  <?php
            require "headers/dbconnect.php";
            require "headers/nav.php";
  ?>
  <!-- carousel -->
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="img/slid-2.jfif" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/slid-3.jfif" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/slid-4.jfif" class="d-block w-100" alt="...">
    </div>
  </div>
</div>

  <div class="container">
    <h2 class="text-center">Browse categories</h2>
    <div class="row">
      <!-- Use for loop -->
      <div class="col-md-4 my-2">
        <div class="card" style="width: 18rem;">
          <img src="img/slide-1.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
            <a href="#" class="btn btn-primary">View Thread</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 my-2">
        <div class="card" style="width: 18rem;">
          <img src="img/slide-1.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 my-2">
        <div class="card" style="width: 18rem;">
          <img src="img/slide-1.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 my-2">
        <div class="card" style="width: 18rem;">
          <img src="img/slide-1.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 my-2">
        <div class="card" style="width: 18rem;">
          <img src="img/slide-1.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    </div>
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