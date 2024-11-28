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

// Kiểm tra phương thức
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['method'] === 'ADD') {
    $name = $_POST['Name'];
    $description = $_POST['Description'];

    // Xử lý ảnh tải lên
    if (isset($_FILES['Image']) && $_FILES['Image']['error'] === UPLOAD_ERR_OK) {
        // Đường dẫn lưu ảnh
        $target_dir = "./images/"; // Đảm bảo thư mục uploads đã tồn tại và có quyền ghi
        $target_file = $target_dir . basename($_FILES["Image"]["name"]);

        // Kiểm tra nếu ảnh đã tồn tại

        // Di chuyển ảnh từ tạm thời đến thư mục đích
        if (move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file)) {
            // Lưu thông tin vào cơ sở dữ liệu
            $stmt = $conn->prepare("INSERT INTO flowers (name, description, image) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $description, $target_file);

            if ($stmt->execute()) {
                echo "Thêm hoa mới thành công!";
                header('Location: trang_quan_tri.php'); // Chuyển hướng về trang quản lý
                exit();
            } else {
                echo "Lỗi khi thêm dữ liệu: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Có lỗi khi tải ảnh lên.";
        }
    } else {
        echo "Vui lòng chọn ảnh.";
    }
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
    <div class="container mt-4">
        <h1 class="mb-4">Thêm Hoa Mới</h1>
        <form action="addFlowers.php" method="post" enctype="multipart/form-data">
            <!-- Thêm trường cho phương thức (ADD) -->
            <input type="hidden" name="method" value="ADD">

            <div class="mb-3">
                <label for="name" class="form-label">Tên Hoa</label>
                <input type="text" class="form-control" id="name" name="Name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô Tả</label>
                <textarea class="form-control" id="description" name="Description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Đường Dẫn Ảnh</label>
                <input type="file" class="form-control" id="image" name="Image" required>
            </div>
            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="trang_quan_tri.php" class="btn btn-secondary">Quay Lại</a>
        </form>
    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>