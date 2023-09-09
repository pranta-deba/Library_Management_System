<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="Assets/Images/homeimg.jpg" alt="First slide">
      <div class="position-absolute top-50 start-50 translate-middle">


        <?php if (isset($_SESSION['loggedin'])  && $_SESSION['loggedin'] == true) {
        } else { ?>
          <h5 class="text-center d-none d-md-block"><a href="login.php" class="text-uppercase font-weight-bolder text-decoration-none text-white px-5 text-center btn btn-outline-danger">Login</a></h5>
        <?php }; ?> 
        <h1 class="text-uppercase d-md-block display-2" style=" margin: 40px auto;
              font-family: 'Ubuntu', sans-serif;
              font-weight: bold;
              color: #000;
              text-align: center;
              letter-spacing: 5px;
              text-shadow: 0 2px 3px orange, 
                  1px 3px 4px orange, 
                  0 8px 3px #474747, 
                  0 11px 4px #747474,
                  0 14px 4px #565656,
                  0 17px 4px #343434,
                  0 20px 4px #171717;">The Library...</h1>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="Assets/Images/homeimg.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="Assets/Images/homeimg.jpg" alt="Third slide">
    </div>
  </div>
</div>