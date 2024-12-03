<?php
// Bắt đầu session (nếu cần)
session_start();

// Tự động tải các file cần thiết
require_once '../app/config/connectionDB.php'; // Kết nối CSDL
require_once '../app/controllers/productsController.php'; // Controller sản phẩm
require_once '../app/models/product.php'; // Model sản phẩm
// Tạo kết nối cơ sở dữ liệu

// Tạo instance của model
$productModel = new Product($db);

// Tạo instance của controller
$productController = new ProductController($productModel);

// Lấy tham số `action` từ URL để xác định hành động cần thực hiện
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Điều hướng hành động dựa vào tham số `action`
switch ($action) {
    case 'index':
        $productController->index(); // Hiển thị danh sách sản phẩm
        break;
        
    case 'create':
        $productController->create(); // Thêm sản phẩm mới
        break;
    case 'update':
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $productController->update($id); // Cập nhật sản phẩm
        break;
    case 'show':
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $productController->show($id); // Hiển thị chi tiết sản phẩm
        break;

    case 'delete':
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $productController->delete($id); // Xóa sản phẩm
        break;

    default:
        echo "Trang không tồn tại!";
        break;
}
