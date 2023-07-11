<?php

include "../Sneaker/backend/DB.php";

global $conn;

if (isset($_POST["register"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $username = $_POST['username'];

    $duplicate = mysqli_query($conn, "SELECT * FROM t_user WHERE email = '$email' OR username = '$username'");
    if (mysqli_num_rows($duplicate) > 0) {

        echo
            '<script> alert("Username or Email Has Already Taken"); </script>';
    } else {
        if ($hashed_password) {
            $query = "INSERT INTO t_user (id, email, username, password) VALUES('','$email','$username','$hashed_password')";
            mysqli_query($conn, $query);
            echo
                '<script> alert("Registration Successfull"); </script>';
        } else {
            echo
                '<script> alert("Registration Fail"); </script>';
        }
    }

}

?>

<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="./assets/css/style.css" rel="stylesheet">

</head>

<body class="h-100">

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->





    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">

                                    <a class="text-center" href="index.html"> <h4>Register</h4></a>

                                <form class="mt-5 mb-5 login-input" method="post" action="register.php" >


                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control"  placeholder="Email" required value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control"  placeholder="UserName" required value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required value="">
                                    </div>


                                    <button type="submit" name="register" class="btn login-form__btn submit w-100">Sign Up</button>
                                </form>
                                    <p class="mt-5 login-form__footer">Have account <a href="login.php" class="text-primary">Login </a> now</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--**********************************
        Scripts
    ***********************************-->
    <script src="./assets/plugins/common/common.min.js"></script>
    <script src="./assets/js/custom.min.js"></script>
    <script src="./assets/js/settings.js"></script>
    <script src="./assets/js/gleek.js"></script>
    <script src="./assets/js/styleSwitcher.js"></script>
</body>
</html>
