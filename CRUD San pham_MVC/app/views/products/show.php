<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $product['name']; ?></title>
</head>
<body>
    <h1><?php echo $product['name']; ?></h1>
    <p>Giá: <?php echo $product['price']; ?> VNĐ</p>
    <img src="<?php echo $product['image']; ?>" alt="Image of <?php echo $product['name']; ?>">
    <a href="index.php?controller=product&action=index">Quay lại danh sách sản phẩm</a>
</body>
</html>
