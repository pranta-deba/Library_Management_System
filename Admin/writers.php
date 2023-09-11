<?php
require "Include/adminCheak.php";
require "../Include/databaseConn.php";
$total = "select count(*) as total from books where 1";
$totalresult = $conn->query($total);
$totalbooks = $totalresult->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Writer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Assets/Css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/Css/style.css">
</head>

<body>

    <?php include "Templete/navbar.php"; ?>

    <div class="text-center mt-3">
        <button class="btn btn-danger" id="togglebox">Add Books</button>
    </div>

    <div class="text-center text-success mt-4 fw-bold"><?= $_GET['abc'] ?? "" ?></div>
    <!-- 1 -->
    <div class="container" id="box1">
        <div class="row">
            <div class="col-lg-12 p-3">
                <h1> <i class="fa fa-tachometer" aria-hidden="true"></i> Total Books : <?= $totalbooks['total'] ?></h1>
                <hr />
            </div>
        </div>
        <div class="row d-flex justify-content-center">

            <?php
            // $quary_1 = "SELECT * FROM writers WHERE  1";
            // $result_1 = $conn->query($quary_1);

            // $row = $result_1->fetch_assoc();
            // while ($row = $result_1->fetch_assoc()) {
            //     echo '';
            // };
            ?>
        </div>
    </div>
    <!-- 1 -->

    <!-- 2 -->
    <div class="container" id="box2">
        <div class="row">
            <div class="col-lg-12 p-3">
                <h1> <i class="fa fa-tachometer" aria-hidden="true"></i> Add Writers </h1>
                <hr />
            </div>
        </div>
        <form class="row g-3 needs-validation" novalidate method="post" action="Include/writerAdd.php" enctype="multipart/form-data">

            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Born</label>
                <input type="text" class="form-control" name="Born" id="validationCustom02" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Died</label>
                <input type="text" class="form-control" name="Died" id="validationCustom02" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Nationality</label>
                <input type="text" class="form-control" name="Nationality" id="validationCustom02" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Total Books</label>
                <input type="number" class="form-control" name="TotalBooks" id="validationCustom02" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>


            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Novels</label>
                <input type="number" class="form-control" name="Novels" id="validationCustom02" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-12">
                <label for="validationCustom02" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" id="validationCustom02" required>
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
                <button class="btn btn-primary" type="submit" name="AddWriter">Add Writer</button>
            </div>
        </form>
    </div>
    <!-- 2 -->


    <script src="../Assets/Js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="../Assets/Js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/Js/admin.js"></script>
    <script src="../Assets/Js/bootstrapFormValidation.js"></script>
    <script>
        $(document).ready(function() {

            $("#box1").show();
            $("#box2").hide();

            $("#togglebox").click(function() {
                $("#box2").toggle();
                $("#box1").toggle();
            });
        });
    </script>
</body>

</html>