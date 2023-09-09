<?php
// login session start
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};

// form value
if (isset($_POST['log_submit'])) {
    //database conn
    require "databaseConn.php";
    // form value to set valiable

    $username = $_POST['username'];
    $password = $_POST['password'];



}else{
    header("HTTP/1.1 401 Unauthorized");
    exit;
};
