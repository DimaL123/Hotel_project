<?php
   $conn = new mysqli('localhost', 'root', '', 'hotel');
// �������� �'�������
if ($conn->connect_error) {
    die("������� �'�������: " . $conn->connect_error);
}

    $zapros="DELETE FROM clients WHERE id=".$_GET['id'];
     $conn->query($zapros);
    Header("Location: clients.html");
?>
