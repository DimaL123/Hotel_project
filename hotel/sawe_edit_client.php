<?php
$conn = new mysqli('localhost', 'root', '', 'hotel');
// Перевірка з'єднання
if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
}

$id_room=$_POST['nomer'];
$client_name=$_POST['name'];
$client_phone=$_POST['phone'];

$client_date1=$_POST['start'];
$client_date2=$_POST['end'];
$confirm=$_POST['confirm'];

 if ($confirm!=1)
{
    $confirm=0;

}

 $update="id_room='{$id_room}', cl_name='{$client_name}', cl_phone='{$client_phone}', date1='{$client_date1}', date2='{$client_date2}',confirm='{$confirm}'";
//echo  $_POST['id'];

 //echo $update    ;
$zapros="UPDATE clients SET {$update} WHERE id=".$_POST['id'];



$conn->query($zapros);

Header ("Location: clients.html");
?>




