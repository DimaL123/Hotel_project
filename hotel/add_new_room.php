<?php
    $conn = new mysqli('localhost', 'root', '', 'hotel');
// Перевірка з'єднання
if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
}
    $name= $_POST['name'];
    $insert="name='{$name}'";

    if(!empty($_FILES['photo']['tmp_name']))
    {$img = addslashes(file_get_contents($_FILES['photo']['tmp_name']));

    $insert.=", photo='{$img}'";
    }
    $prise=$_POST['prise'];
    $kol=$_POST['kol'];
    $info=$_POST['info'];
    $insert.=", prise='{$prise}', kol='{$kol}', info='{$info}'";






    if(isset($_POST['sale']) && $_POST['sale'] == '1') {
    $sale = 1;
    $date1 = isset($_POST['date1']) ? $_POST['date1'] : NULL;
    $date2 = isset($_POST['date2']) ? $_POST['date2'] : NULL;
    $text_sale = isset($_POST['text']) ? $_POST['text'] : "";

    $insert.=", sale='{$sale}', start='{$date1}', end='{$date2}', persent='{$text_sale}'";
    } else {
        $sale=0;
        $date1=NULL;
        $date2=NULL;
        $text_sale=" ";
        $insert.=", sale='{$sale}', start='{$date1}', end='{$date2}', persent='{$text_sale}'";
    }

     $zapros="INSERT INTO rooms SET {$insert}";

  $conn->query($zapros);

    if ($conn->affected_rows>0)
    {
       $id = mysqli_insert_id($conn);

    if(!empty($_FILES['photo1']['tmp_name']))
    {$img1 = addslashes(file_get_contents($_FILES['photo1']['tmp_name']));}


     if(!empty($_FILES['photo2']['tmp_name']))
    {$img2 = addslashes(file_get_contents($_FILES['photo2']['tmp_name']));}

    if(!empty($_FILES['photo3']['tmp_name']))
    {$img3 = addslashes(file_get_contents($_FILES['photo3']['tmp_name']));}

     $conn->query("INSERT INTO hotel.photo(id,room_id,r_photo,n_foto) VALUES (NULL, '$id', '$img1','f1'), (NULL, '$id','$img2','f2'), (NULL, '$id','$img3','f3')");
     Header ("Location: add_new_room.html");
    }
    else
    {
        echo "Винекла помилка";
    }
    ?>