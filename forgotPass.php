<?php
require "Include/databaseConn.php";
if (isset($_POST['forgot_submit'])) {
    $email = $_POST['emailforgot'];
    $queary = "SELECT * FROM users WHERE email='$email' limit 1";
    $result = $conn->query($queary);
    if ($result->num_rows > 0) {

        $otp_str = str_shuffle("0123456789");
        $otp_code = substr($otp_str, 0, 4);
        date_default_timezone_set('Asia/Dhaka');
        $date = date("Y-m-d");
        $queary2 = "UPDATE `users` SET `email`='" . $email . "',`otp`='" . $otp_code . "',`expiretoken`='" . $date . "' WHERE email='" . $email . "'";
        $conn->query($queary2);
        if ($conn->affected_rows) {
            header("location: otpbox.php?xc33shg3uryhdnod9X846dyegaagd=$email");
        } else {
            echo "<script>
                alert('Server down! Try again');
                window.location.href='login.php';
                </script>";
        }
    } else {
        echo "<script>
        alert('You are not a users.Please register.'); 
        window.location.href='register.php';
        </script>";
    }
};

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Assets/Css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/Css/style.css">
</head>

<body>

    <!-- navbar -->
    <?php include "Templete/navbar.php"; ?>
    <!-- navbar -->

    <div class="container p-3">
        <h2 class="text-center mb-3 text-uppercase">Forgot your password</h2>
        <div class="container mb-5">
            <form class="row g-1 needs-validation" novalidate method="post">
                <p class="text-center text-danger"><?php echo $_GET['forgotBoxErr'] ?? ""; ?></p>

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-5 col-sm-12 m-4">
                        <label for="validationCustomUsername" class="form-label">Email</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="email" class="form-control" id="validatio" aria-describedby="inputGroupPrepend" name="emailforgot" required>
                            <div class="invalid-feedback">
                                Please choose a email.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-center">
                    <button class="btn btn-outline-danger text-uppercase" type="submit" name="forgot_submit">Forgot</button>
                </div>
                <div class="text-center mt-3">
                    <p>Not a member? <a href="register.php">Register</a></p>
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
    <script src="Assets/Js/emtrysearch.js"></script>
</body>

</html>