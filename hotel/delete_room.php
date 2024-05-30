<?php
   $conn = new mysqli('localhost', 'root', '', 'hotel');
// Перевірка з'єднання
if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
}

    $zapros = "DELETE rooms, photo FROM rooms
    LEFT JOIN photo ON rooms.id = photo.room_id
    WHERE rooms.id=" . $_GET['id'];

    $conn->query($zapros);
    Header("Location: edit_rooms.html");
?>
