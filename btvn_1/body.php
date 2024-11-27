<?php
include './products.php';
static $dem = 0;
if ($_POST) {
    // Kiểm tra xem 'Name' và 'Price' có tồn tại và không rỗng
    if (isset($_POST['Name'], $_POST['Price']) && !empty($_POST['Name']) && !empty($_POST['Price'])) {
        // Nếu phương thức là 'ADD', thêm sản phẩm mới
        if ($_POST['method'] === 'ADD') {
            $products[] = ['name' => $_POST['Name'], 'price' => $_POST['Price'], 'image' => ''];
            print_r($_POST);
        }
        // Nếu không, cập nhật sản phẩm tại vị trí index
        else if ($_POST['method'] === 'EDIT') {
            $products[$_GET['index']] = ['name' => $_POST['Name'], 'price' => $_POST['Price'], 'image' => ''];
        } else {
            unset($products[$_GET['index']]);
        }
    } else if (isset($_POST['value'])) {
        if ($_POST['value'] == 'YES')
            unset($products[$_GET['index']]);
    } else if (isset($_POST['submit'])) {
        $target_dir = "./img/"; //Đây là thư mục đích trên server, nơi file tải lên sẽ được lưu trữ.
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); // đường dẫn tới file
        $products[$_GET['index']]['image'] = $target_file;
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/js/bootstrap.bundle.min.js">
    <!-- Link Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <main class="container my-4">

        <div class="mb-3 text-start">
            <a href="./addProduct.php" class="btn btn-success">
                Thêm mới
            </a>
        </div>

        <?php if (empty($products)): ?>
            <p class="text-center text-muted">Không có sản phẩm nào.</p>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá thành</th>
                            <th>Image</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $index => $product): ?>
                            <tr>
                                <td><?= htmlspecialchars($product['name']) ?></td>
                                <td><?= htmlspecialchars($product['price']) ?> VND</td>
                                <td>
                                    <?php if (empty($product["image"])): ?>
                                        <form action="index.php?index=<?= $index ?>" method="post" enctype="multipart/form-data">
                                            <input type="file" name="fileToUpload" id="fileToUpload">
                                            <button type="submit" class="btn btn-sm btn-primary mt-1" name="submit">Tải lên ảnh</button>
                                        </form>
                                    <?php else: ?>
                                        <img src="<?= htmlspecialchars($product['image']) ?>" width="50px" alt="Hình sản phẩm">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <!-- Truyền name và price qua URL -->
                                    <a href="edit.php?name=<?= urlencode($product['name']); ?>&price=<?= urlencode($product['price']); ?>&index=<?= $index; ?>" class="btn btn-sm btn-secondary mx-1">
                                        <i class="fa-solid fa-pen-to-square"></i> Sửa
                                    </a>
                                    <a href="delete.php?name=<?= urlencode($product['name']); ?>&price=<?= urlencode($product['price']); ?>&index=<?= $index; ?>" class="btn btn-sm btn-secondary">
                                        <i class="fa-solid fa-trash"></i> Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </main>
</body>

</html>