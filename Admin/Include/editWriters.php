<?php
require "adminCheak.php";
require "../../Include/databaseConn.php";

if (isset($_GET['wrid'])) {
    $id = $_GET['wrid'];
    $p = "select * from writers where id='" . $id . "' limit 1";
    $r = $conn->query($p);
    $p = $r->fetch_assoc();
}
if (isset($_POST['UpdateWriter'])) {
    $id = $_POST['id'];
    $name = $conn->escape_string($_POST['name']);
    $Born = $conn->escape_string($_POST['Born']);
    $Died = $conn->escape_string($_POST['Died']);
    $Nationality = $conn->escape_string($_POST['Nationality']);
    $TotalBooks = $conn->escape_string($_POST['TotalBooks']);
    $Novels = $conn->escape_string($_POST['Novels']);
    $update = "UPDATE `writers` SET `id`='" . $id . "',
    `name`='" . $name . "',
    `born`='" . $Born . "',
    `died`='" . $Died . "',
    `nationality`='" . $Nationality . "',
    `total_books`='" . $TotalBooks . "',
    `novels`='" . $Novels . "' WHERE id='" . $id . "'";
    $conn->query($update);
    if ($conn->affected_rows) {
        header("location: ../writers.php?abc=Edit Successfully.");
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
    <?php include "../Templete/navbar2.php"; ?>
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

            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Name</label>
                <input type="text" value="<?= $p['id'] ?>" name="id" hidden>
                <input type="text" class="form-control" value="<?= $p['name'] ?>" name="name" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Born</label>
                <input type="text" class="form-control" value="<?= $p['born'] ?>" name="Born" id="validationCustom02" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Died</label>
                <input type="text" class="form-control" value="<?= $p['died'] ?>" name="Died" id="validationCustom02" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Nationality</label>
                <input type="text" class="form-control" value="<?= $p['nationality'] ?>" name="Nationality" id="validationCustom02" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Total Books</label>
                <input type="number" class="form-control" value="<?= $p['total_books'] ?>" name="TotalBooks" id="validationCustom02" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>


            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Novels</label>
                <input type="number" class="form-control" value="<?= $p['novels'] ?>" name="Novels" id="validationCustom02" required>
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
                <button class="btn btn-primary" type="submit" name="UpdateWriter">Update Writer</button>
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