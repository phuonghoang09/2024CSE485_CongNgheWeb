<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" href="../../../public/assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <h1 class="text-center text-danger">Sửa sản phẩm</h1>
    <form action="index.php?controller=product&action=update&id=<?php echo $product['id']; ?>" method="POST" enctype="multipart/form-data">
        <label class="form-label" for="name">Tên sản phẩm:</label><br>
        <input class="form-control" type="text" name="name" value="<?php echo $product['name']; ?>" required><br>
        <label class="form-label" for="price">Giá sản phẩm:</label><br>
        <input class="form-control" type="text" name="price" value="<?php echo $product['price']; ?>" required><br>
        <label class="form-label" for="image">Ảnh sản phẩm:</label><br>
        <input class="form-control" type="file" name="image"><br>
        <img src="<?= $product['image'];?>" width="500px" alt="">
        <button class="btn btn-warning d-block my-4" type="submit">Cập nhật sản phẩm</button>
    </form>
    </div>
</body>
</html>
