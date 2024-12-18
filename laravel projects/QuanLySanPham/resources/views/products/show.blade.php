<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <!-- Thêm Bootstrap CDN nếu chưa có -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1>Chi tiết sản phẩm</h1>

        <!-- Hiển thị thông báo thành công -->
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text"><strong>Mô tả:</strong> {{ $product->description }}</p>
                <p class="card-text"><strong>Giá:</strong> {{ number_format($product->price, 2) }} VND</p>

                <!-- Hiển thị hình ảnh -->
                @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="max-width: 300px;">
                @else
                <p>Không có hình ảnh</p>
                @endif
            </div>
        </div>

        <!-- Các nút hành động -->
        <div class="mt-3">
            <a href="{{ route('products.index') }}" class="btn btn-primary">Quay lại danh sách</a>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Sửa</a>

            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</button>
            </form>
        </div>
    </div>

    <!-- Thêm Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>