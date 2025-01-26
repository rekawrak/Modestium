<?php
session_start();

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['username'])) {
    http_response_code(401); // Неавторизованный доступ
    exit();
}

// Подключаемся к базе данных
$host = 'localhost'; // Ваш хост базы данных
$dbname = 'modestium_users'; // Имя базы данных
$user = 'root'; // Имя пользователя базы данных
$password = ''; // Пароль для базы данных

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Удаляем пользователя из таблицы `users`
    $username = $_SESSION['username'];
    $stmt = $pdo->prepare("DELETE FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);

    if ($stmt->execute()) {
        // Успешное удаление
        session_destroy(); // Завершаем сессию
        http_response_code(200); // Успех
        exit();
    } else {
        // Ошибка при выполнении запроса
        http_response_code(500);
        exit();
    }
} catch (PDOException $e) {
    // Логируем ошибку для отладки
    error_log("Ошибка базы данных: " . $e->getMessage());
    http_response_code(500); // Ошибка сервера
    exit();
}
?>
