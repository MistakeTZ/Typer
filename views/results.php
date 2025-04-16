<?php include 'layout.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Получаем данные из POST-запроса
        $time = $_POST['time'];
        $textId = $_POST['text'];
        $words = $_POST['words'];
        $correct = $_POST['correct'];
        $incorrect = $_POST['incorrect'];

        require_once __DIR__ . '/../models/TextModel.php';
        $text = TextModel::getText($textId);

        $errors = $text["length"] - $words - $correct;
        $speed = ($words + $correct + $incorrect) / $time / 5 * 60;

        session_start();
        if (isset($_SESSION['user'])) {
            require_once __DIR__ . '/../models/ResultModel.php';
            ResultModel::saveResult($_SESSION['user'], $textId, $time, $speed, $errors, $text["length"]);
        }
    }
    else {
        header('Location: /trainer');
    }
?>

<div class="container">
    <div class="results-box">
        <h2>Результаты тренировки</h2>

        <div class="stat">⏱ Время: <strong><?= round($time) ?> сек</strong></div>
        <div class="stat">📖 Скорость: <strong><?= round($speed) ?></strong> слов в минуту</div>
        <div class="stat">📝 Длина текста: <strong><?= htmlspecialchars($text["length"]) ?></strong></div>
        <div class="stat">❌ Ошибок: <strong><?= htmlspecialchars($errors) ?></strong></div>

        <div class="buttons">
            <a class="btn btn-primary" href="/trainer">Новая тренировка</a>
            <a class="btn btn-secondary" href="/history">История тренировок</a>
        </div>
    </div>
</div>

<style>
    .container {
        max-width: 600px;
        margin: 100px auto;
        text-align: center;
    }

    .results-box {
        background: white;
        display: inline-block;
        padding: 30px 50px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    .results-box h2 {
        margin-bottom: 20px;
    }

    .results-box .stat {
        margin: 10px 0;
        font-size: 1.2em;
    }
</style>

<?php include 'footer.php' ?>