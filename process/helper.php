<?php

function redirect($url) {
    header("Location: $url");
    exit;
}

function redirectEntry() {
    redirect('../application/order.php');
}

function redirectProduct() {
    redirect('../application/project.php');
}

function redirectlogin() {
    redirect('user/dangnhap.php');
}
