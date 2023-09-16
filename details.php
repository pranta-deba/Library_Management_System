<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};
require "Include/databaseConn.php";
// empty id
if (empty($_GET['booksid'])) {
    header("Location: index.php");
}
if (isset($_GET['booksid'])) {
    $booksid = $_GET['booksid'];
    $selectBooks = "SELECT * FROM books WHERE id='" . $booksid . "' limit 1";
    $resultBooks = $conn->query($selectBooks);
    if (!$resultBooks->num_rows) {
        header("Location: index.php");
    }
    $row = $resultBooks->fetch_assoc();


    $selectwriter = "SELECT name FROM writers WHERE id='" . $row['writer_id'] . "' limit 1";
    $resultwriter = $conn->query($selectwriter);
    if (!$resultwriter->num_rows) {
        header("Location: index.php");
    }
    $writername = $resultwriter->fetch_assoc();
};



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Assets/Css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/Css/style.css">
    <link rel="stylesheet" href="Assets/Css/details.css">
</head>

<body>

    <!-- navbar -->
    <?php include "Templete/navbar.php"; ?>
    <!-- navbar -->

    <!--  -->
    <div class="container">
        <div class="team-single m-4">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
                    <div class="team-single-img">
                        <img src="Admin/Assets/Images/<?= $row['image'] ?>" alt="">
                    </div>
                </div>

                <div class="col-lg-8 col-md-7">
                    <div class="team-single-text padding-50px-left sm-no-padding-left">
                        <h4 class="font-size38 sm-font-size32 xs-font-size30"><?= $row['name'] ?></h4>
                        <p class="no-margin-bottom"><?= $row['description'] ?></p>
                        <div class="contact-info-section margin-40px-tb">
                            <ul class="list-style9 no-margin">
                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-graduation-cap text-orange"></i>
                                            <strong class="margin-10px-left text-orange">Writer :</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p><?= $writername['name'] ?></p>
                                        </div>
                                    </div>

                                </li>
                                <li>

                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="far fa-gem text-yellow"></i>
                                            <strong class="margin-10px-left text-yellow">Release Date :</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p><?= $row['releases'] ?></p>
                                        </div>
                                    </div>
                                </li>
                        </div>
                    </div>
                    <div class="mt-5">
                        <?php
                        // $selectlike = "SELECT * FROM like_dislikes";
                        // $resultlike = $conn->query($selectlike);
                         ?>

                            <!-- <a class="btn btn-info me-3">
                                <i class="bi bi-hand-thumbs-up"></i>
                            </a>
                            <a href="" class="btn btn-info ms-2">
                                <i class="bi bi-hand-thumbs-down"></i>
                            </a> -->
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!--  -->

    <!-- footer -->
    <div class="fixed-bottom">
        <?php include "Templete/footer.php"; ?>
    </div>
    <!-- footer -->

    <script src="Assets/Js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="Assets/Js/bootstrap.bundle.min.js"></script>
    <script>
    </script>
</body>

</html>