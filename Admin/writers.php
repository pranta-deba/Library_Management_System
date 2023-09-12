<?php
require "Include/adminCheak.php";
require "../Include/databaseConn.php";
$total = "select count(*) as total from writers where 1";
$totalresult = $conn->query($total);
$totalwriters = $totalresult->fetch_assoc();
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
    <div class="ms-5 mt-2">
        <a class="btn" href="index.php">Dashboard</a>/<a class="btn" href="writers.php">Writers</a>
    </div>
    <div class="text-center mt-3">
        <button class="btn btn-danger" id="togglebox1">Add Writers</button>
        <button class="btn btn-danger" id="togglebox2">Views Writers</button>
    </div>

    <div class="text-center text-success mt-4 fw-bold"><?= $_GET['abc'] ?? "" ?></div>
    <!-- 1 -->
    <div class="container" id="box1">
        <div class="row">
            <div class="col-lg-12 p-3">
                <h1> <i class="fa fa-tachometer" aria-hidden="true"></i> Total Writers : <?= $totalwriters['total'] ?></h1>
                <hr />
            </div>
        </div>
        <div class="row d-flex justify-content-center">

            <?php
            $quary_1 = "SELECT * FROM writers WHERE  1";
            $result_1 = $conn->query($quary_1);
            while ($row = $result_1->fetch_assoc()) {
                echo '<div class="col-lg-3 col-md-4 col-sm-12 m-3"><a href="" class="text-decoration-none text-dark">
                <div class="card p-3" style="width: 100%; border: none; box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset; padding-top: 8px;">
                    <div class="text-center">
                        <img src="Assets/Images/' . $row['image'] . '" class="card-img-top" alt="Loading.." style=" width: 150px;height: 150px;overflow: hidden; border-radius: 50%;">
                    </div>
                    <div class="">
                        <h5 class="card-title text-center">' . $row['name'] . '</h5>
                        <p class="card-text" style="border-bottom: 1px solid black;">Born : ' . $row['born'] . '</p>
                        <p class="card-text" style="border-bottom: 1px solid black;">Died : ' . $row['died'] . '</p>
                        <p class="card-text" style="border-bottom: 1px solid black;">Nationality : ' . $row['nationality'] . '</p>
                        <p class="card-text" style="border-bottom: 1px solid black;">Total Books : ' . $row['total_books'] . '</p>
                        <p class="card-text" style="border-bottom: 1px solid black;">Novels : ' . $row['novels'] . '</p>
                        <p class="card-text" style="border-bottom: 1px solid black;">Created At : ' . $row['created_at'] . '</p>
                    </div></a>
                    <div class="text-center pt-3">
                        <a href="Include/editWriters.php?wrid=' . $row['id'] . '" class="card-link btn btn-primary">Edits</a>
                        <a href="Include/delete.php?wrid=' . $row['id'] . '" onclick=\'return confirm("Are you sure want to delete this?");\' class="card-link btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>';
            };
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

            $("#togglebox1").show();
            $("#box1").show();
            $("#box2").hide();
            $("#togglebox2").hide();

            $("#togglebox1").click(function() {
                $("#togglebox1").hide();
                $("#togglebox2").show();
                $("#box1").hide();
                $("#box2").show();
            });
            $("#togglebox2").click(function() {
                $("#togglebox2").hide();
                $("#togglebox1").show();
                $("#box2").hide();
                $("#box1").show();
            });
        });
    </script>
</body>

</html>