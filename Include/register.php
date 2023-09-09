<?php
//form value 
if (isset($_POST['Submit_form'])) {
    //database conn
    require "databaseConn.php";
    // form value to set valiable
    $firstname = $conn->escape_string($_POST['firstname']);  //escape_string -> ",/.@#$" error handle php
    $lastname = $conn->escape_string($_POST['lastname']);
    $username = $conn->escape_string($_POST['username']);
    $email = $conn->escape_string($_POST['email']);
    $password = $conn->escape_string($_POST['password']);
    $cpassword = $conn->escape_string($_POST['cpassword']);
    $phone = $_POST['phone'];
    $dipartment = $conn->escape_string($_POST['dipartment']);
    $semister = $conn->escape_string($_POST['semister']);
    $roll = $_POST['roll'];
    $error = false;

    // php form validation 
    if ($firstname !== "") {
        if ($lastname !== "") {
            if ($username !== "") {
                //usersname already exits cheak database
                $selectt = "SELECT * FROM users WHERE username = '$username'";
                $resultt = $conn->query($selectt);
                if ($resultt->num_rows > 0) {
                    echo "Username is already taken.";
                    header("location:../register.php?ErrroMgs=Username is already taken, try again!&");
                } else {
                    if ($email !== "") {
                        if ($password !== "" || $cpassword !== "") {
                            if ($password === $cpassword) {
                                if ($phone !== "") {
                                    if ($dipartment !== "") {
                                        if ($semister !== "") {
                                            if ($roll !== "") {

                                                // insert form value to database
                                                $queary = "INSERT INTO users values(null,
                                                '" . $firstname . "',
                                                '" . $lastname . "',
                                                '" . $username . "',
                                                '" . $email . "',
                                                '" . $password . "',
                                                '" . $phone . "',
                                                '" . $dipartment . "',
                                                '" . $semister . "',
                                                '" . $roll . "',
                                                'students',
                                                null)";

                                                $conn->query($queary);
                                                if ($conn->affected_rows) {
                                                    header("Location: ../login.php?logUsers=$username&LogOK=Successfully.Now you can login");
                                                };

                                                
                                            } else {
                                                $error = true;
                                                header("location:../register.php?ErrroMgs=Please choose a roll!");
                                            };
                                        } else {
                                            $error = true;
                                            header("location:../register.php?ErrroMgs=Please choose a semister!");
                                        };
                                    } else {
                                        $error = true;
                                        header("location:../register.php?ErrroMgs=Please choose a dipartment!");
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
            header("location:../register.php?ErrroMgs=Please choose a lastname!");
        };
    } else {
        $error = true;
        header("location:../register.php?ErrroMgs=Please choose a firstname!");
    };
};
