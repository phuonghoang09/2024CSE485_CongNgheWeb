<?php
// Cấu hình thông tin kết nối cơ sở dữ liệu
$host = 'localhost';    // Địa chỉ máy chủ MySQL (thường là localhost)
$dbname = 'products_db';     // Tên cơ sở dữ liệu
$username = 'root';     // Tên người dùng cơ sở dữ liệu
$password = '';         // Mật khẩu của người dùng

// Tạo DSN (Data Source Name) cho kết nối PDO
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

try {
    // Tạo kết nối PDO
    $db = new PDO($dsn, $username, $password);

    // Thiết lập chế độ lỗi cho PDO để dễ dàng phát hiện lỗi
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // In thông báo khi kết nối thành công (có thể loại bỏ ở môi trường sản xuất)
    // echo "Kết nối cơ sở dữ liệu thành công!";
} catch (PDOException $e) {
    // Nếu có lỗi kết nối, hiển thị lỗi
    echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
    exit;
}
