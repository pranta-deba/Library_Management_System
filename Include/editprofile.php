<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};
if (empty($_SESSION['userid'])) {
    header("location: ../index.php");
};
if (isset($_SESSION['userid'])) {
    require "databaseConn.php";
    $id = $_SESSION['userid'];
    $q = "SELECT * FROM users WHERE id='" . $id . "' limit 1";
    $r = $conn->query($q);
    if (!$r->num_rows) {
        header("location: ../index.php");
    }
    $row = $r->fetch_assoc();
} else {
    header("location: ../index.php");
};


// update details
if (isset($_POST['updateDetails'])) {
    //database conn
    require "databaseConn.php";
    $id = $_SESSION['userid'];
    $firstname = $conn->escape_string($_POST['firstname']);
    $lastname = $conn->escape_string($_POST['lastname']);
    $email = $conn->escape_string($_POST['email']);
    $phone = $_POST['phone'];
    $dipartment = $conn->escape_string($_POST['dipartment']);
    $semister = $conn->escape_string($_POST['semister']);
    $roll = $_POST['roll'];
    $error = false;
    if ($firstname !== "") {
        if ($lastname !== "") {
            if ($email !== "") {
                if ($phone !== "") {
                    if ($dipartment !== "") {
                        if ($semister !== "") {
                            if ($roll !== "") {
                                $sql = "UPDATE users SET `id`='" . $id . "',`first-name`='" . $firstname . "',`last-name`='" . $lastname . "',`email`='" . $email . "',`phone`='" . $phone . "',`dipartment`='" . $dipartment . "',`semister`='" . $semister . "',`roll`='" . $roll . "' WHERE id='" . $id . "'";
                                $conn->query($sql);
                                if ($conn->affected_rows) {
                                    header("location: ../profile.php?successfully=Profile has been successfully changed.");
                                }
                            } else {
                                $error = true;
                                header("location: editprofile.php?ErrroMgs=Please choose a roll!");
                            };
                        } else {
                            $error = true;
                            header("location: editprofile.php?ErrroMgs=Please choose a semister!");
                        };
                    } else {
                        $error = true;
                        header("location: editprofile.php?ErrroMgs=Please choose a dipartment!");
                    };
                } else {
                    $error = true;
                    header("location: editprofile.php?ErrroMgs=Please choose a phone!");
                };
            } else {
                $error = true;
                header("location: editprofile.php?ErrroMgs=Please choose a email!");
            };
        } else {
            $error = true;
            header("location: editprofile.php?ErrroMgs=Please choose a lastname!");
        };
    } else {
        $error = true;
        header("location: editprofile.php?ErrroMgs=Please choose a firstname!");
    };
};


// update password
if (isset($_POST['updatepass'])) {
    //database conn
    require "databaseConn.php";
    $id = $_SESSION['userid'];
    $oldpassword = $conn->escape_string($_POST['oldpassword']);
    $newpassword = $conn->escape_string($_POST['newpassword']);
    $renewpassword = $conn->escape_string($_POST['renewpassword']);

    if ($oldpassword !== "") {
        //old pass match
        $q2 = "select * from users where id='" . $id . "' limit 1";
        $r2 = $conn->query($q2);
        if (!$r2->num_rows) {
            header("location: ../profile.php");
        }
        $row2 = $r2->fetch_assoc();
        if ($oldpassword === $row2['password']) {
            if ($newpassword !== "" || $renewpassword !== "") {
                if ($newpassword === $renewpassword) {
                    $sql3 = "UPDATE users SET `id`='" . $id . "',`password`='" . $newpassword . "' WHERE id='" . $id . "'";
                    $conn->query($sql3);
                    if ($conn->affected_rows) {
                        header("location: ../profile.php?successfully=Password has been successfully changed.");
                    }
                } else {
                    echo '<script>alert("New password not match!");</script>';
                }
            } else {
                echo '<script>alert("Valid Password box!");</script>';
            }
        } else {
            echo '<script>alert("Old password not match");</script>';
        };
    };
};


// update profile
if (isset($_POST['updateimg'])) {
    //database conn
    require "databaseConn.php";
    $id = $_SESSION['userid'];
    $image = null;

    if (isset($_FILES['image'])) {
        if (!file_exists($_FILES["image"]["tmp_name"])) {
            echo '<script>alert("Choose image file to upload.!");</script>';
        } else {
            $image = uniqid() . ".png";
            move_uploaded_file($_FILES['image']['tmp_name'], "../Assets/images/" . $image);
        };
    };
    $sql4 = "UPDATE users SET `id`='" . $id . "',`image`='" . $image . "' WHERE id='" . $id . "'";
    $conn->query($sql4);
    if ($conn->affected_rows) {
        header("location: ../profile.php?successfully=Image has been successfully Updated.");
    }

};

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../Assets/Css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/Css/editprofile.css">
</head>

