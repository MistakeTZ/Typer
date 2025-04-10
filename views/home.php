<?php include 'layout.php'; ?>

<div class="container">
    <h1>Добро пожаловать в Тренажёр Набора Текста!</h1>
    <p>Проверьте свою скорость и точность набора текста. Практикуйтесь и становитесь быстрее!</p>

    <div class="actions">
        <a href="/trainer" class="btn btn-primary">Начать тренировку</a>
        <a href="/history" class="btn btn-secondary">История тренировок</a>
    </div>
</div>

<style>
    .container {
        max-width: 600px;
        margin: 100px auto;
        text-align: center;
        font-family: Arial, sans-serif;
    }

    .btn {
        display: inline-block;
        margin: 10px;
        padding: 12px 20px;
        font-size: 16px;
        text-decoration: none;
        border-radius: 6px;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
    }

    .btn:hover {
        opacity: 0.9;
    }
</style>

<?php include 'footer.php'; ?>