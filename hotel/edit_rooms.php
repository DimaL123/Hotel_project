<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"  type="text/css" href="css/edit_room.css" />
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
$rows= $conn->query("SELECT * FROM rooms WHERE id=".$_GET['id']);

    $stroka =$rows->fetch_assoc();
    $id=$_GET['id'];
    $name=$stroka['name'];
    $show_img = base64_encode($stroka ['photo']);
    $prise=$stroka['prise'];
    $kol=$stroka['kol'];
    $info=$stroka['info'];
    $sale=$stroka['sale'];
    $persent=$stroka['persent'];
    $date1=$stroka['start'];
    $date2=$stroka['end'];
?>

<form action="sawe_edit_room.php" method="POST" enctype="multipart/form-data">

<label>Назва</label><input name="name" value="<?php echo $name; ?>" /><br><br>

<label>Нове зображення</label> <input type="file" name="photo" /><br><br>

<p>Зображення до зміни </p>
<img src=" data:image/jpeg;base64, <?php echo $show_img; ?>" alt="Зоброження немає" width="300"
height="300"><br><br>

<label>Ціна</label> <input name="prise" value="<?php echo $prise; ?>" /><br><br>





<label>Знижка</label> <input type="checkbox" name="sale" value="1"  <?php if ($sale == 1) echo "checked"; ?> /><br><br>
<label>%</label> <input name="persent" value="<?php echo $persent; ?>" /><br><br>
<label>Початок</label> <input type="date" name="start" value="<?php echo $date1; ?>" /><br><br>
<label>кінець</label> <input type="date" name="end" value="<?php echo $date2; ?>" /><br><br>







<label>Кількість кімнат</label> <input name="kol" value="<?php echo $kol; ?>" /><br><br>

<label>Інформація про номер </label><textarea name="info" rows="4" cols="25" ><?php echo $info; ?></textarea><br><br>



<?php

    $rows2= $conn->query("SELECT id, r_photo FROM photo WHERE room_id=".$_GET['id']." AND photo.n_foto='f1'");
    $stroka2=$rows2->fetch_assoc();
    $show_img2 = base64_encode($stroka2['r_photo']);
    echo"<label>Нове зображення</label> <input type='file' name='photo1'/><br><br>";
    echo "<img src='data:image/jpeg;base64, ".$show_img2."' alt='Зображення немає' width='100' height='100'><br>";
    $id1= $stroka2['id'];


    $rows2= $conn->query("SELECT id, r_photo FROM photo WHERE room_id=".$_GET['id']." AND n_foto='f2'");
    $stroka2=$rows2->fetch_assoc();
    $show_img2 = base64_encode($stroka2['r_photo']);
    echo"<label>Нове зображення</label> <input type='file' name='photo2'/><br><br>";
    echo "<img src='data:image/jpeg;base64, ".$show_img2."' alt='Зображення немає' width='100' height='100'><br>";
    $id2= $stroka2['id'];


    $rows2= $conn->query("SELECT id, r_photo FROM photo WHERE room_id=".$_GET['id']." AND n_foto='f3'");
    $stroka2=$rows2->fetch_assoc();
    $show_img2 = base64_encode($stroka2['r_photo']);
    echo"<label>Нове зображення</label> <input type='file' name='photo3'/><br><br>";
    echo "<img src='data:image/jpeg;base64, ".$show_img2."' alt='Зображення немає' width='100' height='100'><br>";
    $id3= $stroka2['id'];
?>
<input type="submit" value="Зберегти"><br><br>

<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="id1" value="<?php echo $id1; ?>">
<input type="hidden" name="id2" value="<?php echo $id2; ?>">
<input type="hidden" name="id3" value="<?php echo $id3; ?>">



</form>
 </div>
</div></body>
</html>




