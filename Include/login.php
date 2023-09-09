<?php
// login session start
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};

// form value
if (isset($_POST['log_submit'])) {

    //database conn
    require "databaseConn.php";

    // form value to set variable
    $username = $_POST['username'];
    $password = $_POST['password'];

    // select users
    $query = "SELECT * FROM users WHERE username='$username' limit 1";
    $record = $conn->query($query);
    //users exits cheak
    if ($record->num_rows > 0) {
        $result = $record->fetch_assoc();
        // password match
        if ($password == $result['password']) {
            //session value
            $_SESSION['userid'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['firstname'] = $result['first-name'];
            $_SESSION['roll'] = $result['roll'];
            $_SESSION['loggedin'] = true;
            $_SESSION['role'] = $result['role'];
            //admint students cheak
            if ($result['role'] == "admin") {
                header("location:../Admin/index.php");
            };
            if ($result['role'] == "students") {
                header("location:../index.php");
            };
        } else {
            header("location:../index.php?PassNotMatch=Password not match!&logUsers=$username");
        }
    } else {
        header("location:../register.php?ErrroMgs=You are not a user!");
    };
} else {
    header("HTTP/1.1 401 Unauthorized");
    exit;
};
