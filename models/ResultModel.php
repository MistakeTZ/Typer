<?php
    require_once __DIR__ . '/../core/Database.php';

    class ResultModel {
        public static function saveResult($user, $text, $speed, $errors) {
            $db = Database::getConnection();
            $sql = "INSERT INTO history (user, text, speed, errors)
                    VALUES ($user, $text, $speed, $errors)";

            mysqli_query($db, $sql);
            return mysqli_insert_id($db);
        }

        public static function getHistory($user, $offset = 0, $limit = 100) {
            $db = Database::getConnection();
            $sql = "SELECT * FROM history
                    WHERE user = $user
                    ORDER BY time DESC
                    LIMIT $offset, $limit";
            
            $result = mysqli_query($db, $sql);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    }
?>