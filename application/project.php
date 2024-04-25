<?php
require_once '../process/connect.php';
$getinf = new Query();
$projects = $getinf->project();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/project.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Projects</title>
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
        <div class="sidebar-box-active">
            <i class="fa-solid fa-gear" style="color: var(--white, white);"></i>
            <h2><a href="project.php">Quản lý dự án</a></h2>
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
            </ul>
        </div>

        <!-- Dashboard orders information -->
        <div class="order-list">
            <div class="add-order">
                <button class="add-order-button" name=""><a href="create/new_project.php">Tạo dự án</a></button>
            </div>
            <div class="order-list-option">
                <button class="order-list-button active button" name="">Danh sách dự án</button>
            </div>

            <div class="each-order-list">

                <!-- order for entry  -->
                <div class="order-list-box active">
                    <!-- filter -->
                    <div class="filter">
                        <i class="fa-solid fa-filter"></i>
                        <select name="cars" id="cars">
                            <option value="volvo">Tất cả</option>
                            <option value="saab">Theo trạng thái</option>
                            <option value="mercedes">Theo ngày tạo</option>
                        </select>
                    </div>
                    <!-- entry table -->
                    <table>
                        <tr class="order-box-select">
                            <th>Mã dự án</th>
                            <th>Tên dự án</th>
                            <th>Trạng thái</th>
                            <th>Thời gian bắt đầu</th>
                            <th>Người phụ trách</th>
                            <th>Vốn dự toán</th>
                            <th>Khách hàng</th>
                            <th>Loại dự án</th>
                            <th>Tuỳ chọn</th>
                        </tr>

                        <?php
                        foreach ($projects as $project): ?>
                        <tr>
                            <td><a href=""></a><?php echo $project["Project_ID"] ?></td>
                            <td><a href=""></a><?php echo $project["Project_name"] ?></td>
                            <td><a href=""></a><?php echo $project["Project_status"] ?></td>
                            <td><a href=""></a><?php echo $project["Project_time_start"] ?></td>
                            <td><a href=""></a><?php echo $project["Project_manager"] ?></td>
                            <td><a href=""></a><?php echo $project["Project_gudget"] ?></td>
                            <td><a href=""></a><?php echo $project["Customer_name"] ?></td>
                            <td><a href=""></a><?php echo $project["PT_name"] ?></td>
                            <td>
                                <a href="create/infor_project.php?id=<?= $project['Project_ID'] ?>"><i class="fa-regular fa-eye"></i></a>
                                <a href="create/change_infor_project.php?id=<?= $project['Project_ID'] ?>">   <i class="fa-solid fa-pencil"></i></a>
                                <i onclick="confirmDelete()" class="fa-solid fa-trash-can"></i>
                            </td>    
                                <!-- delete form -->
                                <div class="confirm-delete-popup">
                                    <span>XOÁ DỰ ÁN ĐÃ CHỌN?</span>
                                    <p>Bạn có chắc chắn muốn xoá dự án đã chọn không ?</p>
                                    <div class="confirm-popup-button">
                                        <button class="confirm-popup-cancel" onclick="closeDeletePopup()">Huỷ bỏ</button>

                                        <form method="post" action="../process/delete_project.php">
                                        <input type="hidden" value="<?php echo $project["Project_ID"] ?>" name="id">
                                        <button type = "submit" class="confirm-popup-delete">Xác nhận</button>
                                        </form>
                                    </div>
                                </div>

                            
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>

        </div>

        
    </div>
    <script src="../js/index.js"></script>
    <script src="../js/project.js"></script>
    <script src="../js/deleteConfirm.js"></script>
</body>
</html>