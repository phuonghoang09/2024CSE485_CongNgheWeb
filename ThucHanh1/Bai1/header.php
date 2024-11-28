<?php
$currentPage = basename($_SERVER['SCRIPT_NAME']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <style>
        .header-container {
            height: 80px;
            border: 1px solid #ccc;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .navbar {
            height: 100%;
        }

        @media (max-width: 991.98px) {
            .navbar-nav {
                flex-direction: column;
                align-items: flex-start;
                width: 100%;
            }

            .navbar-collapse {
                background-color: #343a40;
                padding: 10px 0;
            }

            .navbar-nav .nav-link {
                color: #fff;
            }
        }
    </style>
</head>

<body>
    <header class="header-container">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand fw-bold" href="#">THẾ GIỚI HOA</a>
                <!-- Toggler for mobile view -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Menu items -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-3">
                        <li class="nav-item">
                            <a class="nav-link <?php echo $currentPage == 'index.php' ? 'fw-bold' : ''; ?>" href="./index.php">Trang khách</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $currentPage == 'trang_quan_tri.php' ? 'fw-bold' : ''; ?>" href="./trang_quan_tri.php">Trang quản trị</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>