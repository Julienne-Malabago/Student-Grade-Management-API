<?php
$mysqli = new mysqli("localhost", "root", "", "student_grade_api");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} else {
    echo "Database connected successfully!";
}
?>