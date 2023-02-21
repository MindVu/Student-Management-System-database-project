<?php
session_start();
require 'includes/db_connection.php';
if(isset($_POST['student_search']))
{
  $valuetosearch_student=$_POST['valuetosearch_student'];
  $sql = "SELECT * FROM student WHERE CONCAT(id, name) LIKE '%".$valuetosearch_student."%'";
  $result = mysqli_query($conn, $sql);
}else
{
  $sql = "SELECT * FROM student";
  $result = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Danh sách lớp</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <link href="css/addons/datatables.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <script type="text/javascript" src="js/addons/datatables.min.js"></script>
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
    .td{
      text-align: center;
    }
    body{
  background: rgb(239,250,253);
background: linear-gradient(90deg, rgba(239,250,253,1) 100%, rgba(74,139,223,1) 100%);
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
<br>
<div style="text-align: center; color:#162942"><h2>Danh sách sinh viên</h2></div>
<hr>
<div style="text-align: center; font-weight: bold;">
<form action="studentlist.php" method="post">
  <div class="input-group">
  <input type="search" name="valuetosearch" placeholder="Tìm sinh viên theo ID hoặc tên" class="form-control w-25" aria-label="Search" aria-describedby="search-addon" style="text-align: center; margin-left: 470px; border-color: #FAFAFA; border: solid;">
  <button type="submit" name="student_search" class="btn btn-outline-primary" style="background: rgb(60,132,171);
background: linear-gradient(45deg, rgba(60,132,171,1) 100%, rgba(255,120,164,0) 100%); color: #FAFAFA; border: none; text-align: left; margin-right: 470px;">
<i class="fas fa-search"></i>
</button>
</div>
</form>
<p>
  <?php
  $sql2="SELECT COUNT(*) AS count FROM student WHERE gender = 'M'";
  $result2 = mysqli_query($conn, $sql2);
  $row = mysqli_fetch_array($result2);
  echo "Nam: ".$row["count"]."&nbsp;&nbsp;&nbsp;";
  mysqli_free_result($result2);
  $sql1="SELECT COUNT(*) AS count FROM student WHERE gender = 'F'";
  $result1 = mysqli_query($conn, $sql1);
  $row = mysqli_fetch_array($result1);
  echo "Nữ: ".$row["count"]."<br>";
  mysqli_free_result($result1);
  ?>
</p>
<a class="btn btn-primary btn-lg btn-floating" role="button" href="addstudent.php"><i class="fas fa-plus"></i></a>
</div>
<br>
<table class="table table-hover td">
  <thead>
    <tr style="background: rgb(133,205,253);
background: linear-gradient(45deg, rgba(133,205,253,1) 100%, rgba(255,120,164,0) 100%);">
      <th scope="col">Mã sinh viên</th>
      <th scope="col">Tên</th>
      <th scope="col">Giới tính</th>
      <th scope="col">Ngày sinh</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">GPA</th>
    </tr>
    </thead>
    <tbody id="myTable">
<?php
while($row = mysqli_fetch_array($result))
{
  echo "<tr >
  <th scope='row'>" . $row["id"] . "</th>
  <td>" . $row["name"] . "</td>
  <td>" . $row["gender"] . "</td>
  <td>" . $row["dob"] . "</td>
  <td>" . $row["phone"] . "</td>
  <td>" . $row["gpa"] . "</td>
  </tr>"
;
}
mysqli_free_result($result);
?>
</tbody>
</table>

  <!-- End your project here-->

  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript">
  </script>
</body>

</html>