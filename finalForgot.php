<?php
require "Include/databaseConn.php";

if (isset($_POST['otpsend'])) {
    $otp = $_POST['otppp'];
    $email = $_POST['email'];
    date_default_timezone_set('Asia/Dhaka');
    $date = date("Y-m-d");

    $queary = "SELECT * FROM users WHERE email='$email' AND otp='$otp' AND expiretoken='$date'";
    $result = $conn->query($queary);
    if (!$result->num_rows > 0) {
        echo "<script>
        window.location.href='forgotPass.php?forgotBoxErr=Invlid or Expired! Try Again';
        </script>";
    };
} else if (isset($_POST['changePass'])) {
    $pass = $_POST['password'];
    $cpass = $_POST['repassword'];
    $email = $_POST['email'];
    if ($pass === $cpass) {

        $queary2 = "UPDATE `users` SET `email`='" . $email . "',`password`='" . $pass . "',`otp`=null,`expiretoken`=null WHERE email='" . $email . "'";
        $conn->query($queary2);
        if ($conn->affected_rows) {
            echo "<script>
        alert('Password Change Successfully.');
        window.location.href='login.php?LogOK=Now you can Login.&emaill=$email';
        </script>";
        }
    } else {
        echo "<script>
        alert('password not match');
        </script>";
    }
}else{
    echo "<script>
        window.location.href='register.php';
        </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Assets/Css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/Css/style.css">
</head>

<body>

    <!-- navbar -->
    <?php include "Templete/navbar.php"; ?>
    <!-- navbar -->

    <div class="container p-3">
        <h2 class="text-center mb-3 text-uppercase">New Password</h2>
        <div class="container mb-5">
            <form class="row g-1 needs-validation" novalidate method="post">
                <p class="text-center text-danger"><?php echo $_GET['err'] ?? ""; ?></p>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-5 col-sm-12">
                        <label for="validationCustom03" class="form-label">New Password</label>
                        <input type="password" class="form-control" name="password" id="validationCucstom03" required>
                        <input type="email" class="form-control" value="<?= $_POST['email'] ?>" name="email" hidden>
                        <div class="invalid-feedback">
                            Please provide a valid password.
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-5 col-sm-12">
                        <label for="validationCustom03" class="form-label">Retype New Password</label>
                        <input type="password" class="form-control" name="repassword" id="validationCucstom03" required>
                        <div class="invalid-feedback">
                            Please provide a valid password.
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center mt-2">
                    <div class="col-lg-5 col-sm-12">
                        <input type="checkbox" onclick="showpass()"> Show Password
                    </div>
                </div>

                <div class="col-12 text-center">
                    <button class="btn btn-outline-danger text-uppercase" type="submit" name="changePass">Change</button>
                </div>
            </form>
        </div>
    </div>


    <!-- footer -->
    <div class="fixed-bottom">
        <?php include "Templete/footer.php"; ?>
    </div>
    <!-- footer -->

    <script src="Assets/Js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="Assets/Js/bootstrap.bundle.min.js"></script>
    <script src="Assets/Js/bootstrapFormValidation.js"></script>
    <script src="Assets/Js/passshowHide.js"></script>
</body>

</html>