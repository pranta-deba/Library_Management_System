<?php
require "Include/adminCheak.php";
require "../Include/databaseConn.php";
$total = "select count(*) as total from contacts where 1";
$totalresult = $conn->query($total);
$totalmgs = $totalresult->fetch_assoc();
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
    <div class="ms-5 mt-2">
        <a class="btn" href="index.php">Dashboard</a>/<a class="btn" href="contacts.php">Contacts</a>
    </div>
    <div class="text-center text-success mt-4 fw-bold"><?= $_GET['message'] ?? "" ?></div>
    <!-- 1 -->
    <div class="container" id="box1">
        <div class="row">
            <div class="col-lg-12 p-3">
                <h1> <i class="fa fa-tachometer" aria-hidden="true"></i> Total Massage : <?= $totalmgs['total'] ?></h1>
                <hr />
            </div>
        </div>
        <div class="row d-flex justify-content-center" style="width: 100%;height: 100%; overflow: scroll;">

            <table class="table table-striped table-hover">
                <thead class="table-danger">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Surename</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Massage</th>
                        <th scope="col">Send Time</th>
                        <th scope="col">Detele</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $quary_1 = "select * from contacts where 1 order by created_at desc";
                    $result_1 = $conn->query($quary_1);
                    while ($row = $result_1->fetch_assoc()) {
                        echo '<tr>
                        <th scope="row" class="table-danger">' . $row['id'] . '</th>
                        <td class="table-secondary">' . $row['name'] . '</td>
                        <td>' . $row['surename'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td>' . $row['subject'] . '</td>
                        <td>' . $row['massage'] . '</td>
                        <td>' . $row['created_at'] . '</td>
                        <td><a href="Include/delete.php?mgsid=' . $row['id'] . '" onclick=\'return confirm("Are you sure want to delete this?");\' class="btn text-danger">Delete</a></td>
                    </tr>';
                    };
                    ?>
                </tbody>
            </table>

        </div>
    </div>
    <!-- 1 -->


    <script src="../Assets/Js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="../Assets/Js/bootstrap.bundle.min.js"></script>
</body>

</html>