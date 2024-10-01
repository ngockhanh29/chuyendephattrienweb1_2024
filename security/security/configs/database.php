<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_PORT', 3306);
define('DB_NAME', 'app_web1');

try {
    $this->db = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}