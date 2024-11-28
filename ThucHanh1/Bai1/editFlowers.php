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
    <script src="./js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <!-- Tiêu đề -->
        <h1 class="text-center text-primary mb-4">Chỉnh sửa Hoa</h1>

        <!-- Form chỉnh sửa -->
        <div class="card shadow-lg p-4">
            <form action="process.php" method="post" enctype="multipart/form-data">

                <input type="hidden" value="<?= $_GET['id']; ?>" name="index">
                <div class="mb-3">
                    <label for="flowerName" class="form-label fw-bold">Tên Hoa</label>
                    <input type="text" class="form-control" id="flowerName" name="Name"
                        value="<?= $flowers[$_GET['id']]['name']; ?>">
                </div>

                <div class="mb-3">
                    <label for="flowerDescription" class="form-label fw-bold">Mô Tả</label>
                    <textarea class="form-control" id="flowerDescription" name="Description" rows="3"><?= $flowers[$_GET['id']]['description']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="flowerImage" class="form-label fw-bold">Đường Dẫn Ảnh</label>
                    <input type="file" class="form-control" id="flowerImage" name="Image">
                    <img src="<?= $flowers[$_GET['id']]['image']; ?>" alt="">
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