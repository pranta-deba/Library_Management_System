<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};
// empty id
if (empty($_SESSION['userid'])) {
    header("Location: index.php");
}
// get id
if (isset($_SESSION['userid'])) {
    //db conn
    require "Include/databaseConn.php";
    $id = $_SESSION['userid'];
    // select bd to id match
    $q = "SELECT * FROM users WHERE id='" . $id . "' limit 1";
    $r = $conn->query($q);
    // id not match db
    if (!$r->num_rows) {
        header("Location: index.php");
    }
    $row = $r->fetch_assoc();
    // var_dump($row);
} else {
    header("Location: index.php");
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Assets/Css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/Css/style.css">

</head>

<body>

    <!-- navbar -->
    <?php include "Templete/navbar.php"; ?>
    <!-- navbar -->

    <!-- profile -->
    <div class="container">
        <div class="main-body mx-5 mt-3 mb-5">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-danger">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $row['first-name'] ?>'s Profile</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <div class="row gutters-sm m-2">
                <p class="text-center text-success"><?= $_GET['successfully'] ?? ""; ?></p>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="Assets/Images/<?=$row['image']??"avatarusers.png"?>" alt="Admin" class="rounded-circle border border-4 border-danger" width="150" height="150">
                                <div class="mt-3">
                                    <h4><?= $row['first-name'] ?> <?= $row['last-name'] ?></h4>
                                    <p class="text-secondary mb-1"><?= $row['dipartment'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">First Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $row['first-name'] ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Last Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $row['last-name'] ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">User Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $row['username'] ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $row['email'] ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $row['phone'] ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Dipartment</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $row['dipartment'] ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Semister</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $row['semister'] ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Roll No.</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $row['roll'] ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-danger" href="Include/editprofile.php">Edit Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- profile -->

    <!-- footer -->
    <?php include "Templete/footer.php"; ?>
    <!-- footer -->

    <script src="Assets/Js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="Assets/Js/bootstrap.bundle.min.js"></script>
</body>

</html>