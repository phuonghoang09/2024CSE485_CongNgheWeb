<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sản phẩm</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./js/bootstrap.bundle.min.js">
</head>

<body>
    <div class="container mt-5">
        <!-- Tiêu đề -->
        <h1 class="text-center text-primary mb-4">Chỉnh sửa sản phẩm</h1>

        <!-- Form chỉnh sửa -->
        <div class="card shadow-lg p-4">
            <form action="index.php?index=<?= urlencode($_GET['index']); ?>" method="post">
                <div class="mb-3">
                    <label for="productName" class="form-label fw-bold">Tên Sản Phẩm</label>
                    <input type="text" class="form-control" id="productName" name="Name" value="<?= htmlspecialchars($_GET['name']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="productPrice" class="form-label fw-bold">Giá Thành (VND)</label>
                    <input type="number" class="form-control" id="productPrice" name="Price" value="<?= htmlspecialchars($_GET['price']) ?>" min="0" required>
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