<?php
require_once '../../process/connect.php';
$id = $_GET['id'];
$getinf = new Query();
$infProjects = $getinf->infProject($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/project.css">
    <link rel="stylesheet" href="../../css/change_project.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Project Information</title>
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
        <h1>Inventory System</h1>
        <div class="sidebar-box">
            <i class="fa-solid fa-house" style="color: #b8c7ce;"></i>
            <h2><a href="../index.php">Trang chủ</a></h2>
        </div>
        <div class="sidebar-box">
            <i class="fa-solid fa-user" style="color: var(--white, #b8c7ce);"></i>
            <h2>Quản lý người dùng</h2>
        </div>
        <div class="sidebar-box">
            <i class="fa-solid fa-sack-dollar" style="color: var(--white, #b8c7ce);"></i>
            <h2><a href="staff.php">Quản lý nhân viên</a></h2>
        </div>
        <div class="sidebar-box-active">
            <i class="fa-solid fa-gear" style="color: var(--white, white);"></i>
            <h2><a href="../project.php">Quản lý dự án</a></h2>
        </div>
        <div class="sidebar-box">
            <i class="fa-solid fa-face-smile" style="color: var(--white, #b8c7ce);"></i>
            <h2>Quản lý khách hàng</h2>
        </div>
        <div class="sidebar-box">
            <i class="fa-solid fa-shop" style="color: var(--white, #b8c7ce);"></i>
            <h2><a href="brand.php">Báo cáo, thống kê</a></h2>
        </div>
    </div>
    
    <!-- content -->
    <div class="content">
        <div class="content-title">
            <p>Quản lý dự án</p>
            <ul>
                <i class="fa-solid fa-palette"></i>
                <li class="home"><a href="index.php">Trang chủ</a></li>
                <li> > </li>
                <li>Quản lý dự án</li>
                <li> > </li>
                <li>Thông tin dự án</li>
            </ul>
        </div>

        <!-- Dashboard title -->
        
        <div class="dashboard">
        <?php
            foreach ($infProjects as $infProject): ?>
            <div class="dashboard-box-infor">
                <span><?php echo $infProject["Task_name"] ?></span>
                <p>Trạng thái: <?php echo $infProject["Project_status"] ?></p>
                <p>Người đảm nhiệm: <?php echo $infProject["Project_manager"] ?></p>
                <p>Ngày tạo: <?php echo $infProject["Project_time_start"] ?></p>
                <a href="project.php">More info</a>
                <i class="fa-regular fa-circle-right"></i>
            </div>
            <?php endforeach; ?>
        </div>

        
    </div>
    <script src="../js/index.js"></script>
    <script src="../js/project.js"></script>
    <script src="../js/deleteConfirm.js"></script>
</body>
</html>