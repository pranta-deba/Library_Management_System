<?php
require "adminCheak.php";

if (isset($_POST['Addbooks'])) {
    require "../../Include/databaseConn.php";
    $writer_id = $_POST['writer_id'];
    $name = $conn->escape_string($_POST['name']);
    $releases = $conn->escape_string($_POST['releases']);
    $description = $conn->escape_string($_POST['description']);
    $image = null;

    if (isset($_FILES['image'])) {
        if (!file_exists($_FILES["image"]["tmp_name"])) {
            exit;
        } else {
            $image = uniqid() . ".png";
            move_uploaded_file($_FILES['image']['tmp_name'], "../Assets/Images/" . $image);
        };
    };
    $insertQuery = "INSERT INTO books values(null,'" . $writer_id . "','" . $name . "','" . $releases . "','" . $description . "','" . $image . "',null)";
    $conn->query($insertQuery);
    if ($conn->affected_rows) {
        header("Location: ../books.php?abc=Insert Successfully.");
    };   
};
