<?php
//form value 
if (isset($_POST['Submit_form'])) {
    //database conn
    require "databaseConn.php";
    // form value to set valiable
    $fullname = $conn->escape_string($_POST['fulltname']);  //escape_string -> ",/.@#$" error handle php
    $username = $conn->escape_string($_POST['username']);
    $email = $conn->escape_string($_POST['email']);
    $password = $conn->escape_string($_POST['password']);
    $cpassword = $conn->escape_string($_POST['cpassword']);
    $phone = $_POST['phone'];
    $error = false;

    // php form validation 
    if ($fullname !== "") {
        if ($username !== "") {
            //usersname already exits cheak database
            $selectt = "SELECT * FROM users WHERE username='$username'";
            $resultt = $conn->query($selectt);
            if ($resultt->num_rows > 0) {
                // echo "Username is already taken.";
                header("location:../register.php?ErrroMgs=Username is already taken, try again!");
            } else {
                if ($email !== "") {
                    $selectt = "SELECT * FROM users WHERE email='$email'";
                    $resultt = $conn->query($selectt);
                    if ($resultt->num_rows > 0) {
                        header("location:../register.php?ErrroMgs=Email is already taken, try again!");
                    } else {
                        if ($password !== "" || $cpassword !== "") {
                            if ($password === $cpassword) {
                                if ($phone !== "") {
                                    // insert form value to database
                                    $queary = "INSERT INTO users values(null,
                                                    '" . $fullname . "',
                                                    '" . $username . "',
                                                    '" . $email . "',
                                                    '" . $password . "',
                                                    '" . $phone . "',
                                                    null,
                                                    'students',
                                                    null,
                                                    null,
                                                    null)";

                                    $conn->query($queary);
                                    if ($conn->affected_rows) {
                                        header("location: ../login.php?emaill=$email&LogOK=Successfully.Now you can login");
                                    };
                                } else {
                                    $error = true;
                                    header("location:../register.php?ErrroMgs=Please choose a phone!");
                                };
                            } else {
                                $error = true;
                                header("location:../register.php?ErrroMgs=password not match!");
                            };
                        } else {
                            $error = true;
                            header("location:../register.php?ErrroMgs=Please choose a password!");
                        };
                    };
                } else {
                    $error = true;
                    header("location:../register.php?ErrroMgs=Please choose a email!");
                };
            };
        } else {
            $error = true;
            header("location:../register.php?ErrroMgs=Please choose a username!");
        };
    } else {
        $error = true;
        header("location:../register.php?ErrroMgs=Please choose a fullname!");
    };
};
