<?php
require "adminCheak.php";
require "../../Include/databaseConn.php";

if (isset($_GET['booid'])) {
    $id = $_GET['booid'];
    $p = "select * from books where id='" . $id . "' limit 1";
    $r = $conn->query($p);
    $p = $r->fetch_assoc();
}
if (isset($_POST['upatebooks'])) {
    $id = $_POST['id'];
    $writer_id = $_POST['writer_id'];
    $name = $conn->escape_string($_POST['name']);
    $releases = $conn->escape_string($_POST['releases']);
    $description = $conn->escape_string($_POST['description']);
    $update = "UPDATE `books` SET `id`='" . $id . "',
    `writer_id`='" . $writer_id . "',
    `name`='" . $name . "',
    `releases`='" . $releases . "',
    `description`='" . $description . "' WHERE id='" . $id . "'";
    $conn->query($update);
    if ($conn->affected_rows) {
        header("location: ../books.php?abc=Edit Successfully.");
    };
};
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
                        <a class="nav-link mx-2 active" aria-current="page" href="../message.php">Message</a>
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
                <h1> <i class="fa fa-tachometer" aria-hidden="true"></i> <?= $p['name'] ?> </h1>
                <hr />
            </div>
        </div>
        <form class="row g-3 needs-validation" novalidate method="post">
            <input type="text" value="<?= $p['id'] ?>" name="id" hidden>
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Writer Select</label>
                <select class="form-control" name="writer_id" id="validationCustom01" required>
                    <option></option>
                    <?php
                    $selectwriter = "select id,name from writers where 1";
                    $runquary = $conn->query($selectwriter);
                    while ($writerData = $runquary->fetch_assoc()) {
                        echo '<option value="'.$writerData['id'].'">'.$writerData['name'].'</option>';
                    }
                    ?>
                </select>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-6">
                <label for="validationCustom02" class="form-label">Book Name</label>
                <input type="text" class="form-control" value="<?= $p['name'] ?>" name="name" id="validationCustom02" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-6">
                <label for="validationCustom02" class="form-label">Release Date</label>
                <input type="text" class="form-control" value="<?= $p['releases'] ?>" name="releases" id="validationCustom02" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-6">
                <label for="validationCustom02" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="validationCustom02" required><?= $p['description'] ?></textarea>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit" name="upatebooks">Update Books</button>
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