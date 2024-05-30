<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"  type="text/css" href="css/edit_client.css" />
</head>
<body>
<div class="main">
    <div class="meny">
        <object data="head2.html" ></object>
    </div>
        <div class="info2">

<?php

$conn = new mysqli('localhost', 'root', '', 'hotel');
// Перевірка з'єднання
if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
}
$rows= $conn->query("SELECT * FROM clients WHERE id=".$_GET['id']);

    $stroka =$rows->fetch_assoc();

?>

<form action="sawe_edit_client.php" method="POST" enctype="multipart/form-data">

<label>Номер</label>
<select name="nomer" size="1" >
<?php 
    $result= $conn->query("SELECT DISTINCT id FROM rooms");
while($row = $result->fetch_assoc()) {
    $result2= $conn->query("SELECT name FROM rooms WHERE id={$row['id']}");
    $row2=$result2->fetch_assoc();
    if($stroka['id_room']==$row['id'])
    {
        echo"<option selected='selected' value='{$row['id']}'>".$row2['name']."</option> ";
    }
    else
    {
        echo"<option value='{$row['id']}'>".$row2['name']."</option> ";
    }



}
    $id=$_GET['id']



?>

</select> <br><br>






<label>Ім'я</label> <input  name="name" value="<?php  echo $stroka['cl_name']; ?>"  /><br><br>
<label>Номер телефону</label> <input name="phone" value="<?php  echo $stroka['cl_phone']; ?>" /><br><br>
<label>Дата заїзду</label> <input type="date" name="start" value="<?php echo $stroka['date1']; ?>" /><br><br>
<label>Дата виїзду</label> <input type="date" name="end" value="<?php echo $stroka['date2']; ?>" /><br><br>
<label>Підтвердження замовлення</label> <input type="checkbox" name="confirm"  value="1" <?php if ($stroka['confirm'] == 1) echo "checked"; ?> " /><br><br>


 <input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="submit" value="Зберегти"><br><br>

</form>
 </div>
</div></body>
</html>




