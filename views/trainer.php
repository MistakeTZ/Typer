<?php include 'layout.php'; ?>

<div class="container">
    <h2>Тренировка</h2>

    <?php if (isset($text)): ?>
        <div class="text"><?php
            echo(trim(htmlspecialchars($text['text'])));
            ?></div>
    <?php else: ?>
        <p>Не удалось загрузить текст для тренировки.</p>
    <?php endif; ?>
</div>

<script src="/assets/js/trainer.js"></script>

<style>
    .container {
        width: 100%;
        margin: 100px auto;
        text-align: center;
        font-family: Arial, sans-serif;
    }

    .text {
        font-family: 'DM Mono', monospace;
        width: 80%;
        min-width: 300px;
        max-width: 1000px;
        margin: 0 auto;
        font-size: 32px;
        margin-top: 20px;
        margin-bottom: 20px;
        white-space: pre-wrap;
        word-wrap: break-word;
    }
</style>

<?php include 'footer.php'; ?>