<?php
require_once '../../process/connect.php';
$getinf = new Query();
$projects = $getinf->project();
$staffs = $getinf->staff();
$customers = $getinf->customer();
$types = $getinf->type();
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
    <title>Change Project Information</title>
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
                <li>Tạo dự án</li>
            </ul>
        </div>

        <!-- Dashboard title -->
        <div class="output-detail">
            <form action="../../process/add_project.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <!-- entry information-->
                <div class="require-info">

                    <div class="output-detail-box">
                        <label for="Project_name">Tên dự án</label>
                        <input name ="Project_name" id="Project_name" type="text">
                    </div>


                    <div class="output-detail-box">
                        <label for="date">Thời gian bắt đầu</label>
                        <input name ="date" id="date" type="date">
                    </div>

                    <div class="output-detail-box">
                        <label for="status">Trạng thái</label>
                        <input name ="status" id="status" type="text">
                    </div>

                    <div class="output-detail-box">
                        <label for="manager">Người phụ trách</label>
                        <input name ="manager" id="manager" type="text">
                    </div>

                    <div class="output-detail-box">
                        <label for="budget">Vốn dự toán</label>
                        <input name ="budget" id="budget" type="text">
                    </div>

                    <div class="output-detail-box">
                        <label for="customer">Mã khách hàng</label>
                        <select name="customer" id="customer">
                        <option value="">Chọn mã khách hàng</option>
                        <?php
                        foreach ($customers as $customer): ?>
                            <option value="<?php echo $customer["Customer_ID"] ?>"><?php echo $customer["Customer_name"] ?></option>
                        <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="output-detail-box">
                        <label for="type">Loại dự án</label>
                        <select name="type" id="type">
                        <option value="">Chọn loại dự án</option>
                        <?php
                        foreach ($types as $type): ?>
                            <option value="<?php echo $type["PT_ID"] ?>"><?php echo $type["PT_name"] ?></option>
                        <?php endforeach; ?>

                        </select>
                    </div>
                    
                </div>
                <button type = "submit" name = "submit">Thêm mới</button>
            </form>
        </div>

        
    </div>
    <script src="../js/index.js"></script>
    <script src="../js/project.js"></script>
    <script src="../js/deleteConfirm.js"></script>
</body>
</html>