<?php
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    // Обработка маршрутов
    switch ($uri) {
        case '/':
        case '/home':
            require_once __DIR__ . '/../controllers/TrainerController.php';
            showHome();
            break;

        case '/trainer':
            require_once __DIR__ . '/../controllers/TrainerController.php';
            showTrainer();
            break;
        
        case '/login':
            require_once __DIR__ . '/../controllers/TrainerController.php';
            showLogin();
            break;
        
        case '/result':
            require_once __DIR__ . '/../controllers/TrainerController.php';
            showResult();
            break;

        // case '/history':
        //     require_once __DIR__ . '/../controllers/TrainerController.php';
        //     showHistory();
        //     break;

        default:
            http_response_code(404);
            echo "404 Not Found";
    }
?>