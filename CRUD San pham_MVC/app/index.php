<?php
// Nạp các tệp cần thiết
require_once '../app/config/connectionDB.php'; // Kết nối CSDL
require_once '../app/controllers/productsController.php'; // Controller sản phẩm
require_once '../app/models/product.php'; // Model sản phẩm

// Tạo đối tượng model và controller
$productModel = new Product($db);
$productController = new ProductController($productModel);

// Xử lý yêu cầu và gọi đúng action
$action = isset($_GET['action']) ? $_GET['action'] : 'index';  // Lấy action từ URL (mặc định là 'index')
$id = isset($_GET['id']) ? $_GET['id'] : null;  // Lấy ID từ URL (nếu có)

if ($action == 'index') {
    // Nếu action là 'index', gọi phương thức index() của controller
    $productController->index();
} elseif ($action == 'show' && $id) {
    // Nếu action là 'show' và có ID, gọi phương thức show() của controller với ID
    $productController->show($id);
} elseif ($action == 'create') {
    // Nếu action là 'create', gọi phương thức create() của controller
    $productController->create();
} elseif ($action == 'update' && $id) {
    // Nếu action là 'update' và có ID, gọi phương thức update() của controller với ID
    $productController->update($id);
} elseif ($action == 'delete' && $id) {
    // Nếu action là 'delete' và có ID, gọi phương thức delete() của controller với ID
    $productController->delete($id);
}
?>
