<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use Dotenv\Dotenv;

class Database {
    private $conn;

    public function __construct() {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();
    }

    public function connect() {
        $this->conn = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);
        if ($this->conn->connect_error) {
            die("Database connection failed: " . $this->conn->connect_error);
        }
        return $this->conn;
    }
}

echo "Connected to database successfully!";
?>
