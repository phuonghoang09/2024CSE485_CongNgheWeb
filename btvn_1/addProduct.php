<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Thêm sản phẩm</title>
</head>

<body>
    <div class="container mt-5">
        <!-- Tiêu đề -->
        <h1 class="text-center text-primary mb-4">Thêm Sản Phẩm Mới</h1>

        <!-- Form Thêm Sản Phẩm -->
        <div class="card shadow-lg p-4">
            <form action="./index.php" method="post">
                <div class="mb-3">
                    <label for="productName" class="form-label fw-bold">Tên Sản Phẩm</label>
                    <input type="text" class="form-control" id="productName" name="Name" placeholder="Nhập tên sản phẩm" required>
                </div>
                <div class="mb-3">
                    <label for="productPrice" class="form-label fw-bold">Giá Thành (VND)</label>
                    <input type="number" class="form-control" id="productPrice" name="Price" placeholder="Nhập giá sản phẩm" min="0" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-50" name="method" value="ADD">
                        Thêm Sản Phẩm
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Font Awesome và Bootstrap JavaScript -->
    <script src="./js/bootstrap.bundle.min.js" defer></script>
</body>