<nav class="navbar navbar-expand-lg navbar-danger bg-danger">
  <div class="container-fluid">
    <a class="nav-link mx-2" href="index.php">
      <img src="Assets/Images/logo.png" height="70" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mx-3" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white text-uppercase" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white text-uppercase" href="books.php">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white text-uppercase" href="about.php">About</a>
        </li>
        <?php if (isset($_SESSION['loggedin'])  && $_SESSION['loggedin'] && $_SESSION['role'] == "admin") { ?>
          <li class="nav-item">
            <a class="nav-link active text-white text-uppercase" href="Admin/index.php">dashboard</a>
          </li>
        <?php }; ?>
      </ul>

      <form class="d-flex me-2">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-info" type="submit">Search</button>
      </form>

      <ul class="navbar-nav mb-2 mb-lg-0">

        <?php if (isset($_SESSION['loggedin'])  && $_SESSION['loggedin'] == true) {?>


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="javascript:void(0);" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $_SESSION['username']; ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end bg-danger border border-dark" aria-labelledby="navbarDropdown">
              <li class="bg-danger"><a class="dropdown-item active text-white bg-danger text-uppercase" href="profile.php">Profile</a></li>
              <li class="bg-danger"><a class="dropdown-item active text-white bg-danger text-uppercase" href="include/logout.php">Logout</a></li>
            </ul>
          </li>




          
        <?php } else { ?>
          <li class="nav-item m-2"><a class="dropdown-item active text-white text-uppercase" href="login.php">Login</a></li>
          <li class="nav-item m-2"><a class="dropdown-item active text-white text-uppercase" href="register.php">Registration</a></li>
        <?php }; ?>
      </ul>
    </div>
  </div>
</nav>