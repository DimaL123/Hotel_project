<?php
$id=$_POST['id'];
$client_name= $_POST['name'];
$client_phone= $_POST['phone'];
$client_date1= $_POST['date1'];
$client_date2= $_POST['date2'];


 $insert="id_room='{$id}', cl_name='{$client_name}', cl_phone='{$client_phone}', date1='{$client_date1}', date2='{$client_date2}'";
 $zapros="INSERT INTO clients SET {$insert}";
echo $zapros;
 //$conn->query($zapros);
 ?>