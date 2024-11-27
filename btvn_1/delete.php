<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận xoá sản phẩm</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <!-- Tiêu đề -->
        <h1 class="text-center text-danger mb-4">Bạn có chắc chắn muốn xóa sản phẩm này?</h1>

        <!-- Form xác nhận xóa -->
        <div class="card shadow-lg p-4 text-center">
            <p class="fw-bold">Sản phẩm sẽ bị xóa vĩnh viễn khỏi hệ thống.</p>
            <form action="index.php?index=<?= urlencode($_GET['index']) ?>" method="post" class="d-flex justify-content-center gap-3">
                <button class="btn btn-success px-4" type="submit" name="value" value="YES">
                    Đồng ý
                </button>
                <button class="btn btn-danger px-4" type="submit" name="value" value="NO">
                    Hủy
                </button>
            </form>
        </div>
    </div>


</body>

</html>