<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_account_db";

// Kết nối cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Biến kiểm tra xem đã upload file hay chưa
$fileUploaded = false;

// Xử lý khi upload file
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $file = $_FILES["file"]["tmp_name"];

    if (is_uploaded_file($file)) {
        $handle = fopen($file, "r");

        // Bỏ qua dòng tiêu đề
        fgetcsv($handle);

        // Xóa dữ liệu cũ
        $conn->query("TRUNCATE TABLE user_account");

        // Đọc từng dòng và chèn vào CSDL
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $stmt = $conn->prepare("INSERT INTO user_account (username, password, last_name, first_name, city, email, course) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);
            $stmt->execute();
        }

        fclose($handle);
        $fileUploaded = true;
        $message = '<div class="alert alert-success text-center">Dữ liệu đã lưu vào CSDL thành công!</div>';
    } else {
        $message = '<div class="alert alert-danger text-center">Không thể upload file. Vui lòng thử lại.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tải lên file Danh sách tài khoản</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
    <script src="./bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tải lên file Danh sách tài khoản</h1>

        <!-- Hiển thị thông báo -->
        <?= isset($message) ? $message : '' ?>

        <!-- Form Upload -->
        <form action="./index.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="file" class="form-label">Chọn file CSV:</label>
                <input type="file" class="form-control" id="file" name="file" accept=".csv" required>
            </div>
            <button type="submit" class="btn btn-primary">Lưu vào CSDL</button>
        </form>

        <hr>

        <!-- Hiển thị dữ liệu từ CSDL -->
        <?php if ($fileUploaded): ?>
            <?php
            // Lấy dữ liệu từ CSDL sau khi upload thành công
            $sql = "SELECT * FROM user_account";
            $result = $conn->query($sql);
            ?>
            <?php if ($result->num_rows > 0): ?>
                <h2 class="text-center mt-4">Danh Sách Tài Khoản</h2>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Họ</th>
                            <th>Tên</th>
                            <th>Thành Phố</th>
                            <th>Email</th>
                            <th>Khóa học</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $index = 1; ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $index++ ?></td>
                                <td><?= htmlspecialchars($row['username']) ?></td>
                                <td><?= htmlspecialchars($row['password']) ?></td>
                                <td><?= htmlspecialchars($row['last_name']) ?></td>
                                <td><?= htmlspecialchars($row['first_name']) ?></td>
                                <td><?= htmlspecialchars($row['city']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td><?= htmlspecialchars($row['course']) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert alert-warning text-center">Chưa có dữ liệu trong cơ sở dữ liệu.</div>
            <?php endif; ?>
        <?php else: ?>
            <div class="alert alert-warning text-center">Chưa có dữ liệu.</div>
        <?php endif; ?>
    </div>
</body>

</html>