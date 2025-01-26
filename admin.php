<?php
session_start(); // Старт сессии для работы с авторизацией

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['username'])) {
    header("Location: regestration.html"); // Если не авторизован, перенаправляем на страницу входа
    exit();
}

// Дополнительная проверка, является ли пользователь администратором
if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
    header("Location: profile.php"); // Если не администратор, перенаправляем в личный кабинет
    exit();
}

// Получаем имя пользователя из сессии
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Администрирование</title>
    <link rel="stylesheet" href="styles/admin.css">
</head>
<body>
    <img src="static/Modestium Motors.png" alt="Image Description" class="photo">
    <div class="header">
        <h1>Администрирование</h1>
    </div>
    <div class="FIO">
        <h1>Добро пожаловать в панель управления!</h1>
    </div>
    <button class="urcars" id="redirectButton">Контроль транспорта</button>
    <script>
        document.getElementById("redirectButton").onclick = function() {
            window.location.href = "contrcar.html";
        };
    </script>
    <button class="lizing" id="Client">База данных клиентов</button>
    <script>
        document.getElementById("Client").onclick = function() {
            window.location.href = "client.html";
        };
    </script>
    <button class="personal">Сообщения</button>
    <button class="exit" onclick="logout()">Выход</button>
    <div class="footer">
        <div class="information">
            <h4>Информация</h4>
            <a class="Main" href="sait.html"> Главная </a>
            <a href="collection.html" class="Coll"> Коллекция </a>
            <a onclick="scrollToSection();" class="Cont">Контакты</a>
            <a href="profile.php" class="Prof">Профиль</a>
        </div>
        <script>
            function scrollToSection() {
                window.location.href = 'sait.html#contactForm';
            }

            // Реализация выхода
            function logout() {
                window.location.href = 'logout.php';
            }
        </script>
       <div class="Contact">
        <h4>Контакты</h4>
        <a class="Location">
            <p> <img src="static/Vector.png" alt="Иконка карты" width="10" height="10">
            Университетский проспект, д. 39,</p> о. Русский, Владивосток, Приморский край, 69009
        </a>
        <a class="Ph">
            <img src="static/Group.png" alt="Иконка телефона" width="10" height="10">
            8 800 263 94 22
        </a>
        <a class="Conta">
            <img src="static/Group1.png" alt="Иконка email" width="10" height="10">
            sales@modestium.com
        </a>
    </div>
    <div class="Social">
        <h4>Мы в соцсетях</h4>
        <a class="X" href="https://x.com/?mx=2">
            <img src="static/Shape.png" alt="Иконка карты" width="30" height="23">
        </a>
        <a class="Facebook" href="https://ja-jp.facebook.com/login/?next=https%3A%2F%2Fja-j">
            <img src="static/facebook.png" alt="Иконка карты" width="15" height="25">
        </a>
    </div>
    </div>
</body>
</html>
