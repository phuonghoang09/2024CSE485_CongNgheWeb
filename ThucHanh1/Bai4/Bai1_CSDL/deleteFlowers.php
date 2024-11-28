<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flowers_db";

// Kết nối đến MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra nếu có yêu cầu xóa hoa
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['index'])) {
    $id = $_POST['index'];

    // Xóa hoa khỏi CSDL
    $sql = "DELETE FROM flowers WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Hoa đã được xóa thành công!";
        header('Location: trang_quan_tri.php'); // Chuyển hướng về trang quản lý hoa
        exit();
    } else {
        echo "Lỗi khi xóa hoa: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THẾ GIỚI HOA</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center text-primary mb-4">Xoá Hoa</h1>

        <form action="deleteFlowers.php" method="POST" id="deleteFlowerForm">
            <!-- Hidden input để gửi chỉ mục hoa -->
            <input type="hidden" name="index" value="<?= $_GET['id']; ?>">

            <button type="submit" class="btn btn-danger">Xóa Hoa</button>
            <a href="trang_quan_tri.php" class="btn btn-secondary">Quay lại</a>
        </form>

    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>