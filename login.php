<?php
// Подключение к базе данных
include 'db.php';

session_start(); // Старт сессии

// Получение данных из формы
$email = $_POST['email'];
$password = $_POST['password'];

// Поиск пользователя в базе данных
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

$response = [];

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Проверка пароля
    if (password_verify($password, $row['password'])) {
        // Установка переменных в сессии
        $_SESSION['username'] = $row['username'];
        $_SESSION['admin'] = $row['admin']; // Сохраняем статус администратора (1 или 0)

        // Логика перенаправления
        $response['success'] = true;
        $response['redirect'] = ($row['admin'] == 1) ? 'admin.php' : 'profile.php';
    } else {
        // Неправильный пароль
        $response['success'] = false;
        $response['message'] = 'Неправильный пароль.';
    }
} else {
    // Пользователь не найден
    $response['success'] = false;
    $response['message'] = 'Пользователь с таким email не найден.';
}

// Закрытие подключения
$conn->close();

// Отправка ответа в формате JSON
echo json_encode($response);
?>
