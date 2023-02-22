<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Trang chủ</title>
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
    *{
      font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }
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
  </style>
</head>

<body>
  <!-- Start your project here-->
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: rgb(74,139,223);
background: radial-gradient(circle, rgba(74,139,223,1) 0%, rgba(22,41,66,1) 0%);">
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
        <li class="nav-item text-center mx-2 mx-lg-1">
          <a class="nav-link left-link" aria-current="page" href="classlist.php">
            <div>
              <i class="fas fa-chalkboard-teacher"></i>
            </div>
            Class
          </a>
        </li>
        <li class="nav-item text-center mx-2 mx-lg-1">
          <a class="nav-link left-link" aria-current="page" href="studentlist.php">
            <div>
              <i class="fas fa-user-graduate"></i>
            </div>
            Students
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
<!-- Background image -->
<div id="intro"
       class="bg-image shadow-1-strong"
       style="background-image: url(img/6911.jpg); height: 540px; background-size: cover;">
    <div class="mask text-white" style="background-color: rgba(0, 0, 0, 0.66)">
      <div class="container d-flex align-items-center justify-content-center text-center h-100">
        <div class="text-white">
          <h1 class="mb-3"><?php echo "Xin chào ".$_SESSION["username"]."!";?></h1>
          <h4 class="mb-4">Chào mừng đến hệ thống quản lý học tập LMS</h4>
          <a class="btn btn-outline-light btn-lg mb-3" href="#carouselBasicExample" role="button">Khám phá ngay!
          </a>
        </div>
      </div>

    </div>
  </div>
  <!-- Carousel wrapper -->
<div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
  <!-- Indicators -->
  <div class="carousel-indicators">
    <button
      type="button"
      data-mdb-target="#carouselBasicExample"
      data-mdb-slide-to="0"
      class="active"
      aria-current="true"
      aria-label="Slide 1"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselBasicExample"
      data-mdb-slide-to="1"
      aria-label="Slide 2"
    ></button>
  </div>

  <!-- Inner -->
  <div class="carousel-inner">
    <!-- Single item -->
    <div class="carousel-item active">
    <div class="bg-image">
    <img src="img/305993.jpg" width="1304" height="605" class="d-block w-100" alt="Class"/>
  <div class="mask" style="background-color: hsla(0, 0%, 0%, 0.6)"></div>
</div>
      <div class="carousel-caption d-none d-md-block">
        <h2>Quản lý lớp học</h2>
        <p style="font-size: 20px">Chức năng quản lý lớp học với những tính năng như: hiển thị danh sách lớp, tìm kiếm lớp, chấm điểm,... Đây là công cụ hỗ trợ đắc lực cho giáo viên trong việc điều chỉnh và nắm bắt thông tin dữ liệu lớp đang giảng dạy.</p>
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item">
    <div class="bg-image">
    <img src="img/305992.jpg" width="1304" height="605" class="d-block w-100" alt="Class"/>
  <div class="mask" style="background-color: hsla(0, 0%, 0%, 0.6)"></div>
</div>
      <div class="carousel-caption d-none d-md-block">
        <h2>Quản lý sinh viên</h2>
        <p style="font-size: 20px">Chức năng quản lý sinh viên được tích hợp những công cụ hỗ trợ như hiển thị thông tin sinh viên, tìm kiếm sinh viên, thêm sinh viên. Qua đó, giáo viên có thể nắm bắt thông tin và tình hình học tập của sinh viên.</p>
      </div>
    </div>

    
  </div>
  <!-- Inner -->

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Carousel wrapper -->
<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center p-4 border-bottom">
    <div>
      <a href="https://www.facebook.com/profile.php?id=100028071540456" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="https://www.linkedin.com/in/%C4%91%E1%BA%A1t-nguy%E1%BB%85n-956509220/" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
    </div>
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Learning Management System
          </h6>
          <p>
          Hệ thống quản lý sinh viên <abbr title="Learning Management System">LMS</abbr> là hệ thống được sinh ra nhằm hỗ trợ và cải thiện chất lượng đào tạo và quản lý sinh viên của trường Đại học Bách Khoa Hà Nội.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Sản phẩm
          </h6>
          <p>
            Quản lý lớp học
          </p>
          <p>
            Quản lý sinh viên
          </p>
          <p>
            Quản lý dự án
          </p>
        </div>
        <!-- Grid column -->
        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Liên hệ</h6>
          <p><i class="fas fa-home me-3"></i> Đại học Bách Khoa Hà Nội</p>
          <p>
            <i class="fas fa-envelope me-3"></i><a href="mailto: mylms@gmail.com">mylms@gmail.com</a>
          </p>
          <p><i class="fas fa-phone me-3"></i><a href="tel: +84989160060">(+84) 989 160 060</a></p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->
  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    <a class="text-reset fw-bold" href="#">&copy; Back to top</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

  <!-- Background image -->
  <!-- End your project here-->

  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
  
</body>

</html>