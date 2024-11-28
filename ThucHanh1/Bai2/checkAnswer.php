<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Quả</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Kết Quả Bài Thi</h1>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correctAnswers = $_POST['answers'] ?? []; // Đáp án đúng từ input ẩn
            $userAnswers = $_POST['userAnswers'] ?? []; // Đáp án người dùng chọn

            $totalQuestions = count($correctAnswers);
            $correctCount = 0;

            echo '<div class="list-group">';
            foreach ($correctAnswers as $index => $correctAnswer) {
                $userAnswer = $userAnswers[$index] ?? [];
                $userAnswerString = implode('', $userAnswer); // Kết hợp các lựa chọn người dùng

                $isCorrect = ($userAnswerString === $correctAnswer);

                echo '<div class="list-group-item">';
                echo '<p><strong>Câu ' . ($index + 1) . ':</strong></p>';
                echo '<p><strong>Đáp án của bạn:</strong> ' . htmlspecialchars($userAnswerString) . '</p>';
                echo '<p><strong>Đáp án đúng:</strong> ' . htmlspecialchars($correctAnswer) . '</p>';
                echo '<p><strong>Kết quả:</strong> ' . ($isCorrect ? '<span class="text-success">Đúng</span>' : '<span class="text-danger">Sai</span>') . '</p>';
                echo '</div>';

                if ($isCorrect) {
                    $correctCount++;
                }
            }
            echo '</div>';

            echo '<div class="alert alert-info text-center mt-4">';
            echo '<strong>Bạn trả lời đúng ' . $correctCount . '/' . $totalQuestions . ' câu hỏi.</strong>';
            echo '</div>';
        } else {
            echo '<div class="alert alert-danger text-center" role="alert">Dữ liệu không hợp lệ!</div>';
        }
        ?>
    </div>
</body>

</html>