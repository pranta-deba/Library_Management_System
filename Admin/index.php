<?php
require "Include/adminCheak.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../Assets/Css/bootstrap.min.css">
  <link rel="stylesheet" href="../Assets/Css/style.css">
</head>

<body>

  <?php include "Templete/navbar.php"; ?>


  <div class="container">
    <div class="row">
      <div class="col-lg-12 p-5">
        <h1> <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</h1>
        <hr />
      </div>
    </div>
    <div class="row d-flex justify-content-center">
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2 p-2">
        <a class="text-decoration-none" href="writers.php">
          <div class="card p-3 shadow bg-purple text-center border-0">
            <div class="card-body">
              <i class="bi bi-pencil-square display-3"></i>
              <hr />
              <p class="card-title lead text-danger fw-bold">Writers : 34</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2 p-2">
        <a class="text-decoration-none" href="books.php">
          <div class="card p-3 shadow bg-purple text-center border-0">
            <div class="card-body">
              <i class="bi bi-book display-3"></i>
              <hr />
              <p class="card-title lead text-danger fw-bold">Books : </p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2 p-2">
        <a class="text-decoration-none" href="#">
          <div class="card p-3 shadow bg-purple text-center border-0">
            <div class="card-body">
              <i class="bi bi-people display-3"></i>
              <hr />
              <p class="card-title lead text-danger fw-bold">Users : </p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2 p-2">
        <a class="text-decoration-none" href="#">
          <div class="card p-3 shadow bg-purple text-center border-0">
            <div class="card-body">
              <i class="bi bi-book-half display-3"></i>
              <hr />
              <p class="card-title lead text-danger fw-bold">Took books : </p>
            </div>
          </div>
        </a>
      </div>



    </div>
  </div>


  <script src="../Assets/Js/code.jquery.com_jquery-3.7.1.min.js"></script>
  <script src="../Assets/Js/bootstrap.bundle.min.js"></script>
  <script src="../Assets/Js/admin.js"></script>

</html>