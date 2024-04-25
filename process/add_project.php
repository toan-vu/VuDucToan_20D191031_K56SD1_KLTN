<?php
require_once 'connect.php';
require_once 'helper.php';

$request = $_POST;

$data = [
    'type' => $request['type'],
    'Project_name' => $request['Project_name'],
    'status' => $request['status'], 
    'customer' => $request['customer'],
    'date' => $request['date'],
    'manager' => $request['manager'],
    'budget' => $request['budget'],
];

$getinf = new Query();
    $products = $getinf->createProject($data);
redirectProduct();