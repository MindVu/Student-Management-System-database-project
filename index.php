<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Material Design for Bootstrap</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <link rel="stylesheet" href="css/style.css">
  <style>

  </style>
</head>

<body>
  <!-- Start your project here-->
  <section class="vh-100" style="background: rgb(74,139,223);
background: radial-gradient(circle, rgba(74,139,223,1) 0%, rgba(222,252,249,1) 0%);">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="img/loginf.jpg" alt="login form" class="img-fluid"
                  style="border-radius: 1rem 0 0 1rem;height: 100%;object-fit: cover;image-rendering: pixelated;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form action="includes/login.inc.php" method="post">

                    <h2 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;font-weight: 900;">Đăng nhập
                    </h2>
                    <div class="" style="color:red;font-weight: bold;">
                <?php
                if (isset($_SESSION['error'])) {
                  echo $_SESSION['error'];
                  $_SESSION['error']=NULL;
                }
                ?>
                </div>
                <div class="" style="color:green;font-weight: bold;">
                <?php
                if (isset($_SESSION['success'])) {
                  echo $_SESSION['success'];
                  $_SESSION['success']=NULL;
                }
                ?>
                </div>
                    <div class="form-outline mb-4">
                      <input type="text" name="id" id="form2Example17" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example17">Mã giáo viên</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" name="pwd" id="form2Example27" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example27">Mật khẩu</label>
                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit" name="login-submit">Đăng nhập</button>
                    </div>

                    <a class="small text-muted" href="resetpwd.php">Quên mật khẩu?</a>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Chưa có tài khoản? <u><a href="signup.php"
                        class="fw-bold text-body" style="color: #393f81;">Đăng ký</a></u></p>

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End your project here-->

  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>

</html>