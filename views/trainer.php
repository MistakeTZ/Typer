<?php include 'layout.php'; 
    if (!function_exists('mb_str_split')) {
        function mb_str_split($string) {
            return preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY);
        }
    }

    $typing = trim(htmlspecialchars($text['text']));
    $textArray = array_map('mb_str_split', explode(' ', $typing));
?>

<script>
    const originalText = <?= json_encode($textArray, JSON_UNESCAPED_UNICODE) ?>;
</script>

<div class="container">
    <h2>Тренировка</h2>

    <?php if (isset($text)): ?>
        <div class="text" id="textarea"><span id="caret"></span><?php
            $words = explode(' ', $typing);

            for ($i = 0; $i < count($words); $i++) {
                $word = $words[$i];
                $new_word = '<span class="word">';

                for($j = 0; $j < strlen($word); $j++) {
                    $new_word = $new_word . '<span class="letter">' . $word[$j] . '</span>';
                }

                $new_word = $new_word . '</span>';
                $words[$i] = $new_word;
            }
            $typing = implode(' ', $words);
            echo($typing);
            ?></div>
    <?php else: ?>
        <p>Не удалось загрузить текст для тренировки.</p>
    <?php endif; ?>
</div>

<form id="resultForm" action="/result" method="POST" style="display: none;">
  <input type="hidden" name="time" id="time">
  <input type="hidden" name="correct" id="correct">
  <input type="hidden" name="incorrect" id="incorrect">
  <input type="hidden" name="text" value=<?= $text['id'] ?>>
  <input type="hidden" name="words" value="<?= count($words) ?>">
</form>

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
        margin-top: 100px;
        margin-bottom: 20px;
        white-space: pre-wrap;
        word-wrap: break-word;
        color: gray;
    }

    .word {
        word-break: keep-all;
        overflow-wrap: normal;
        white-space: nowrap;
    }

    .correct {
        color: black;
    }

    .incorrect {
        color: red;
    }

    #caret {
        width: 2px;
        vertical-align: bottom;
        height: 1em;
        background-color: black;
        display: inline-block;
        margin-left: 1px;
        margin-bottom: 8px;
        animation: blink 1s step-start infinite;
    }

    @keyframes blink {
        50% {
            opacity: 0.5;
        }
    }
</style>

<?php include 'footer.php'; ?>