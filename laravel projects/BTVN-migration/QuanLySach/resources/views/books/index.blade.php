<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sách</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .success {
            color: green;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h1>Danh sách Sách</h1>

    @if (session('success'))
    <p class="success">{{ session('success') }}</p>
    @endif

    <a href="{{ route('books.create') }}">Thêm Sách Mới</a>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Tiêu đề</th>
                <th>Tác giả</th>
                <th>Năm xuất bản</th>
                <th>Thể loại</th>
                <th>Thư viện</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->publication_year }}</td>
                <td>{{ $book->genre }}</td>
                <td>{{ $book->library->name }}</td>
                <td class="actions">
                    <a href="{{ route('books.edit', $book) }}">Sửa</a>
                    <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>