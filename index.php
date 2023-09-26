<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};
require "Include/databaseConn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Assets/Css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/Css/owl.carousel.css">
    <link rel="stylesheet" href="Assets/Css/owl.theme.css">
    <link rel="stylesheet" href="Assets/Css/style.css">
</head>

<body>

    <!-- navbar -->
    <?php include "Templete/navbar.php"; ?>
    <!-- navbar -->
    <!-- carousel -->
    <?php include "Templete/carousel.php"; ?>
    <!-- carousel -->
    <!-- owl carousel -->
    <?php include "Templete/owlcarousel.php"; ?>
    <!-- owl carousel -->
    <!-- footer -->
    <?php include "Templete/footer.php"; ?>
    <!-- footer -->

    <script src="Assets/Js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="Assets/Js/bootstrap.bundle.min.js"></script>
    <script src="Assets/Js/owl.carousel.js"></script>
    <script src="Assets/Js/owlLoop.js"></script>
    <script src="Assets/Js/emtrysearch.js"></script>
</body>

</html>