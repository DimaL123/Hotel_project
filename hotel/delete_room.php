<?php
   $conn = new mysqli('localhost', 'root', '', 'hotel');
// �������� �'�������
if ($conn->connect_error) {
    die("������� �'�������: " . $conn->connect_error);
}

    $zapros = "DELETE rooms, photo FROM rooms
    LEFT JOIN photo ON rooms.id = photo.room_id
    WHERE rooms.id=" . $_GET['id'];

    $conn->query($zapros);
    Header("Location: edit_rooms.html");
?>
