<?php
session_start(); // Старт сессии для работы с авторизацией

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['username'])) {
    header("Location: regestration.html"); // Если не авторизован, перенаправляем на страницу входа
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
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="styles/profile.css">
</head>
<body>
    <img src="static/Modestium Motors.png" alt="Image Description" class="photo">
    <div class="header">
        <h1>Личный кабинет</h1>
    </div>
    <div class="FIO">
        <h1>Рады снова вас видеть, <?php echo htmlspecialchars($username); ?></h1>
    </div>
    <button class="urcars" id="redirectButton">Ваши автомобили</button>

<script>
document.getElementById("redirectButton").onclick = function() {
    window.location.href = "urcars.html";
};
</script>
    <button class="lizing">Лизинг</button>
    <button class="personal">Персональные привилегии</button>
    <button class="exit" onclick="logout()">Выход</button>
    <button class="support">Поддержка</button>
    <button class="delet" onclick="deleteProfile()">Удалить профиль</button>
    <div class="footer">
        <div class="information">
            <h4>Информация</h4>
            <a class="Main" href="sait.html">Главная</a>
            <a href="#" class="Coll">Коллекция</a>
            <a onclick="scrollToSection();" class="Cont">Контакты</a>
            <a href="#" class="Prof">Профиль</a>
        </div>
        <script>
            function scrollToSection() {
                window.location.href = 'sait.html#contactForm';
            }

            // Реализация выхода
            function logout() {
                window.location.href = 'logout.php';
            }

            // Реализация удаления профиля
            function deleteProfile() {
                const confirmation = confirm("Вы уверены, что хотите удалить профиль? Это действие необратимо.");
                if (confirmation) {
                    // Отправляем запрос на сервер для удаления профиля
                    fetch('delete_profile.php', { method: 'POST' })
                        .then(response => {
                            if (response.ok) {
                                // Успешно удалено, перенаправляем на страницу авторизации
                                alert("Ваш профиль успешно удалён.");
                                window.location.href = 'regestration.html';
                            } else {
                                alert("Ошибка при удалении профиля. Попробуйте снова.");
                            }
                        })
                        .catch(error => {
                            console.error('Ошибка:', error);
                            alert("Произошла ошибка. Пожалуйста, попробуйте позже.");
                        });
                }
            }
        </script>
        <div class="Contact">
            <h4>Контакты</h4>
            <a class="Location">
                <p><img src="static/Vector.png" alt="Иконка карты" width="10" height="=10">
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
