<?php
require_once '../process/connect.php';
$getinf = new Query();
$projects = $getinf->project();
$staffs = $getinf->staff();
$customers = $getinf->customer();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Project Analist</title>
</head>
<body>
     <!-- navbar -->
     <div class="navbar">
        <div class="navbar-box">
            <i class="fa-solid fa-bars active" style="color: #0071AF;"></i>
            <div class="navbar-user">
                <i class="fa-regular fa-circle-user"></i>
                <span>User#1</span>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
        </div>
    </div>    
    <!--sidebar  -->
    <div class="sidebar">
        <h1>GPCN Việt CNV</h1>
        <div class="sidebar-box-active">
            <i class="fa-solid fa-house" style="color: white;"></i>
            <h2><a href="index.php">Trang chủ</a></h2>
        </div>
        <div class="sidebar-box">
            <i class="fa-solid fa-user" style="color: var(--white, #b8c7ce);"></i>
            <h2>Quản lý người dùng</h2>
        </div>
        <div class="sidebar-box">
            <i class="fa-solid fa-sack-dollar" style="color: var(--white, #b8c7ce);"></i>
            <h2><a href="staff.php">Quản lý nhân viên</a></h2>
        </div>
        <div class="sidebar-box">
            <i class="fa-solid fa-gear" style="color: var(--white, #b8c7ce);"></i>
            <h2><a href="project.php">Quản lý dự án</a></h2>
        </div>
        <div class="sidebar-box">
            <i class="fa-solid fa-face-smile" style="color: var(--white, #b8c7ce);"></i>
            <h2>Quản lý khách hàng</h2>
        </div>
        <div class="sidebar-box">
            <i class="fa-solid fa-shop" style="color: var(--white, #b8c7ce);"></i>
            <h2><a href="report.php">Báo cáo, thống kê</a></h2>
        </div>
    </div>
    
    <!-- content -->
    <div class="content">
        <div class="content-title">
            <p>Dashboard</p>
            <ul>
                <i class="fa-solid fa-palette"></i>
                <li class="home"><a href="index.php">Trang chủ</a> </li>
                <li> > </li>
                <li>Dashboard</li>
            </ul>
        </div>

        <!-- Dashboard title -->
        <div class="dashboard">
            <div class="dashboard-box">
                <span><?php echo count($projects)?></span>
                <p>On Going Project</p>
                <a href="project.php">More info</a>
                <i class="fa-regular fa-circle-right"></i>
            </div>

            <div class="dashboard-box">
                <span><?php echo count($staffs) ?></span>
                <p>Staff Information</p>
                <a href="staff.php">More info</a>
                <i class="fa-regular fa-circle-right"></i>
            </div>

            <div class="dashboard-box">
                <span><?php echo count($customers) ?></span>
                <p>Customers Information</p>
                <a href="">More info</a>
                <i class="fa-regular fa-circle-right"></i>
            </div>

            <div class="dashboard-box">
                <span>0</span>
                <p>New Reports</p>
                <a href="report.php">More info</a>
                <i class="fa-regular fa-circle-right"></i>
            </div>

            <div class="dashboard-box">
                <span>0.đ</span>
                <p>Total Money</p>
                <a href="">More info</a>
                <i class="fa-regular fa-circle-right"></i>
            </div>
        </div>
    </div>
    <script src="../js/index.js"></script>
</body>
</html>
</body>
</html>