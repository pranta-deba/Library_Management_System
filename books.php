<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books</title>
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
        require "Include/databaseConn.php";
        $sqlbooks = "select id,image from books where 1 order by created_at desc";
        $quearybooks = $conn->query($sqlbooks);
        while ($books = $quearybooks->fetch_assoc()) {
            echo '<li><a href="details.php?booksid=' . $books['id'] . '"><img src="Admin/Assets/Images/' . $books['image'] . '" alt=""></a></li>';
        };
        ?>

    </ul>
    <!--  -->

    <!-- footer -->
    <?php include "Templete/footer.php"; ?>
    <!-- footer -->

    <script src="Assets/Js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="Assets/Js/bootstrap.bundle.min.js"></script>
    <script src="Assets/Js/emtrysearch.js"></script>
</body>

</html>