<h1>Danh sách Laptop</h1>

<a href="{{ route('laptops.create') }}">Thêm Laptop Mới</a>

<table border="1">
    <thead>
        <tr>
            <th>#</th>
            <th>Hãng</th>
            <th>Model</th>
            <th>Thông số kỹ thuật</th>
            <th>Trạng thái</th>
            <th>Người thuê</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($laptops as $laptop)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $laptop->brand }}</td>
            <td>{{ $laptop->model }}</td>
            <td>{{ $laptop->specifications }}</td>
            <td>{{ $laptop->rental_status ? 'Đang thuê' : 'Chưa thuê' }}</td>
            <td>{{ $laptop->renter->name ?? 'Không có' }}</td>
            <td>
                <a href="{{ route('laptops.edit', $laptop) }}">Sửa</a>
                <form action="{{ route('laptops.destroy', $laptop) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>