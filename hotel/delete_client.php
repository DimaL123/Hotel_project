<?php
   $conn = new mysqli('localhost', 'root', '', 'hotel');
// Перевірка з'єднання
if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
}

    $zapros="DELETE FROM clients WHERE id=".$_GET['id'];
     $conn->query($zapros);
    Header("Location: clients.html");
?>
