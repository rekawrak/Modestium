<?php
// Настройки подключения к базе данных
$servername = "localhost";
$username = "root"; // стандартный пользователь MySQL
$password = "";     // оставьте пустым для XAMPP
$dbname = "modestium_users";

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}
?>
