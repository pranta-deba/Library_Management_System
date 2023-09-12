<?php
require "Include/adminCheak.php";
require "../Include/databaseConn.php";
$total = "select count(*) as total from users where role='admin'";
$totalresult = $conn->query($total);
$totaladmin = $totalresult->fetch_assoc();
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
        <a class="btn" href="index.php">Dashboard</a>/<a class="btn" href="admin.php">Admin</a>
    </div>
    <div class="text-center text-success mt-4 fw-bold"><?= $_GET['roleUpdateMgs'] ?? "" ?></div>
    <!-- 1 -->
    <div class="container" id="box1">
        <div class="row">
            <div class="col-lg-12 p-3">
                <h1> <i class="fa fa-tachometer" aria-hidden="true"></i> Total Admin : <?= $totaladmin['total'] ?></h1>
                <hr />
            </div>
        </div>
        <div class="row d-flex justify-content-center" style="width: 100%;height: 100%; overflow: scroll;">

            <table class="table table-striped table-hover">
                <thead class="table-danger">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Dipaerment</th>
                        <th scope="col">Semister</th>
                        <th scope="col">Roll</th>
                        <th scope="col">Images</th>
                        <th scope="col">Role</th>
                        <th scope="col">Insert Time</th>
                        <th scope="col">Change | Detele</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $quary_1 = "select * from users where  role='admin'";
                    $result_1 = $conn->query($quary_1);
                    while ($row = $result_1->fetch_assoc()) {
                        echo '<tr>
                        <th scope="row" class="table-danger">' . $row['id'] . '</th>
                        <td class="table-secondary">' . $row['first-name'] . '</td>
                        <td>' . $row['last-name'] . '</td>
                        <td>' . $row['username'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td>' . $row['phone'] . '</td>
                        <td>' . $row['dipartment'] . '</td>
                        <td>' . $row['semister'] . '</td>
                        <td>' . $row['roll'] . '</td>
                        <td><img src="../Assets/Images/'.$row['image'].'" alt="loading..." width="80px" height="80px"></td>
                        <td>' . $row['role'] . '</td>
                        <td>' . $row['created_time'] . '</td>
                        <td><a href="Include/editrole.php?userid=' . $row['id'] . '" class="btn text-primary">Edits</a> | <a href="Include/delete.php?userid=' . $row['id'] . '" onclick=\'return confirm("Are you sure want to delete this?");\' class="btn text-danger">Delete</a></td>
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