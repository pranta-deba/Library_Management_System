<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Assets/Css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/Css/style.css">
</head>

<body>

    <!-- navbar -->
    <?php include "Templete/navbar.php"; ?>
    <!-- navbar -->

    <div class="container p-3">
        <h2 class="text-center mb-3 text-uppercase">Please Login</h2>
        <div class="container mb-5">
            <form class="row g-1 needs-validation" novalidate method="post" action="include/login.php">

                <p class="text-center text-success"><?php echo $_GET['LogOK'] ?? ""; ?></p>
                <p class="text-center text-danger"><?php echo $_GET['PassNotMatch'] ?? ""; ?></p>

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-5 col-sm-12">
                        <label for="validationCustomUsername" class="form-label">Email</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="email" class="form-control" id="validationCu" aria-describedby="inputGroupPrepend" name="email" value="<?php echo $_GET['emaill'] ?? ""; ?>" required>
                            <div class="invalid-feedback">
                                Please choose a email.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-5 col-sm-12">
                        <label for="validationCustom03" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="validationCucstom03" required>
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
                <div class="row d-flex justify-content-center mt-2 mb-2">
                    <div class="col-lg-5 col-sm-12 text-end">
                       <a class="text-dark" href="forgotPass.php">Forgot Password</a>
                    </div>
                </div>

                <div class="col-12 text-center">
                    <button class="btn btn-outline-danger text-uppercase" type="submit" name="log_submit">Login</button>
                </div>
                <div class="text-center">
                    <p>Not a member? <a href="register.php">Register</a></p>
                </div>
            </form>
        </div>
    </div>


    <!-- footer -->
    <div class="">
        <?php include "Templete/footer.php"; ?>
    </div>
    <!-- footer -->

    <script src="Assets/Js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="Assets/Js/bootstrap.bundle.min.js"></script>
    <script src="Assets/Js/bootstrapFormValidation.js"></script>
    <script src="Assets/Js/passshowHide.js"></script>
</body>

</html>