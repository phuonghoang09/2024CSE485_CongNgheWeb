<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tài khoản</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
    <script src="./bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Danh sách tài khoản</h1>

        <?php
        $csvFile = './KTPM3_Danh_sach_diem_danh.csv';

        // Kiểm tra file có tồn tại không
        if (file_exists($csvFile)) {
            echo '<div class="table-responsive">';
            echo '<table class="table table-bordered table-striped table-hover">';
            echo '<thead class="table-dark">
                    <tr>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>City</th>
                        <th>Email</th>
                        <th>Course</th>
                    </tr>
                  </thead>';
            echo '<tbody>';

            // Mở file và đọc nội dung
            $file = fopen($csvFile, 'r');

            // Bỏ qua dòng tiêu đề
            fgetcsv($file);

            // Đọc từng dòng
            while (($line = fgetcsv($file)) !== false) {
                echo '<tr>';
                foreach ($line as $cell) {
                    echo '<td>' . htmlspecialchars($cell) . '</td>';
                }
                echo '</tr>';
            }

            fclose($file);
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        } else {
            echo '<div class="alert alert-danger text-center" role="alert">
                    File CSV không tồn tại.
                  </div>';
        }
        ?>
    </div>
</body>


</html>