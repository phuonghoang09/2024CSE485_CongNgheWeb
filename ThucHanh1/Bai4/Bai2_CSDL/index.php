<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tải lên file và Hiển thị CSDL</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Tải lên file Quiz</h1>

        <!-- Form Upload -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="quizFile" class="form-label">Chọn file Quiz (TXT):</label>
                <input type="file" name="quizFile" id="quizFile" class="form-control" required>
            </div>
            <button type="submit" name="upload" class="btn btn-primary">Tải lên</button>
        </form>

        <hr>

        <?php
        // Kết nối cơ sở dữ liệu
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "quizz_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        $fileUploaded = false; // Biến kiểm tra trạng thái upload

        // Xử lý upload file
        if (isset($_POST['upload'])) {
            if ($_FILES['quizFile']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['quizFile']['tmp_name'];
                $fileContent = file($fileTmpPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

                // Xóa dữ liệu cũ trong bảng
                $conn->query("TRUNCATE TABLE quizz_question");

                $currentQuestion = "";
                $optionA = $optionB = $optionC = $optionD = "";
                $answer = "";

                foreach ($fileContent as $line) {
                    if (strpos($line, "ANSWER:") === 0) {
                        // Lấy đáp án
                        $answer = trim(str_replace("ANSWER:", "", $line));

                        // Chèn vào CSDL
                        $sql = "INSERT INTO quizz_question (question, option_a, option_b, option_c, option_d, answer) 
                                VALUES (?, ?, ?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ssssss", $currentQuestion, $optionA, $optionB, $optionC, $optionD, $answer);
                        $stmt->execute();

                        // Reset
                        $currentQuestion = "";
                        $optionA = $optionB = $optionC = $optionD = "";
                    } elseif (preg_match('/^A\./', $line)) {
                        // Đây là tùy chọn A
                        $optionA = trim(substr($line, 2));
                    } elseif (preg_match('/^B\./', $line)) {
                        // Đây là tùy chọn B
                        $optionB = trim(substr($line, 2));
                    } elseif (preg_match('/^C\./', $line)) {
                        // Đây là tùy chọn C
                        $optionC = trim(substr($line, 2));
                    } elseif (preg_match('/^D\./', $line)) {
                        // Đây là tùy chọn D
                        $optionD = trim(substr($line, 2));
                    } else {
                        // Đây là câu hỏi
                        $currentQuestion .= $line . " ";
                    }
                }

                $fileUploaded = true; // Cập nhật trạng thái upload thành công
                echo '<div class="alert alert-success">Upload file và lưu vào CSDL thành công!</div>';
            } else {
                echo '<div class="alert alert-danger">Có lỗi xảy ra khi upload file!</div>';
            }
        }

        // Hiển thị dữ liệu từ CSDL
        if ($fileUploaded) {
            $sql = "SELECT * FROM quizz_question";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<h2 class="text-center mt-4">Danh Sách Câu Hỏi</h2>';
                echo '<table class="table table-bordered mt-3">';
                echo '<thead>';
                echo '<tr><th>#</th><th>Câu Hỏi</th><th>Lựa chọn A</th><th>Lựa chọn B</th><th>Lựa chọn C</th><th>Lựa chọn D</th><th>Đáp Án Đúng</th></tr>';
                echo '</thead>';
                echo '<tbody>';
                $index = 1;
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $index++ . '</td>';
                    echo '<td>' . htmlspecialchars($row['question']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['option_a']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['option_b']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['option_c']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['option_d']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['answer']) . '</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<div class="alert alert-warning">Chưa có dữ liệu trong CSDL.</div>';
            }
        } else {
            // Chưa upload file, hiển thị thông báo
            echo '<div class="alert alert-warning text-center">Chưa có dữ liệu.</div>';
        }

        $conn->close();
        ?>
    </div>
</body>

</html>