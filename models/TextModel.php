<?php
    require_once __DIR__ . '/../core/Database.php';

    class TextModel {
        public static function getRandomText() {
            $db = Database::getConnection();
            $sql = "SELECT * FROM texts ORDER BY RAND() LIMIT 1";
            $result = mysqli_query($db, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                return $row;
            }
            else {
                return "";
            }
        }

        public static function getText($textID) {
            $db = Database::getConnection();
            $sql = "SELECT * FROM texts WHERE id = $textID LIMIT 1";
            $result = mysqli_query($db, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                return $row;
            }
            else {
                return "";
            }
        }
    }
?>