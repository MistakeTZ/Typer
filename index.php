<?php
    // Включаем отображение ошибок (для разработки)
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Подключаем автозагрузку классов и маршруты
    require_once __DIR__ . '/core/Database.php';
    require_once __DIR__ . '/routes/web.php';

?>