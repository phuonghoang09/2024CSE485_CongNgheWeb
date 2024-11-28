<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài thi trắc nghiệm</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
    <script src="./bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Bài thi trắc nghiệm</h1>

        <form action="./checkAnswer.php" method="post">
            <?php
            // Đường dẫn tới file TXT
            $filePath = "./Quiz.txt"; // Đổi tên file nếu cần

            if (file_exists($filePath)) {
                // Đọc file và phân tách nội dung
                $content = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                $currentQuestion = "";
                $currentOptions = [];
                $questionIndex = 0; // Biến đếm câu hỏi

                foreach ($content as $line) {
                    if (strpos($line, "ANSWER:") === 0) {
                        // Đây là câu trả lời đúng (ẩn không hiển thị)
                        $answer = trim(str_replace("ANSWER:", "", $line));

                        // Lưu câu trả lời đúng dưới dạng input ẩn
                        echo '<input type="hidden" name="answers[' . $questionIndex . ']" value="' . htmlspecialchars($answer) . '">';

                        // Hiển thị câu hỏi và các tùy chọn
                        echo '<div class="card mb-3">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . htmlspecialchars($currentQuestion) . '</h5>';
                        echo '<ul class="list-group mb-3">';

                        foreach ($currentOptions as $key => $option) {
                            $optionLetter = chr(65 + $key); // A, B, C, D
                            echo '<li class="list-group-item">';
                            echo '<input type="checkbox" name="userAnswers[' . $questionIndex . '][]" value="' . $optionLetter . '"> ';
                            echo htmlspecialchars($option);
                            echo '</li>';
                        }
                        echo '</ul>';
                        echo '</div>';
                        echo '</div>';

                        // Reset cho câu hỏi tiếp theo
                        $currentQuestion = "";
                        $currentOptions = [];
                        $questionIndex++;
                    } elseif (preg_match('/^[A-D]\./', $line)) {
                        // Đây là một tùy chọn (A, B, C, D)
                        $currentOptions[] = $line;
                    } else {
                        // Đây là câu hỏi
                        $currentQuestion .= $line . " ";
                    }
                }
            } else {
                echo '<div class="alert alert-danger text-center" role="alert">Không tìm thấy file câu hỏi!</div>';
            }
            ?>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Nộp Bài</button>
            </div>
        </form>
    </div>
</body>

</html>