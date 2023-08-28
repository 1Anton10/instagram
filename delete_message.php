<?php
require_once "connect.php";
// Получаем ID сообщения из POST-параметров
$messageId = $_POST['id'];

// Подключаемся к базе данных и удаляем сообщение
global $pdo;
$statement = $pdo->prepare("DELETE FROM messages WHERE id = ?");
$statement->execute([$messageId]);
?>