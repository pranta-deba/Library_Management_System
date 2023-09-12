<?php
require "adminCheak.php";
require "../../Include/databaseConn.php";
if (isset($_GET['userid'])) {
    $id = $_GET['userid'];
    $q = "SELECT * FROM users WHERE id='" . $id . "' limit 1";
    $r = $conn->query($q);
    $row = $r->fetch_assoc();
} elseif (isset($_POST['roleUpdate']) && isset($_GET['id2'])) {
    $newRole = $_POST['rolee'];
    $usersId = $_GET['id2'];

    $uq = "update users set role='" . $newRole . "' where id='" . $usersId . "' ";
    $conn->query($uq);
    $message = "Role updated.";
    if($newRole === "students"){
        header("location: ../users.php?roleUpdateMgs=$message");
    }else if($newRole === "admin"){
        header("location: ../admin.php?roleUpdateMgs=$message");
    };
    
} else {
    header("HTTP/1.1 401 Unauthorized");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../Assets/Css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Assets/Css/style.css">
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark  bg-danger" id="headerNav">
        <div class="container-fluid">
            <a class="navbar-brand d-block d-lg-none" href="../index.php">
                <img src="../../Assets/Images/logo.png" height="80" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto text-uppercase">
                    <li class="nav-item">
                        <a class="nav-link mx-2 active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 active" aria-current="page" href="../contacts.php">Message</a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link mx-2" href="../index.php">
                            <img src="../../Assets/Images/logo.png" height="80" />
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link mx-2 active" aria-current="page" href="../admin.php">Admin</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link mx-2 dropdown-toggle active" href="javascript:void(0);" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['firstname']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="../../index.php">Go Site</a></li>
                            <li><a class="dropdown-item" href="../../profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="../../include/logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar -->

    <!-- 2 -->
    <div class="container" id="box2">
        <div class="row">
            <div class="col-lg-12 p-3">
                <h1> <i class="fa fa-tachometer" aria-hidden="true"></i> <?= $row['first-name'] ?> </h1>
                <hr />
            </div>
        </div>
        <form action="editrole.php?id2=<?= $id ?>" method="post" style="width: 80%; display: block; margin: 0 auto;">
            <select class="form-select" name="rolee" aria-label="Default select example">
                <option value="admin" <?= $row['role'] == "admin" ? "selected" : ""; ?>>Admin</option>
                <option value="students" <?= $row['role'] == "students" ? "selected" : ""; ?>>Students</option>
            </select>
            <div class="text-center">
                <button type="submit" name="roleUpdate" class="m-4 text-white bg-danger" style="outline: none; border: none; padding: 5px 10px;">Update Role</button>
            </div>
        </form>
    </div>
    <!-- 2 -->


    <script src="../../Assets/Js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="../../Assets/Js/bootstrap.bundle.min.js"></script>
    <script src="../../Assets/Js/admin.js"></script>
    <script src="../../Assets/Js/bootstrapFormValidation.js"></script>
</body>

</html>