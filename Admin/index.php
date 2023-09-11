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


<div class="container py-5">
  <div class="row">
    <div class="col-lg-12 p-5">
      <h1> <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</h1>
      <hr />
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2 p-2">
      <a class="text-decoration-none" href="#">
        <div class="card p-3 shadow bg-purple text-center border-0">
          <div class="card-body">
            <i class="fa fa-bookmark-o fa-2x" aria-hidden="true"></i>
            <hr />
            <p class="card-title lead">Offer's</p>
          </div>
        </div>
      </a>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2 p-2">
      <a class="text-decoration-none" href="#">
        <div class="card p-3 shadow bg-purple text-center border-0">
          <div class="card-body">
            <i class="fa fa-edit fa-2x" aria-hidden="true"></i>
            <hr />
            <p class="card-title lead">Blog's</p>
          </div>
        </div>
      </a>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2 p-2">
      <a class="text-decoration-none" href="#">
        <div class="card p-3 shadow bg-purple text-center border-0">
          <div class="card-body">
            <i class="fa fa-image fa-2x" aria-hidden="true"></i>
            <hr />
            <p class="card-title lead">Gallery</p>
          </div>
        </div>
      </a>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2 p-2">
      <a class="text-decoration-none" href="#">
        <div class="card p-3 shadow bg-purple text-center border-0">
          <div class="card-body">
            <i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
            <hr />
            <p class="card-title lead">Enquiry</p>
          </div>
        </div>
      </a>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2 p-2">
      <a class="text-decoration-none" href="#">
        <div class="card p-3 shadow bg-purple text-center border-0">
          <div class="card-body">
            <i class="fa fa-cart-plus fa-2x" aria-hidden="true"></i>
            <hr />
            <p class="card-title lead">Order's</p>
          </div>
        </div>
      </a>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2 p-2">
      <a class="text-decoration-none" href="#" data-toggle="modal" data-target="#modelHELP">
        <div class="card p-3 shadow bg-purple text-center border-0">
          <div class="card-body">
            <i class="fa fa-question fa-2x" aria-hidden="true"></i>
            <hr />
            <p class="card-title lead">Support</p>
          </div>
        </div>
      </a>
    </div>

  </div>
</div>

<footer class="footer fixed-bottom">
  <div class="row text-center p-3">
    <p class="small text-muted">Develop & Design by @imayushshrivastava</p>
  </div>
</footer>

<!-- Modal -->
<div class="modal fade" id="modelHELP" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Technical Support
          24/7</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-5">
        <p>
          <small>(Mon - Sat / 10AM - 6PM)</small>
        </p>
        <hr />
        <p> <i class="fa fa-envelope mr-3" aria-hidden="true"></i> </p>
        <p><i class="fa fa-volume-control-phone mr-3" aria-hidden="true"></i> +91-123654789 </p>

      </div>

    </div>
  </div>
</div>
 

    <script src="../Assets/Js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="../Assets/Js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/Js/admin.js"></script>

</html>