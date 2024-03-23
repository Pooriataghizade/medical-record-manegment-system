<?php

require "./../DB/dataBase.php";
$id = $_GET['id'];
$status = $_GET['st'];


// $name = $_POST['name'];
// $dis_day = $_POST['discharge_day'];
// $dis_mouth = $_POST['discharge_mouth'];
// $status = 0 ;
// $s = "THISISNOTE";
$sql = "UPDATE files SET status=? WHERE id=?";
$stmt= $con->prepare($sql);
$stmt->execute([$status, $id]);
// $stm->execute();
// var_dump($id);var_dump($status);
?>