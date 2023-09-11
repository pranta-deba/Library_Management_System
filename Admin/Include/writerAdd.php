<?php
require "adminCheak.php";

if (isset($_POST['AddWriter'])) {
    require "../../Include/databaseConn.php";
    $name = $conn->escape_string($_POST['name']);
    $Born = $conn->escape_string($_POST['Born']);
    $Died = $conn->escape_string($_POST['Died']);
    $Nationality = $conn->escape_string($_POST['Nationality']);
    $TotalBooks = $conn->escape_string($_POST['TotalBooks']);
    $Novels = $conn->escape_string($_POST['Novels']);
    $image = null;

    if (isset($_FILES['image'])) {
        if (!file_exists($_FILES["image"]["tmp_name"])) {
            exit;
        } else {
            $image = uniqid() . ".png";
            move_uploaded_file($_FILES['image']['tmp_name'], "../Assets/Images/" . $image);
        };
    };
    $insertQuery = "INSERT INTO writers values(null,
            '" . $name . "',
            '" . $Born . "',
            '" . $Died . "',
            '" . $Nationality . "',
            '" . $TotalBooks . "',
            '" . $Novels . "',
            '" . $image . "',
            null)";

    $conn->query($insertQuery);
    if ($conn->affected_rows) {
        header("Location: ../writers.php?abc=Insert Successfully.");
    };   
};
