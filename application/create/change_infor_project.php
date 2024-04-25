<?php
require_once '../../process/connect.php';
$id = $_GET['id'];
$getinf = new Query();
$customers = $getinf->customer();
$types = $getinf->type();
$projects = $getinf->selectProject($id);
// $changeProjects = $getinf->changeProject($id);
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
                <li>Thay đổi thông tin dự án</li>
            </ul>
        </div>

        <!-- Dashboard orders information -->
        <!-- Dashboard output information -->
        <?php
            foreach ($projects as $project): ?>
        <div class="output-detail">
            <form action="../../process/change_inf_project.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <!-- output information-->
                <div class="require-info">
                <input type="hidden" value="<?= $project['Project_ID'] ?>" name = "id">

                    <div class="output-detail-box">
                        <label for="name">Tên dự án</label>
                        <input name ="name" id="name" type="text" value = "<?= $project['Project_name'] ?>">
                    </div>

                    <div class="output-detail-box">
                        <label for="date">Thời gian bắt đầu</label>
                        <input name ="date" id="date" type="date" value = "<?= $project['Project_time_start'] ?>">
                    </div>

                    <div class="output-detail-box">
                        <label for="status">Trạng thái</label>
                        <input name ="status" id="status" type="text" value = "<?= $project['Project_status'] ?>">
                    </div>


                    <div class="output-detail-box">
                        <label for="budget">Vốn dự toán</label>
                        <input name ="budget" id="budget" type="text" value = "<?= $project['Project_gudget'] ?>">
                    </div>

                    <div class="output-detail-box">
                        <label for="manager">Người phụ trách</label>
                        <input name ="manager" id="manager" type="text" value = "<?= $project['Project_manager'] ?>">
                    </div>

                    <div class="output-detail-box">
                        <label for="customer">Mã khách hàng</label>
                        <select name="customer" id="customer">
                        <option value="<?php echo $project["Customer_ID"] ?>"><?php echo $project["Customer_name"] ?></option>

                        <?php
                        foreach ($customers as $customer): ?>
                            <option value="<?php echo $customer["Customer_ID"] ?>"><?php echo $customer["Customer_name"] ?></option>
                        <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="output-detail-box">
                        <label for="type">Loại dự án</label>
                        <select name="type" id="type">
                        <option value="<?php echo $project["PT_ID"] ?>"><?php echo $project["PT_name"] ?></option>

                        <?php
                        foreach ($types as $type): ?>
                            <option value="<?php echo $type["PT_ID"] ?>"><?php echo $type["PT_name"] ?></option>
                        <?php endforeach; ?>

                        </select>
                    </div>
                    
                </div>
                <button type = "submit" name = "submit">Cập nhật</button>
            </form>
        </div>
        <?php endforeach; ?>

        
    </div>
    <script src="../js/index.js"></script>
    <script src="../js/project.js"></script>
    <script src="../js/deleteConfirm.js"></script>
</body>
</html>