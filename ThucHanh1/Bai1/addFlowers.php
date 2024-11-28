<?php
require 'flowers.php';
session_start();
if (isset($_SESSION['flowers']) && !empty($_SESSION['flowers']))
    $flowers = $_SESSION['flowers'];
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
        <form action="process.php" method="post" enctype="multipart/form-data">
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
                <input type="file" class="form-control" id="image" name="Image">
            </div>
            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="trang_quan_tri.php" class="btn btn-secondary">Quay Lại</a>
        </form>
    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>