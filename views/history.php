<?php
    include 'layout.php';

    session_start();
    
    if (isset($_SESSION['user'])) {
        require_once __DIR__ . '/../models/UserModel.php';
        $history = UserModel::getHistory($_SESSION['user']);
    }
    else {
        $history = [];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    }
?>

<div class="container">
    <h1>История тренировок</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Дата</th>
                <th>Скорость</th>
                <th>Длина текста</th>
                <th>Ошибок</th>
                <th>Время набора</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($history as $item): ?>
                <tr>
                    <td><?= $item['date'] ?></td>
                    <td><?= round($item['speed']) ?> слов в минуту</td>
                    <td><?= $item['length'] ?></td>
                    <td><?= $item['errors'] ?></td>
                    <td><?= round($item['time']) ?> сек</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>
    h1 {
        text-align: center;
        margin-bottom: 40px;
    }
    
    .container {
        margin-top: 50px;
    }
</style>

<?php include 'footer.php' ?>