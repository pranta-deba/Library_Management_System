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
    <style>
        .container .font-size38 {
            font-size: 38px;
        }

        .container .team-single-text .section-heading h4,
        .container .section-heading h5 {
            font-size: 36px
        }

        .container .team-single-text .section-heading.half {
            margin-bottom: 20px
        }

        @media screen and (max-width: 1199px) {

            .container .team-single-text .section-heading h4,
            .container .section-heading h5 {
                font-size: 32px
            }

            .container .team-single-text .section-heading.half {
                margin-bottom: 15px
            }
        }

        @media screen and (max-width: 991px) {

            .container .team-single-text .section-heading h4,
            .container .section-heading h5 {
                font-size: 28px
            }

            .container .team-single-text .section-heading.half {
                margin-bottom: 10px
            }
        }

        @media screen and (max-width: 767px) {

            .container .team-single-text .section-heading h4,
            .container .section-heading h5 {
                font-size: 24px
            }
        }


        .container .team-single-icons ul li {
            display: inline-block;
            border: 1px solid #02c2c7;
            border-radius: 50%;
            color: #86bc42;
            margin-right: 8px;
            margin-bottom: 5px;
            -webkit-transition-duration: .3s;
            transition-duration: .3s
        }

        .container .team-single-icons ul li a {
            color: #02c2c7;
            display: block;
            font-size: 14px;
            height: 25px;
            line-height: 26px;
            text-align: center;
            width: 25px
        }

        .container .team-single-icons ul li:hover {
            background: #02c2c7;
            border-color: #02c2c7
        }

        .container .team-single-icons ul li:hover a {
            color: #fff
        }

        .container .team-social-icon li {
            display: inline-block;
            margin-right: 5px
        }

        .container .team-social-icon li:last-child {
            margin-right: 0
        }

        .container .team-social-icon i {
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            font-size: 15px;
            border-radius: 50px
        }

        .container .padding-30px-all {
            padding: 30px;
        }

        .container .bg-light-gray {
            background-color: #f7f7f7;
        }

        .container .text-center {
            text-align: center !important;
        }

        .container img {
            max-width: 100%;
            height: auto;
        }


        .container .list-style9 {
            list-style: none;
            padding: 0
        }

        .container .list-style9 li {
            position: relative;
            padding: 0 0 15px 0;
            margin: 0 0 15px 0;
            border-bottom: 1px dashed rgba(0, 0, 0, 0.1)
        }

        .container .list-style9 li:last-child {
            border-bottom: none;
            padding-bottom: 0;
            margin-bottom: 0
        }


        .container .text-sky {
            color: #02c2c7
        }

        .container .text-orange {
            color: #e95601
        }

        .container .text-green {
            color: #5bbd2a
        }

        .container .text-yellow {
            color: #f0d001
        }

        .container .text-pink {
            color: #ff48a4
        }

        .container .text-purple {
            color: #9d60ff
        }

        .container .text-lightred {
            color: #ff5722
        }

        .container a.text-sky:hover {
            opacity: 0.8;
            color: #02c2c7
        }

        .container a.text-orange:hover {
            opacity: 0.8;
            color: #e95601
        }

        .container a.text-green:hover {
            opacity: 0.8;
            color: #5bbd2a
        }

        a.text-yellow:hover {
            opacity: 0.8;
            color: #f0d001
        }

        a.text-pink:hover {
            opacity: 0.8;
            color: #ff48a4
        }

        a.text-purple:hover {
            opacity: 0.8;
            color: #9d60ff
        }

        a.text-lightred:hover {
            opacity: 0.8;
            color: #ff5722
        }

        .container .custom-progress {
            height: 10px;
            border-radius: 50px;
            box-shadow: none;
            margin-bottom: 25px;
        }

        .container .progress {
            display: -ms-flexbox;
            display: flex;
            height: 1rem;
            overflow: hidden;
            font-size: .75rem;
            background-color: #e9ecef;
            border-radius: .25rem;
        }


        .container .bg-sky {
            background-color: #02c2c7
        }

        .container .bg-orange {
            background-color: #e95601
        }

        .container .bg-green {
            background-color: #5bbd2a
        }

        .container .bg-yellow {
            background-color: #f0d001
        }

        .container .bg-pink {
            background-color: #ff48a4
        }

        .container .bg-purple {
            background-color: #9d60ff
        }

        .container .bg-lightred {
            background-color: #ff5722
        }
    </style>
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

                            <a class="btn btn-info me-3">
                                <i class="bi bi-hand-thumbs-up"></i>
                            </a>
                            <a href="" class="btn btn-info ms-2">
                                <i class="bi bi-hand-thumbs-down"></i>
                            </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!--  -->

    <!-- footer -->
    <?php include "Templete/footer.php"; ?>
    <!-- footer -->

    <script src="Assets/Js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="Assets/Js/bootstrap.bundle.min.js"></script>
    <script>
    </script>
</body>

</html>