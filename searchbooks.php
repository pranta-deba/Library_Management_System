<?php
if (isset($_POST['search'])) {

    require "Include/databaseConn.php";
    $book = $_POST['books'];

    $sql = "SELECT * FROM books WHERE name like '%$book%' limit 10";
    $res = $conn->query($sql);
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search books</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Assets/Css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/Css/style.css">
    <link rel="stylesheet" href="Assets//Css/booksView.css">
</head>

<body>

    <!-- navbar -->
    <?php include "Templete/navbar.php"; ?>
    <!-- navbar -->

    <!--  -->
    <ul class="boxes">
        <?php
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                echo '<li><a href="details.php?booksid=' . $row['id'] . '"><img src="Admin/Assets/Images/' . $row['image'] . '" alt=""></a></li>';
            }
        };
        ?>

    </ul>
    <!--  -->
    <!-- footer -->
    <div class="fixed_bottom">
    <?php include "Templete/footer.php"; ?>
    </div>
    <!-- footer -->

    <script src="Assets/Js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="Assets/Js/bootstrap.bundle.min.js"></script>
    <script src="Assets/Js/emtrysearch.js"></script>
</body>

</html>