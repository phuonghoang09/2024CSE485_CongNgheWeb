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
    <?php include 'header.php'; ?>

    <div class="container mt-4">
        <h1 class="text-center mb-4">Danh Sách Các Loài Hoa</h1>
        <div class="row">
            <?php foreach ($flowers as $index => $flower) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo $flower['image']; ?>" class="card-img-top" alt="<?php echo $flower['name']; ?>" onerror="this.src='./images/default.jpg'">
                        <div class="card-body">
                            <!-- Thêm số thứ tự vào tên hoa -->
                            <h5 class="card-title"><?php echo ($index + 1) . '. ' . $flower['name']; ?></h5>
                            <p class="card-text"><?php echo $flower['description']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>