<body>

    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" id="profilebtn" style="cursor:pointer;">Profile</a>
            <a class="nav-link" id="passbtn" style="cursor:pointer;">Password</a>
            <a class="nav-link" id="imgbtn" style="cursor:pointer;">Image Upload</a>
        </nav>
        <hr class="mt-0 mb-4">

        <div class="row d-flex justify-content-center">


            <div class="col-xl-8" id="Profiles">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <div class="container p-3">
                            <div class="container mb-5">
                                <form class="row g-2 needs-validation" name="form1" novalidate method="post">

                                    <p class="text-center text-danger"><?php echo $_GET['ErrroMgs'] ?? ""; ?></p>
                                    <div class="col-md-6">
                                        <label for="validationCustom01" class="form-label">First name</label>
                                        <input type="text" class="form-control" value="<?= $row['first-name'] ?>" id="validationCustom01" name="firstname" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustom02" class="form-label">Last name</label>
                                        <input type="text" class="form-control" value="<?= $row['last-name'] ?>" id="validationCustom02" name="lastname" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="validationCustomUsername" class="form-label">Email Address</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="email" class="form-control" value="<?= $row['email'] ?>" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="email" required>
                                            <div class="invalid-feedback">
                                                Please choose a email.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustom03" class="form-label">11 Digit Mobile Number</label>
                                        <input type="number" class="form-control" name="phone" id="validation3Custom03" min="0" max="99999999999" value="<?= $row['phone'] ?>" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid phone.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustom03" class="form-label">Dipartment</label>
                                        <input type="text" class="form-control" value="<?= $row['dipartment'] ?>" name="dipartment" id="validationCustom03" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Dipartment.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustom03" class="form-label">Semister</label>
                                        <input type="text" class="form-control" name="semister" id="validationCustom03" value="<?= $row['semister'] ?>" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Semister.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustom03" class="form-label">Roll No.</label>
                                        <input type="text" class="form-control" value="<?= $row['roll'] ?>" name="roll" id="validationCustom03" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Roll No.
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="invalidCheck" required>
                                            <label class="form-check-label" for="invalidCheck">
                                                Agree to terms and conditions
                                            </label>
                                            <div class="invalid-feedback">
                                                You must agree before submitting.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn btn-outline-danger text-uppercase m-4" name="updateDetails" type="submit">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

            <div class="col-xl-8" id="Passwords">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Password Change</div>
                    <div class="card-body">
                        <div class="container p-3">
                            <div class="container mb-5">
                                <form class="row g-2 needs-validation" name="form1" novalidate method="post">
                                    <div class="col-md-12">
                                        <label for="validationCustom03" class="form-label">Old Password</label>
                                        <input type="password" class="form-control" name="oldpassword" id="validationCustomoo" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid password.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustom03" class="form-label">New Password</label>
                                        <input type="password" class="form-control" name="newpassword" id="newpassword" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid password.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustom03" class="form-label">Retype New Password</label>
                                        <input type="password" class="form-control" name="renewpassword" id="renewpassword" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid password.
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn btn-outline-danger text-uppercase m-4" name="updatepass" type="submit" id="paaassbtn">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

            <div class="col-xl-8" id="imagess">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body">
                        <div class="container p-3">
                            <div class="container mb-5">
                                <form class="row g-2 needs-validation" name="form1" novalidate method="post" enctype="multipart/form-data">
                                    <div class="col-md-12">
                                        <label for="validationCustom03" class="form-label">Image</label>
                                        <input type="file" class="form-control" name="image" id="validationCustomoo" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid image.
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn btn-outline-danger text-uppercase m-4" name="updateimg" type="submit">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
    <script src="../Assets/Js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="../Assets/Js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/Js/bootstrapFormValidation.js"></script>
    <script>
        $(document).ready(function() {

            $("#Profiles").show();
            $("#Passwords").hide();
            $("#imagess").hide();

            $("#profilebtn").click(function() {
                $("#imagess").hide();
                $("#Passwords").hide();
                $("#Profiles").show();
                $("#profilebtn").addClass("active");
                $("#passbtn").removeClass("active");
                $("#imgbtn").removeClass("active");
            });
            $("#passbtn").click(function() {
                $("#Profiles").hide();
                $("#imagess").hide();
                $("#Passwords").show();
                $("#passbtn").addClass("active");
                $("#profilebtn").removeClass("active");
                $("#imgbtn").removeClass("active");
            });
            $("#imgbtn").click(function() {
                $("#Profiles").hide();
                $("#Passwords").hide();
                $("#imagess").show();
                $("#imgbtn").addClass("active");
                $("#profilebtn").removeClass("active");
                $("#passbtn").removeClass("active");
            });


            //password match
            $('#paaassbtn').click(function() {
                var newpassword = $("#newpassword").val();
                var renewpassword = $("#renewpassword").val();
                if (newpassword != renewpassword) {
                    alert("Password Not Match.");
                    $("#Profiles").hide();
                    $("#imagess").hide();
                    $("#Passwords").show();
                    $("#passbtn").addClass("active");
                    $("#profilebtn").removeClass("active");
                    $("#imgbtn").removeClass("active");
                    return false;
                }
                return true;
            });


        });
    </script>
</body>

</html>