<nav class="navbar navbar-expand-lg navbar-dark  bg-danger" id="headerNav">
  <div class="container-fluid">
    <a class="navbar-brand d-block d-lg-none" href="../index.php">
      <img src="../Assets/Images/logo.png" height="80" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class=" collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mx-auto text-uppercase">
        <li class="nav-item">
          <a class="nav-link mx-2 active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2 active" aria-current="page" href="message.php">Message</a>
        </li>
        <li class="nav-item d-none d-lg-block">
          <a class="nav-link mx-2" href="../index.php">
            <img src="../Assets/Images/logo.png" height="80" />
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link mx-2 active" aria-current="page" href="access.php">Access</a>
        </li>
          <li class="nav-item dropdown">
            <a class="nav-link mx-2 dropdown-toggle active" href="javascript:void(0);" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $_SESSION['firstname']; ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="../profile.php">Profile</a></li>
              <li><a class="dropdown-item" href="../include/logout.php">Logout</a></li>
            </ul>
          </li>
      </ul>
    </div>
  </div>
</nav>