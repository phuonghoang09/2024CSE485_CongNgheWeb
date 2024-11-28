<?php
require 'flowers.php';
session_start();
if (isset($_SESSION['flowers']) && !empty($_SESSION['flowers']))
    $flowers = $_SESSION['flowers'];

if ($_POST['method'] == 'ADD') {
    $target_dir = "images/"; //Đây là thư mục đích trên server, nơi file tải lên sẽ được lưu trữ.
    $target_file = $target_dir . basename($_FILES["Image"]["name"]); // đường dẫn tới file
    move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file);
    $flowers[] = [
        'name' => $_POST['Name'],
        'description' => $_POST['Description'],
        'image' => $target_file
    ];
    $_SESSION['flowers'] = $flowers;
    header('Location: trang_quan_tri.php');
} else if ($_POST['method'] == 'EDIT') {
    $target_dir = "images/"; //Đây là thư mục đích trên server, nơi file tải lên sẽ được lưu trữ.
    $target_file = $target_dir . basename($_FILES["Image"]["name"]); // đường dẫn tới file
    move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file);
    if (!empty($_FILES["Image"]["name"])) {
        $flowers[$_POST['index']] = [
            'name' => $_POST['Name'],
            'description' => $_POST['Description'],
            'image' => $target_file
        ];
    } else {
        $flowers[$_POST['index']]['name'] =  $_POST['Name'];
        $flowers[$_POST['index']]['description'] =  $_POST['Description'];
    }

    $_SESSION['flowers'] = $flowers;
    header('Location: trang_quan_tri.php');
} else {
    unset($flowers[$_POST['index']]);
    $_SESSION['flowers'] = $flowers;
    header('Location: trang_quan_tri.php');
}
