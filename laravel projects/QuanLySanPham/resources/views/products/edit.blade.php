<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Sửa sản phẩm</h1>

        <!-- Hiển thị lỗi (nếu có) -->
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form chỉnh sửa sản phẩm -->
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Giá</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh</label>
                <input type="file" name="image" id="image" class="form-control">
                @if($product->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="max-width: 100px;">
                    <p class="text-muted">Hình ảnh hiện tại</p>
                </div>
                @endif
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại</a>
                <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
            </div>
        </form>
    </div>

    <!-- Link Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>