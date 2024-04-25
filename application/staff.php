<?php
require_once '../process/connect.php';
$getinf = new Query();
$staffs = $getinf->staff();
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
    <title>Staff</title>
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
        <div class="sidebar-box-active">
            <i class="fa-solid fa-sack-dollar" style="color: var(--white, white);"></i>
            <h2><a href="order.php">Quản lý nhân viên</a></h2>
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
            <h2><a href="brand.php">Báo cáo, thống kê</a></h2>
        </div>
    </div>
    
    <!-- content -->
    <div class="content">
        <div class="content-title">
            <p>Quản lý nhân viên</p>
            <ul>
                <i class="fa-solid fa-palette"></i>
                <li class="home"><a href="index.php">Trang chủ</a></li>
                <li> > </li>
                <li>Quản lý nhân viên</li>
            </ul>
        </div>

        <!-- Dashboard orders information -->
        <div class="order-list">
            <div class="add-order">
                <button class="add-order-button" name=""><a href="create/entry.php">Thêm nhân viên</a></button>
            </div>
            <div class="order-list-option">
                <button class="order-list-button active button" name="">Danh sách nhân viên</button>
            </div>

            <div class="each-order-list">

                <!-- order for entry  -->
                <div class="order-list-box active">
                    <!-- filter -->
                    <div class="filter">
                        <i class="fa-solid fa-filter"></i>
                        <select name="cars" id="cars">
                            <option value="volvo">Tất cả</option>
                            <option value="saab">Theo chức vụ</option>
                            <option value="mercedes">Theo ngày sinh</option>
                        </select>
                    </div>
                    <!-- entry table -->
                    <table>
                        <tr class="order-box-select">
                            <th>Mã nhân viên</th>
                            <th>Tên nhân viên</th>
                            <th>Chức vụ</th>
                            <th>Phòng ban</th>
                            <th>Giới tính</th>
                            <th>Ngày sinh</th>
                            <th>Địa chỉ</th>
                            <th>Quê quán</th>
                            <th>SĐT</th>
                            <th>Tuỳ chọn</th>
                        </tr>

                        <?php
                        foreach ($staffs as $staff): ?>
                        <tr>
                            <td><a href=""></a><?php echo $staff["User_ID"] ?></td>
                            <td><a href=""></a><?php echo $staff["User_name"] ?></td>
                            <td><a href=""></a><?php echo $staff["Position_name"] ?></td>
                            <td><a href=""></a><?php echo $staff["Department_name"] ?></td>
                            <td><a href=""></a><?php echo $staff["User_gender"] ?></td>
                            <td><a href=""></a><?php echo $staff["User_birth"] ?></td>
                            <td><a href=""></a><?php echo $staff["User_address"] ?></td>
                            <td><a href=""></a><?php echo $staff["User_Town"] ?></td>
                            <td><a href=""></a><?php echo $staff["User_phone"] ?></td>
                            <td>
                                <a href="create/infor_entry.php?id=<?= $staff['User_ID'] ?>"><i class="fa-regular fa-eye"></i></a>
                                <a href="create/change_entry.php?id=<?= $staff['User_ID'] ?>"><i class="fa-solid fa-pencil"></i></a>
                                <i onclick="confirmDelete()" class="fa-solid fa-trash-can"></i>
                            </td>    
                                <!-- delete form -->
                                <div class="confirm-delete-popup">
                                    <span>XOÁ PHIẾU NHẬP ĐÃ CHỌN?</span>
                                    <p>Bạn có chắc chắn muốn xoá phiếu nhập đã chọn không ?</p>
                                    <div class="confirm-popup-button">
                                        <button class="confirm-popup-cancel" onclick="closeDeletePopup()">Huỷ bỏ</button>

                                        <form method="post" action="../process/delete_entry.php">
                                        <input type="hidden" value="<?php echo $staff["User_ID"] ?>" name="id">
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