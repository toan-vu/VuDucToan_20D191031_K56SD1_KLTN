<?php

require_once 'connect.php';
require_once 'helper.php';

// if ($_POST['id'] > 0 && is_numeric($_POST['id'])) {
//     $getinf = new Query();
//     $products = $getinf->deleteEntry(['id' => $_POST['id']]);
//     // delete(['id' => $_POST['id']]);
// }
// echo $_POST['id'];
// redirectEntry();

$request = $_POST;

$data = [
    'id' => $request['id'],
];

$getinf = new Query();
    $products = $getinf->deleteProject($data);
redirectProduct();