<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Danh sách sản phẩm</h1>

        <!-- Hiển thị thông báo (nếu có) -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- Nút thêm sản phẩm -->
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm Sản phẩm mới</a>
        </div>

        <!-- Bảng hiển thị sản phẩm -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Tên sản phẩm</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th>Hình ảnh</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td> <!-- Hiển thị số thứ tự -->
                    <td>{{ $product->name }}</td> <!-- Hiển thị tên sản phẩm -->
                    <td>{{ $product->description }}</td> <!-- Hiển thị mô tả -->
                    <td>{{ number_format($product->price, 2) }} VND</td> <!-- Hiển thị giá sản phẩm -->
                    <td>
                        @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" style="max-width: 100px;">
                        @else
                        <span class="text-muted">Không có ảnh</span>
                        @endif
                    </td> <!-- Hiển thị hình ảnh -->
                    <td>
                        <!-- Nhóm các nút hành động với class btn-group -->
                        <div class="btn-group" role="group">
                            <!-- Link xem chi tiết -->
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">Xem</a>

                            <!-- Link chỉnh sửa -->
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-secondary btn-sm">Sửa</a>

                            <!-- Form xóa -->
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Phân trang -->
        <div class="d-flex justify-content-center">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <!-- Link Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>