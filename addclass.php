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
  <style>
    .left-link{
      color:#d3d3d3;
      transition: opacity 0.15s;
    }
    .left-link:hover{
      color:#e0396f;
      opacity: 0.8;
    }
    .left-link:active{
      color:#ff78a4;
      opacity: 0.5;
    }
		.gradient-custom-3 {
      background: rgb(29,38,113);
background: linear-gradient(45deg, rgba(29,38,113,1) 0%, rgba(195,55,100,1) 100%);
    }
  </style>
</head>

<body>
  <!-- Start your project here-->
  <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: rgb(29,38,113);
background: linear-gradient(45deg, rgba(29,38,113,1) 0%, rgba(195,55,100,1) 100%);">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler left-link"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <!-- Left links -->
      <ul class="navbar-nav me-auto d-flex flex-row mt-3 mt-lg-0">
      <li class="nav-item text-center mx-2 mx-lg-1">
          <a class="nav-link left-link" aria-current="page" href="mainpage.php">
            <div>
              <i class="fas fa-home fa-lg mb-1"></i>
            </div>
            Home
          </a>
        </li>
        <li class="nav-item text-center mx-2 mx-lg-1 dropdown">
          <a class="nav-link left-link dropdown-toggle" aria-current="page" id="navbarDropdown"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false">
            <div>
            <i class="fas fa-chalkboard-teacher"></i>
            </div>
            Class
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="classlist.php">Danh sách lớp</a>
            </li>
            <li>
              <a class="dropdown-item" href="addclass.php">Thêm lớp mới</a>
            </li>
          </ul>
        </li>
        <li class="nav-item text-center mx-2 mx-lg-1 dropdown">
          <a class="nav-link left-link dropdown-toggle" aria-current="page" id="navbarDropdown"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false">
            <div>
            <i class="fas fa-user-graduate"></i>
            </div>
            Students
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="#">Thông tin sinh viên</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Thêm sinh viên mới</a>
            </li>
          </ul>
        </li>
        <li class="nav-item text-center mx-2 mx-lg-1">
          <a class="nav-link left-link" aria-current="page" href="#!">
            <div>
            <i class="fas fa-project-diagram"></i>
            </div>
            Projects
          </a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <div style="color:white;"><?php echo "Hi, ".$_SESSION['username']."&nbsp;&nbsp;&nbsp;"; ?></div>
      <!-- Avatar -->
      <div class="dropdown">
        <a
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
          <img
            src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
            class="rounded-circle"
            height="40"
            alt="Black and White Portrait of a Man"
            loading="lazy"
          />
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
        >
        <li>
            <a class="dropdown-item" href="changename.php">Đổi tên</a>
          </li>
          <li>
            <a class="dropdown-item" href="changepwd.php">Đổi mật khẩu</a>
          </li>
          <li>
            <a class="dropdown-item" href="includes/logout.php">Đăng xuất</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
<section class="vh-100 bg-image">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">
                  <form action="includes/addclass.inc.php" method="post">

                    <h2 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;font-weight: 900;color:black;">Thêm lớp mới
                    </h2>
                    <div class="" style="color:red;font-weight: bold;">
                <?php
                if (isset($_SESSION['error'])) {
                  echo $_SESSION['error'];
                  unset($_SESSION['error']);
                }
                ?>
                </div>
                <div class="" style="color:green;font-weight: bold;">
                <?php
                if (isset($_SESSION['success'])) {
                  echo $_SESSION['success'];
                  unset($_SESSION['success']);
                }
                ?>
                </div>
                    <div class="form-outline mb-4">
                      <input type="text" name="ClassName" id="form2Example17" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example17">Môn học</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="text" name="ClassDay" id="form2Example27" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example27">Thứ</label>
                    </div>
										<div class="form-outline mb-4">
                      <input type="number" name="ClassCredit" id="form2Example27" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example27">Số tín chỉ</label>
                    </div>
										<div class="form-outline mb-4">
                      <input type="number" name="ClassStart" id="form2Example27" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example27">Bắt đầu</label>
                    </div>
										<div class="form-outline mb-4">
                      <input type="number" name="ClassEnd" id="form2Example27" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example27">Kết thúc</label>
                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit" name="addclass-submit">Xác nhận</button>
                    </div>
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