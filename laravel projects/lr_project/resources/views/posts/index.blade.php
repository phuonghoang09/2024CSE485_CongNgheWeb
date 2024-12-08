<table border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Body</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $index => $post)
        <tr>
            <td>{{ $index + 1 }}</td> <!-- Hiển thị số thứ tự -->
            <td>{{ $post->title }}</td> <!-- Hiển thị tiêu đề -->
            <td>{{ $post->body }}</td> <!-- Hiển thị nội dung -->
        </tr>
        @endforeach
    </tbody>
</table>