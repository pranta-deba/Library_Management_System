<?php
require "Include/adminCheak.php";
require "../Include/databaseConn.php";
$total = "select count(*) as total from books where 1";
$totalresult = $conn->query($total);
$totalwriters = $totalresult->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Assets/Css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/Css/style.css">
</head>

<body>

    <?php include "Templete/navbar.php"; ?>

    <div class="text-center mt-3">
        <button class="btn btn-danger" id="togglebox1">Add Books</button>
        <button class="btn btn-danger" id="togglebox2">Views Books</button>
    </div>

    <div class="text-center text-success mt-4 fw-bold"><?= $_GET['abc'] ?? "" ?></div>
    <!-- 1 -->
    <div class="container" id="box1">
        <div class="row">
            <div class="col-lg-12 p-3">
                <h1> <i class="fa fa-tachometer" aria-hidden="true"></i> Total Books : <?= $totalwriters['total'] ?></h1>
                <hr />
            </div>
        </div>
        <div class="row d-flex justify-content-center" style="width: 100%;height: 100%; overflow: scroll;">

            <table class="table table-striped table-hover">
                <thead class="table-danger">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Writer Id</th>
                        <th scope="col">Book Name</th>
                        <th scope="col">Release Date</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Insert Time</th>
                        <th scope="col">Edit | Detele</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $quary_1 = "SELECT * FROM books WHERE  1";
                    $result_1 = $conn->query($quary_1);
                    while ($row = $result_1->fetch_assoc()) {
                        echo '<tr>
                        <th scope="row" class="table-danger">' . $row['id'] . '</th>
                        <td class="table-secondary">' . $row['writer_id'] . '</td>
                        <td>' . $row['name'] . '</td>
                        <td>' . $row['releases'] . '</td>
                        <td>' . $row['description'] . '</td>
                        <td><img src="Assets/Images/'.$row['image'].'" alt="loading..." width="80px" height="80px"></td>
                        <td>' . $row['created_at'] . '</td>
                        <td><a href="Include/editbooks.php?booid=' . $row['id'] . '" class="btn text-primary">Edits</a> | <a href="Include/delete.php?booid=' . $row['id'] . '" onclick=\'return confirm("Are you sure want to delete this?");\' class="btn text-danger">Delete</a></td>
                    </tr>';
                    };
                    ?>
                </tbody>
            </table>

        </div>
    </div>
    <!-- 1 -->

    <!-- 2 -->
    <div class="container" id="box2">
        <div class="row">
            <div class="col-lg-12 p-3">
                <h1> <i class="fa fa-tachometer" aria-hidden="true"></i> Add Books </h1>
                <hr />
            </div>
        </div>
        <form class="row g-3 needs-validation" novalidate method="post" action="Include/booksAdd.php" enctype="multipart/form-data">

            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Writer Select</label>
                <select class="form-control" name="writer_id" id="validationCustom01" required>
                    <option></option>
                    <?php
                    $selectwriter = "select id,name from writers where 1";
                    $runquary = $conn->query($selectwriter);
                    while ($writerData = $runquary->fetch_assoc()) {
                        echo '<option value="' . $writerData['id'] . '">' . $writerData['name'] . '</option>';
                    }
                    ?>
                </select>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-6">
                <label for="validationCustom02" class="form-label">Book Name</label>
                <input type="text" class="form-control" name="name" id="validationCustom02" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-6">
                <label for="validationCustom02" class="form-label">Releases Date</label>
                <input type="text" class="form-control" name="releases" id="validationCustom02" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-6">
                <label for="validationCustom02" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="validationCustom02" required></textarea>
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
                <button class="btn btn-primary" type="submit" name="Addbooks">Add Books</button>
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