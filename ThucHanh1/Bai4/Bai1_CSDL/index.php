<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THẾ GIỚI HOA</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="container mt-4">
        <h1 class="text-center mb-4">Danh Sách Các Loài Hoa</h1>
        <div class="row">
            <?php
            // Kết nối đến cơ sở dữ liệu
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "flowers_db";

            // Tạo kết nối
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Kiểm tra kết nối
            if ($conn->connect_error) {
                die("<div class='alert alert-danger text-center'>Kết nối thất bại: " . $conn->connect_error . "</div>");
            }

            // Truy vấn dữ liệu từ bảng flowers
            $sql = "SELECT * FROM flowers";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Hiển thị dữ liệu
                $index = 1; // Số thứ tự
                while ($flower = $result->fetch_assoc()) {
                    echo '
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="' . htmlspecialchars($flower['image']) . '" class="card-img-top" alt="' . htmlspecialchars($flower['name']) . '" onerror="this.src=\'./images/default.jpg\'">
                            <div class="card-body">
                                <h5 class="card-title">' . $index++ . '. ' . htmlspecialchars($flower['name']) . '</h5>
                                <p class="card-text">' . htmlspecialchars($flower['description']) . '</p>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo '<div class="alert alert-warning text-center">Không có dữ liệu hoa trong cơ sở dữ liệu.</div>';
            }

            // Đóng kết nối
            $conn->close();
            ?>
        </div>
    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>