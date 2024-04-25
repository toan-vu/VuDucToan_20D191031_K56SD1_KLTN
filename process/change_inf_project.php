<?php
require_once 'connect.php';
require_once 'helper.php';

$request = $_POST;
$id = $request['id'];

    $name = $request['name'];
    $date = $request['date'];
    $status = $request['status'];
    $budget = $request['budget'];
    $manager = $request['manager'];
    $customer = $request['customer'];
    $type = $request['type'];


$getinf = new Query();
    $products = $getinf->updateProject($id, $name, $date, $status, $budget, $manager, $customer, $type);
    echo
    "
    <script>
    alert('Sửa thông tin dự án thành công.');
    document.location.href = '../application/project.php';
    </script>
    ";
