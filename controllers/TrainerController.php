<?php

    function showHome() {
        require_once __DIR__ . '/../views/home.php';
    }

    function showTrainer() {
        require_once __DIR__ . '/../models/TextModel.php';

        $text = TextModel::getRandomText();
        require_once __DIR__ . '/../views/trainer.php';
    }

?>