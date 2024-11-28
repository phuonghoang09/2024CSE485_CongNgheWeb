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

$flower = null;

// Kiểm tra phương thức gửi dữ liệu
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['method']) && $_POST['method'] === 'EDIT') {
    $id = $_POST['id'];
    $name = $_POST['Name'];
    $description = $_POST['Description'];
    $image = null;

    // Kiểm tra nếu có ảnh mới được tải lên
    if (isset($_FILES['Image']) && $_FILES['Image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "./images/"; // Đảm bảo thư mục images đã tồn tại và có quyền ghi
        $target_file = $target_dir . basename($_FILES["Image"]["name"]);

        // Di chuyển file ảnh từ tạm thời đến thư mục đích
        if (move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file)) {
            $image = $target_file;
        } else {
            echo "Có lỗi khi tải ảnh lên.";
            exit();
        }
    } else {
        // Nếu không thay đổi ảnh, lấy giá trị ảnh cũ
        $sql = "SELECT image FROM flowers WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $flower = $result->fetch_assoc();
            $image = $flower['image']; // Giữ ảnh cũ
        }
        $stmt->close();
    }

    // Cập nhật lại cơ sở dữ liệu
    $sql = "UPDATE flowers SET name = ?, description = ?, image = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $description, $image, $id);

    if ($stmt->execute()) {
        echo "Cập nhật hoa thành công!";
        header('Location: trang_quan_tri.php'); // Chuyển hướng về trang quản lý hoa
        exit();
    } else {
        echo "Lỗi khi cập nhật dữ liệu: " . $stmt->error;
    }

    $stmt->close();
} else if (isset($_GET['id'])) {
    // Lấy thông tin hoa từ CSDL khi mở trang chỉnh sửa
    $flower_id = $_GET['id'];
    $sql = "SELECT * FROM flowers WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $flower_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Nếu có kết quả, gán dữ liệu vào biến
    if ($result->num_rows > 0) {
        $flower = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy hoa.";
        exit();
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
    <script src="./js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <!-- Tiêu đề -->
        <h1 class="text-center text-primary mb-4">Chỉnh sửa Hoa</h1>

        <!-- Form chỉnh sửa -->
        <div class="card shadow-lg p-4">
            <form action="editFlowers.php" method="post" enctype="multipart/form-data">
                <!-- ID hoa (ẩn) -->
                <input type="hidden" value="<?= $flower['id']; ?>" name="id">

                <div class="mb-3">
                    <label for="flowerName" class="form-label fw-bold">Tên Hoa</label>
                    <input type="text" class="form-control" id="flowerName" name="Name" value="<?= htmlspecialchars($flower['name']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="flowerDescription" class="form-label fw-bold">Mô Tả</label>
                    <textarea class="form-control" id="flowerDescription" name="Description" rows="3" required><?= htmlspecialchars($flower['description']); ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="flowerImage" class="form-label fw-bold">Đường Dẫn Ảnh</label>
                    <input type="file" class="form-control" id="flowerImage" name="Image">
                    <img src="<?= htmlspecialchars($flower['image']); ?>" alt="Image" class="img-fluid" style="max-width: 200px;">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success w-50" name="method" value="EDIT">
                        Lưu thay đổi
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>