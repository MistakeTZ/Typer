<?php
    class Database {
        private static $conn;

        public static function getConnection() {
            if (!self::$conn) {
                $config = require __DIR__ . '/../config/config.php';

                try {
                    self::$conn = mysqli_connect(
                        $config['db_host'],
                        $config['db_user'],
                        $config['db_pass'],
                        $config['db_name']
                    );
                }
                catch (mysqli_sql_exception $e) {
                    die("Connection failed: " . $e->getMessage());
                }
            }
            return self::$conn;
        }
    }
?>