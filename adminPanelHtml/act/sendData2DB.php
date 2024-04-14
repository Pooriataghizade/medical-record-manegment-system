<?php 
session_start();
require_once "./../DB/dataBase.php";
// require_once "./../helpers/filesSearchFunc.php";
$name = $_POST['name'];
$dis_day = $_POST['day'];
$dis_mouth = $_POST['mouth'];
$status = 0 ;
$s = "";



if(empty($name)){
    $_SESSION['error'] = "Please Enter Name";
    header("location:./../pages/index.php");
}else{
    $query = "insert into files (name,discharge_day,discharge_mouth,status) values ('$name','$dis_day','$dis_mouth','$status')";
    $stm = $con->prepare($query);
    if($stm->execute()){
        header("location:./../addFiles.php");
    };
}
?> 