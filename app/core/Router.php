<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../controllers/StudentController.php';

$database = new Database();
$db = $database->connect();
$controller = new StudentController($db);

header("Content-Type: application/json");
$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents("php://input"), true);
$controller->handleRequest($method, $input);
?>

