<?php

    function showHome() {
        require_once __DIR__ . '/../views/home.php';
    }

    function showTrainer() {
        require_once __DIR__ . '/../models/TextModel.php';

        // $text = [
        //     "text" => "So can you realy be sure that everyone can be except, that I found all theese stuff here?"
        // ];
        $text = TextModel::getRandomText();
        require_once __DIR__ . '/../views/trainer.php';
    }

    function showLogin() {
        require_once __DIR__ . '/../views/login.php';
    }

    function showResult() {
        require_once __DIR__ . '/../views/results.php';
    }

?>