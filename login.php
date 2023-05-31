<?php session_start(); ?>

<link rel="stylesheet" href="popup_style.css">
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <title>Admin Panel</title>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="#">
  <meta name="keywords" content="Admin , Responsive">


  <link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="files/assets/icon/themify-icons/themify-icons.css">

  <link rel="stylesheet" type="text/css" href="files/assets/icon/icofont/css/icofont.css">

  <link rel="stylesheet" type="text/css" href="files/assets/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300&display=swap" rel="stylesheet">
  
</head>

<body class="fix-menu" style="background-image: url('uploadImage/Logo/bg.jpg'); background-size: 1000px;">

  <?php
  include('connect.php');
  extract($_POST);
  if (isset($_POST['btn_login'])) {

    $pass = $_POST['password'];
    //echo $pass;

    $sql = "SELECT * FROM admin WHERE loginid='" . $loginid . "' and password = '" . $pass . "'";
    $result = mysqli_query($conn, $sql);
    $row  = mysqli_fetch_array($result);
    //print_r($row);    
    $_SESSION["adminid"] = $row['id'];
    $_SESSION["id"] = $row['id'];
    $_SESSION["username"] = $row['username'];
    $_SESSION["password"] = $row['password'];
    $_SESSION["email"] = $row['loginid'];
    $_SESSION["fname"] = $row['fname'];
    $_SESSION["lname"] = $row['lname'];
    $_SESSION['image'] = $row['image'];
    $_SESSION['user'] = $_POST['user'];

    //print_r($row);
    $count = mysqli_num_rows($result);
    if ($count == 1 && isset($_SESSION["email"]) && isset($_SESSION["password"])) { {
  ?>
        <div class="popup popup--icon -success js_success-popup popup--visible">
          <div class="popup__background"></div>
          <div class="popup__content">
            <h3 class="popup__content__title">
              Success
            </h3>
            <p>Login Berhasil</p>
            <p>
              <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
              <?php echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>"; ?>
            </p>
          </div>
        </div>
        <!--   <script>
     window.location="index.php";
     </script> -->
      <?php
      }
    } else { ?>
      <div class="popup popup--icon -error js_error-popup popup--visible">
        <div class="popup__background"></div>
        <div class="popup__content">
          <h3 class="popup__content__title">
            Error
          </h3>
          <p>Username / Password Salah</p>
          <p>
            <a href="login.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
          </p>
        </div>
      </div>

  <?php
    }
  }
  ?>


  <section class="login-block">

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">



          <div class="auth-box card">
            <br></br>
            <div class="text-center">
              <image class="profile-img" src="uploadImage/Logo/bg.png" style="width: 20%; border-radius: 50%;"></image>
              <!-- <h1>SISTEM INFORMASI KLINIK GIGI</h1> -->
            </div>
            <div class="card-block">

              <div class="row m-b-20">
                <div class="col-md-12">
                  <h5 class="text-center txt-primary" style="font-family: 'Unbounded', cursive;"><b>LOGIN</b></h5>
                </div>
              </div>
              <form method="POST">
                <div class="form-group form-primary">
                  <select name="user" class="form-control" required="" hidden>
                    <option value="admin" selected>Admin</option>
                  </select>
                  <span class="form-bar"></span>
                </div>
                <div class="form-group form-primary">
                  <input type="text" name="loginid" class="form-control" required="" placeholder="Username">
                  <span class="form-bar"></span>
                </div>
                <div class="form-group form-primary">
                  <input type="password" name="password" class="form-control" required="" placeholder="Password">
                  <span class="form-bar"></span>
                </div>

                <div class="row m-t-30">
                  <div class="col-md-12">
                    <button type="submit" name="btn_login" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">SUBMIT</button>
                  </div>
                </div>
              </form>


            </div>
          </div>


        </div>

      </div>
    </div>
    </div>
  </section>

  <script type="text/javascript" src="files/bower_components/jquery/js/jquery.min.js"></script>
  <script type="text/javascript" src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="files/bower_components/popper.js/js/popper.min.js"></script>
  <script type="text/javascript" src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

  <script type="text/javascript" src="files/bower_components/modernizr/js/modernizr.js"></script>
  <script type="text/javascript" src="files/bower_components/modernizr/js/css-scrollbars.js"></script>

  <script type="text/javascript" src="files/bower_components/i18next/js/i18next.min.js"></script>
  <script type="text/javascript" src="files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
  <script type="text/javascript" src="files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
  <script type="text/javascript" src="files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
  <script type="text/javascript" src="files/assets/js/common-pages.js"></script>


</body>

<!-- for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com -->

</html>