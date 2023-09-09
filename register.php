<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Assets/Css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/Css/owl.carousel.css">
    <link rel="stylesheet" href="Assets/Css/owl.theme.css">
    <link rel="stylesheet" href="Assets/Css/style.css">
</head>

<body>

    <!-- navbar -->
    <?php include "templete/navbar.php"; ?>
    <!-- navbar -->

    <div class="container p-3">
        <h2 class="text-center mb-3 text-uppercase">Please Registration</h2>
        <div class="container mb-5">
            <form class="row g-2 needs-validation" name="form1" novalidate method="post" action="include/register.php">

                <p class="text-center text-danger"><?php echo $_GET['ErrroMgs'] ?? ""; ?></p>


                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">First name</label>
                    <input type="text" class="form-control" id="validationCustom01" name="firstname" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="validationCustom02" name="lastname" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustomUsername" class="form-label">Username (Used letters & Number, Not allow spaces)</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" class="form-control" id="validationCustomUsername11" aria-describedby="inputGroupPrepend" name="username" required>
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustomUsername" class="form-label">Email Address</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="email" required>
                        <div class="invalid-feedback">
                            Please choose a email.
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="validationCustomoo" required>
                    <div class="invalid-feedback">
                        Please provide a valid password.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Re-type Password</label>
                    <input type="password" class="form-control" name="cpassword" id="validationCustom03tgh" required>
                    <div class="invalid-feedback">
                        Please provide a valid password.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">11 Digit Mobile Number</label>
                    <input type="number" class="form-control" name="phone" id="validation3Custom03" min="0" max="99999999999" required>
                    <div class="invalid-feedback">
                        Please provide a valid phone.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Dipartment</label>
                    <input type="text" class="form-control" name="dipartment" id="validationCustom03" required>
                    <div class="invalid-feedback">
                        Please provide a valid Dipartment.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Semister</label>
                    <input type="text" class="form-control" name="semister" id="validationCustom03" required>
                    <div class="invalid-feedback">
                        Please provide a valid Semister.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Roll No.</label>
                    <input type="text" class="form-control" name="roll" id="validationCustom03" required>
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
                    <button class="btn btn-outline-danger text-uppercase" name="Submit_form" type="submit" onclick="validateNumberInput()">Submit form</button>
                </div>
                <div class="text-center">
                    <p>You are member? <a href="login.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>


    <!-- footer -->
    <?php include "templete/footer.php"; ?>
    <!-- footer -->

    <script src="Assets/Js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="Assets/Js/bootstrap.bundle.min.js"></script>
    <script src="Assets/Js/owl.carousel.js"></script>
    <script src="Assets/Js/bootstrapFormValidation.js"></script>
    <script src="Assets/Js/usernameNotAllowSpace.js"></script>
</body>

</html>