<?php

include "../Sneaker/backend/DB.php";

global $conn;
//kiem tra login roi moi kiem tra username
//kiem tra login co ton tai hay ko
//da ton tai thi ve trang /
//neu ko thi login lai
// $data = [
//   'aaaa'
//   ]

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * from t_user where email='$email'");
    $row = mysqli_fetch_assoc($result);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    if (password_verify($password, $hashed_password)) {

        $_SESSION['login'] = $row['role'];

        header("Location:customers.php");

    } else {
        echo '<p style="color:red">Email or password
      incorrect !</p>';

    }

}

?>

<!DOCTYPE html>
<html class="h-100" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Login</title>
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../../assets/images/favicon.png"
    />
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="./assets/css/style.css" rel="stylesheet" />
  </head>

  <body class="h-100">
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
      <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
          <circle
            class="path"
            cx="50"
            cy="50"
            r="20"
            fill="none"
            stroke-width="3"
            stroke-miterlimit="10"
          />
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
                  <a class="text-center" href="/Sneaker"> <h4>Login</h4></a>

                  <form
                    action=""
                    method="post"
                    enctype="multipart/form-data"
                    class="mt-5 mb-5 login-input"
                  >


                    <div class="form-group">
                      <input
                        type="email"
                        class="form-control"
                        placeholder="Email"
                        name="email"
                      />
                    </div>
                    <div class="form-group">
                      <input
                        type="password"
                        class="form-control"
                        placeholder="Password"
                        name="password"
                      />
                    </div>
                    <div class="form-group">
                      <label for="rememberme" class="text-info"
                        ><span>Remember me</span> <span
                          ><input
                            id="rememberme"
                            name="rememberme"
                            type="checkbox" /></span></label
                      ><br />
                    </div>
                    <button type="submit" name="login" class="btn login-form__btn submit w-100">
                      Sign In
                    </button>


                  </form>
                  <p class="mt-5 login-form__footer">
                    Dont have account?
                    <a href="register.php" class="text-primary"
                      >Register</a
                    >
                    now
                  </p>
                  <p class="mt-5 login-form__footer">
                    Do You Want to Take Your Passwood?
                    <a href="forgetPassword.php" class="text-primary"
                      >Forget Password</a
                    >
                    now
                  </p>

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
