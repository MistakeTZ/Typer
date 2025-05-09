<?php
    require_once __DIR__ . '/../core/Database.php';

    class UserModel {
        public static function addUser($username, $password) {
            $db = Database::getConnection();
            $pass_hash = password_hash($password, PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO users (username, pass_hash)
                    VALUES ('$username', '$pass_hash')";

            mysqli_query($db, $sql);
            return mysqli_insert_id($db);
        }

        public static function checkHash($username, $password) {
            $db = Database::getConnection();

            $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
            $result = mysqli_query($db, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                if (password_verify($password, $row['pass_hash'])) {
                    return $row['id'];
                }
            }
            return false;
        }

        public static function getUsername($userID) {
            $db = Database::getConnection();
            $sql = "SELECT username FROM users WHERE id = $userID LIMIT 1";
            $result = mysqli_query($db, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                return $row['username'];
            }
            return false;
        }

        public static function getHistory($userID, $offset = 0, $limit = 100) {
            $db = Database::getConnection();
            $sql = "SELECT * FROM history
                    WHERE user = $userID
                    ORDER BY time DESC
                    LIMIT $offset, $limit";
            
            $result = mysqli_query($db, $sql);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    }
?>