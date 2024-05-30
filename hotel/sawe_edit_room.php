<?php
$conn = new mysqli('localhost', 'root', '', 'hotel');
// Перевірка з'єднання
if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
}
$id=$_POST['id'];
$name=$_POST['name'];
$prise=$_POST['prise'];
$kol=$_POST['kol'];
$info=$_POST['info'];

$sale=$_POST['sale'];
$date1=$_POST['start'];
$date2=$_POST['end'];
$persent=$_POST['persent'];


if ($sale!=1)
{
    $sale=0;
    $date1=NULL;
    $date2=NULL;
}



$update="name='{$name}'";
if(!empty($_FILES['photo']['tmp_name']))
{
    $img=addslashes(file_get_contents($_FILES['photo']['tmp_name']));
    $update.=", photo='{$img}'";
}

$update.=", prise='{$prise}', kol='{$kol}', info='{$info}' , sale='{$sale}', start='{$date1}', end='{$date2}', persent='{$persent}'";
// echo  $update;


$zapros="UPDATE rooms SET {$update} WHERE id=".$_POST['id'];



$conn->query($zapros);
$id1=$_POST['id1'];
$id2=$_POST['id2'];
$id3=$_POST['id3'];

if(!empty($_FILES['photo1']['tmp_name']))
{
    $img1=addslashes(file_get_contents($_FILES['photo1']['tmp_name']));
    $conn->query("UPDATE hotel.photo SET r_photo='{$img1}' WHERE photo.id='{$id1}'");
}
if(!empty($_FILES['photo2']['tmp_name']))
{
    $img2=addslashes(file_get_contents($_FILES['photo2']['tmp_name']));
    $conn->query("UPDATE hotel.photo SET r_photo='{$img2}' WHERE photo.id='{$id2}'");
}
if(!empty($_FILES['photo3']['tmp_name']))
{
    $img3=addslashes(file_get_contents($_FILES['photo3']['tmp_name']));
    $conn->query("UPDATE hotel.photo SET r_photo='{$img3}' WHERE photo.id='{$id3}'");
}
Header ("Location: edit_rooms.html");
?>




