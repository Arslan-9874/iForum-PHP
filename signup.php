<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iForum - Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        #mainContainer {
            min-height: 97vh;
        }
    </style>
</head>

<body class="bg-light">
    <?php

    require "partials/__header.php";
    if (isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] == 'yes') {
        header('location: index.php');
        exit;
    }

    if (isset($_SESSION['alert']) and $_SESSION['alert'] == 'pnotsame') {
        echo '<div class="container p-0 mt-5"><div class="container p-0"><div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> The passwords you entered were not the same.
                            <a href="signup.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                            </div></div></div>';
        unset($_SESSION['alert']);
    }
    if (isset($_SESSION['alert']) and $_SESSION['alert'] == 'email') {
        echo '<div class="container p-0 mt-5"><div class="container p-0"><div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> The EMAIL you entered is already registered! Please try to login.
                            <a href="signup.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                            </div></div></div>';
        unset($_SESSION['alert']);
    }
    if (isset($_SESSION['alert']) and $_SESSION['alert'] == 'username') {
        echo '<div class="container p-0 mt-5"><div class="container p-0"><div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> The USERNAME you entered is already taken! Please try with a different username.
                            <a href="signup.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                            </div></div></div>';
        unset($_SESSION['alert']);
    }
    if (isset($_SESSION['alert']) and $_SESSION['alert'] == 'somethingwentwrong') {
        echo '<div class="container p-0 mt-5"><div class="container p-0"><div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Something went wrong, please try again later.
                            <a href="signup.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                            </div></div></div>';
        unset($_SESSION['alert']);
    }
    if (isset($_SESSION['alert']) and $_SESSION['alert'] == 'success') {
        echo '<div class="container p-0 mt-5"><div class="container p-0"><div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success |</strong> Account created successfully, proceed to login.
                            <a href="signup.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                            </div></div></div>';
        unset($_SESSION['alert']);
    }

    ?>

    <div class="conatiner d-flex justify-content-center align-items-center my-5" id="mainContainer">
        <div class="container shadow p-5 rounded-4 mx-5">
            <h2 class="fw-semibold mb-4 text-center">USER SIGNUP</h2>
            <form method="post" action="partials/__handleSignup.php">
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required maxlength="255">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label fw-semibold">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required maxlength="255">
                    <div id="username_availability_response"></div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required maxlength="255">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required maxlength="255" aria-describedby="passwordRequirements">
                    <div id="passwordRequirements" class="form-text">Password must contain 8 or more characters that are
                        of at least one number, and one uppercase and lowercase letter.</div>
                </div>
                <div class="mb-3">
                    <label for="cpassword" class="form-label fw-semibold">Confirm Password</label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword" required maxlength="255"
                        aria-describedby="passwordCheck">
                    <div id="passwordCheck" class="form-text"></div>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary fs-6 px-4" id="signUp">Signup</button>
                </div>
            </form>
        </div>
    </div>

    <?php

    require "partials/__footer.php";

    ?>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>
        let password = document.getElementById('password');
        let cpassword = document.getElementById('cpassword');
        let passwordcheck = document.getElementById('passwordCheck');
        let btn = document.getElementById('signUp');

        cpassword.addEventListener('keyup', () => {
            if (cpassword.value === password.value) {
                cpassword.style.borderColor = '#dee2e6';
                passwordcheck.style.color = 'green';
                passwordcheck.innerText = "Password Matches";
                btn.classList.remove('disabled');
            }
            else {
                cpassword.style.borderColor = 'red';
                passwordcheck.style.color = 'red';
                document.getElementById('passwordCheck').innerText = "Password not same, please check."
                btn.classList.add('disabled');
            }
        })
    </script>
    <script>
        $(document).ready(function () {
            $("#username").keyup(function () {
                var username = $(this).val().trim();
                if (username != '') {
                    $.ajax({
                        url: 'partials/__username_availability_checker.php',
                        type: 'post',
                        data: { username: username },
                        success: function (response) {
                            $('#username_availability_response').html(response);
                        }
                    });
                } else {
                    $("#username_availability_response").html("");
                }
            });
        });
    </script>
</body>

</html>