<?php
session_start();
require 'includes/db_connection.php';
if(isset($_POST['class_search']))
{
  $valuetosearch=$_POST['valuetosearch'];
  $sql="SELECT * FROM class WHERE id_teacher = " . $_SESSION['userid'] . " AND CONCAT(id, name) LIKE '%".$valuetosearch."%'";
  $result = mysqli_query($conn, $sql);
}else
{
  $sql="SELECT * FROM class WHERE id_teacher = " . $_SESSION['userid'] ."";
  $result = mysqli_query($conn, $sql);
}
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
<form action="classlist.php" method="post">
  <input type="text" name="valuetosearch" placeholder="Tìm lớp theo ID hoặc môn học">
  <button type="submit" name="class_search">Tìm kiếm</button>
</form>
<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Mã lớp</th>
      <th scope="col">Môn học</th>
      <th scope="col">Tín chỉ</th>
      <th scope="col">Bắt đầu</th>
      <th scope="col">Kết thúc</th>
    </tr>
    </thead>
    <tbody>
<?php
while($row = mysqli_fetch_array($result))
{
  echo "<tr class='table-active'>
  <th scope='row'>" . $row["id"] . "</td>
  <td>" . $row["name"] . "</td>
  <td>" . $row["credit"] . "</td>
  <td>" . $row["start_time"] . "</td>
  <td>" . $row["end_time"] . "</td>
  </tr>";
}
mysqli_free_result($result);
?>
</tbody>
</table>
  <!-- End your project here-->

  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>

</html>