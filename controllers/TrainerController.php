<?php

    function showHome() {
        require_once __DIR__ . '/../views/home.php';
    }

    function showTrainer() {
        require_once __DIR__ . '/../models/TextModel.php';

        $text = [
            "text" => "eiruyjkh sjhfulsehrg iuludfhgiulserygiuhfhguletiueriu yyeiru yeirugy iueufgh kludfh ;dgiu eyt kjjh"
        ];
        // $text = TextModel::getRandomText();
        require_once __DIR__ . '/../views/trainer.php';
    }

    function showLogin() {
        require_once __DIR__ . '/../views/login.php';
    }

?>