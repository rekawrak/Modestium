<?php
// Подключение к базе данных
include 'db.php';

// Получение данных из формы
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Шифрование пароля
$club_lvl = "Новичок"; // Уровень клуба по умолчанию
$admin = 0; // 0 означает, что это обычный пользователь

// Подготовка SQL-запроса
$sql = "INSERT INTO users (username, email, password, admin, club_lvl) 
        VALUES ('$username', '$email', '$password', '$admin', '$club_lvl')";

// Выполнение SQL-запроса
if ($conn->query($sql) === TRUE) {
    // Перенаправление на страницу профиля
    header("Location: profile.php");
    exit();
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

// Закрытие подключения
$conn->close();
?>
