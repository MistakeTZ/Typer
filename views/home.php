<?php include 'layout.php'; ?>

<div class="container">
    <h1>Добро пожаловать в Тренажёр набора текста!</h1>
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

    p {
        margin-top: 20px;
        font-size: 18px;
    }
</style>

<?php include 'footer.php'; ?>