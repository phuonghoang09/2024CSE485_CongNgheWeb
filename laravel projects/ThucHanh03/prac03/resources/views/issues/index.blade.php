<!-- resources/views/issues/index.blade.php -->

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Các Vấn Đề</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Danh Sách Các Vấn Đề</h1>

        <!-- Nút Thêm Vấn Đề -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addIssueModal">Thêm Vấn Đề</button>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Máy Tính</th>
                    <th>Người Báo Cáo</th>
                    <th>Ngày Báo Cáo</th>
                    <th>Mô Tả Vấn Đề</th>
                    <th>Mức Độ</th>
                    <th>Trạng Thái</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($issues as $issue)
                <tr>
                    <td>{{ $issue->computer_id }}</td>
                    <td>{{ $issue->reported_by }}</td>
                    <td>{{ \Carbon\Carbon::parse($issue->reported_date)->format('d-m-Y H:i') }}</td>
                    <td>{{ $issue->description }}</td>
                    <td>{{ $issue->urgency }}</td>
                    <td>{{ $issue->status }}</td>
                    <td>
                        <!-- Nút Sửa -->
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editIssueModal" data-id="{{ $issue->id }}" data-computer_id="{{ $issue->computer_id }}" data-reported_by="{{ $issue->reported_by }}" data-description="{{ $issue->description }}" data-urgency="{{ $issue->urgency }}" data-status="{{ $issue->status }}">Sửa</button>

                        <!-- Nút Xóa -->
                        <form action="{{ route('issues.destroy', $issue->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>