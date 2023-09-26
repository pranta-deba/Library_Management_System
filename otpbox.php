<?php
require "Include/databaseConn.php";
if (isset($_GET['xc33shg3uryhdnod9X846dyegaagd'])) {
    $email = $_GET['xc33shg3uryhdnod9X846dyegaagd'];
    $queary = "SELECT * FROM users WHERE email='$email' limit 1";
    $result = $conn->query($queary);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $otp = $row['otp'];
        sendMail($email, $otp);
    };
} else {
    header("location : index.php");
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $otp)
{
    require "PHPMailer/Exception.php";
    require "PHPMailer/SMTP.php";
    require "PHPMailer/PHPMailer.php";

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'smtpm5553@gmail.com';                     //SMTP username
        $mail->Password   = 'tnat muks ecgt qqwr';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('smtpm5553@gmail.com', 'Library_Management');
        $mail->addAddress($email);     //Add a recipient


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password Reset form Library_Management';
        $mail->Body    = "Your OTP is :  <b> $otp </b>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
};

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
        <h2 class="text-center mb-3 text-uppercase">Enter OTP</h2>
        <div class="container mb-5">
            <form class="row g-1 needs-validation" novalidate method="POST" action="finalForgot.php">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-5 col-sm-12">
                        <label for="validationCustom03" class="form-label">OTP</label>
                        <input type="text" class="form-control" name="otppp" id="validationCustomUsername" required>
                        <input type="email" class="form-control" value="<?=$_GET['xc33shg3uryhdnod9X846dyegaagd']?>" name="email" hidden>
                        <div class="invalid-feedback">
                            Please provide a valid OTP.
                        </div>
                    </div>
                </div>

                <div class="col-12 text-center mt-3">
                    <button class="btn btn-outline-danger text-uppercase" type="submit" name="otpsend">Send</button>
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
    <script src="Assets/Js/emtrysearch.js"></script>
    <script>
        const inputField = document.getElementById("validationCustomUsername");
        inputField.addEventListener("input", function(event) {
            const inputValue = event.target.value;
            if (inputValue.includes(" ")) {
                event.target.value = inputValue.replace(/\s/g, "");
            }
        });
    </script>
</body>

</html>