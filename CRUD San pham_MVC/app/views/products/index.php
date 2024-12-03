<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Quản Lý Sản Phẩm</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="index.php?controller=product&action=create" class="btn btn-success me-2">
                            <i class="fa-solid fa-circle-plus"></i> Thêm sản phẩm mới
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="bg-light py-4">
        <div class="container text-center">
            <h1 class="text-success">Danh sách sản phẩm</h1>
        </div>
    </header>

    <!-- Danh sách sản phẩm -->
    <div class="container mt-4">
        <?php if (empty($products)): ?>
            <div class="alert alert-warning text-center">
                Không có sản phẩm nào được tìm thấy.
            </div>
        <?php else: ?>
            <table class="table table-bordered table-hover text-center align-middle">
                <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $index => $product): ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td>
                                <?php if (isset($product['image'])): ?>
                                    <img src="<?php echo $product['image']; ?>" alt="Product Image" style="width: 80px; height: 80px; object-fit: cover;">
                                <?php else: ?>
                                    <span class="text-danger">Không có hình ảnh</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $product['name']; ?></td>
                            <td class="text-primary fw-bold"><?php echo $product['price']; ?></td>
                            <td>
                                <a href="index.php?controller=product&action=update&id=<?php echo $product['id']; ?>" class="btn btn-secondary btn-sm me-2">
                                    <i class="fa-solid fa-pen"></i> Sửa
                                </a>
                                <a href="index.php?controller=product&action=delete&id=<?php echo $product['id']; ?>" class="btn btn-secondary btn-sm">
                                    <i class="fa-solid fa-trash"></i> Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>