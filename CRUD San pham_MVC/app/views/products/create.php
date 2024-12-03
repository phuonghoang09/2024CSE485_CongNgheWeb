<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="../../../public/assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-danger text-center">Thêm sản phẩm mới</h1>
        <form action="index.php?controller=product&action=create" method="POST" enctype="multipart/form-data">
            <label class="form-label" for="name">Tên sản phẩm:</label><br>
            <input class="form-control" type="text" name="name" required><br>
            <label class="form-label" for="price">Giá sản phẩm:</label><br>
            <input class="form-control" type="number" name="price" required><br>
            <label class="form-label" for="image">Ảnh sản phẩm:</label><br>
            <input class="form-control" type="file" name="image" required><br>
            <button class="btn btn-success" type="submit">Thêm sản phẩm</button>
        </form>
    </div>
</body>

</html>