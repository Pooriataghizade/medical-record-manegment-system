<?php 
require_once "./../DB/dataBase.php";

$name = $_POST['name'];
$dis_day = $_POST['discharge_day'];
$dis_mouth = $_POST['discharge_mouth'];
$status = 0 ;
$s = "THISISNOTE";
$query = "insert into files (name,discharge_day,discharge_mouth,note,status) values ('$name','$dis_day','$dis_mouth','$s','$status')";
$stm = $con->prepare($query);
if($stm->execute()){
    header("location:./../pages/INDEX.PHP");
};
// $stm->execute();
?> 