<?php
session_start();
session_unset(); // Удаляем все переменные сессии
session_destroy(); // Уничтожаем сессию

// Перенаправляем на страницу авторизации
header("Location: regestration.html");
exit();
?>
