<?php
$servername = "localhost"; // Обычно localhost для локального сервера
$username = "root"; // Стандартный пользователь MySQL в XAMPP
$password = ""; // Стандартный пароль в XAMPP пустой
$dbname = "modestium_users"; 

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Подключение не удалось: " . $conn->connect_error);
}

// Проверка, что данные формы были отправлены
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $topic = htmlspecialchars($_POST['topic']);
    $message = htmlspecialchars($_POST['message']);

    // Вставка данных в таблицу
    $sql = "INSERT INTO contact_form (name, phone, email, topic, message)
            VALUES ('$name', '$phone', '$email', '$topic', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Сообщение об успешной отправке
        $response = "Сообщение успешно отправлено!";
    } else {
        // Сообщение об ошибке
        $response = "Ошибка: " . $conn->error;
    }

    $conn->close();
} else {
    $response = "Неверный метод запроса.";
}
header('Content-Type: application/json; charset=utf-8');
// Отправляем ответ на клиентскую сторону в виде JSON
echo json_encode(["response" => $response]);
?>