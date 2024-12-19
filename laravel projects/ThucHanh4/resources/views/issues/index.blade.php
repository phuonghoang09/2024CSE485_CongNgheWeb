<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sự Cố</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Danh sách Sự Cố</h1>

        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('issues.create') }}" class="btn btn-primary">Thêm Sự Cố Mới</a>
        </div>

        <div class="table-responsive">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Mã vấn đề</th>
                        <th>Tên Máy Tính</th>
                        <th>Tên Phiên Bản</th>
                        <th>Người Báo Cáo</th>
                        <th>Ngày Báo Cáo</th>
                        <th>Mức Độ</th>
                        <th>Trạng Thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($issues as $issue)
                    <tr>
                        <td>{{ $issue->id }}</td>
                        <td>{{ $issue->computer->computer_name }}</td>
                        <td>{{ $issue->computer->model }}</td>
                        <td>{{ $issue->reported_by }}</td>
                        <td>{{ $issue->reported_date }}</td>
                        <td>{{ ucfirst($issue->urgency) }}</td>
                        <td>{{ ucfirst($issue->status) }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('issues.edit', $issue) }}" class="btn btn-sm btn-secondary">Sửa</a>
                                <form action="{{ route('issues.destroy', $issue) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-secondary">Xóa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Hiển thị liên kết phân trang -->
            <div class="d-flex justify-content-center mt-4">
                <div>
                    {{ $issues->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>