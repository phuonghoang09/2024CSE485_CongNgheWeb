<?php
class ProductController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    // Hiển thị danh sách sản phẩm
    public function index() {
        $products = $this->model->getAllProducts();
        include '../app/views/products/index.php';
    }

    // Hiển thị chi tiết sản phẩm
    public function show($id) {
        $product = $this->model->getProductById($id);
        include '../app/views/products/show.php';
    }

    // Thêm sản phẩm mới
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $target_dir = "../public/assets/img/"; //Đây là thư mục đích trên server, nơi file tải lên sẽ được lưu trữ.
            $target_file = $target_dir . basename($_FILES["image"]["name"]); // đường dẫn tới file
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);    
            $data = ['name' => $name, 'price' => $price, 'image' => $target_file];
            $this->model->createProduct($data);
            header('Location: index.php');  // Quay lại danh sách sản phẩm
        } else {
            include '../app/views/products/create.php';  // Hiển thị form thêm sản phẩm
        }
    }

    // Cập nhật sản phẩm
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            if(isset($_FILES["image"])){
                $target_dir = "../public/assets/img/"; //Đây là thư mục đích trên server, nơi file tải lên sẽ được lưu trữ.
                $target_file = $target_dir . basename($_FILES["image"]["name"]); // đường dẫn tới file
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file); 
            }
            if (!empty($_FILES["image"]["name"])) {
                $data = ['name' => $name, 'price' => $price, 'image' => $target_file];
                $this->model->updateProductIMG($id, $data);
            } else {
                $data = ['name' => $name, 'price' => $price];
                $this->model->updateProduct($id, $data);
            }
            header('Location: index.php');  // Quay lại danh sách sản phẩm
        } else {
            $product = $this->model->getProductById($id);
            include '../app/views/products/edit.php';  // Hiển thị form sửa sản phẩm
        }
    }

    // Xóa sản phẩm
    public function delete($id) {
        $this->model->deleteProduct($id);
        header('Location: index.php');  // Quay lại danh sách sản phẩm
    }
}
?>
