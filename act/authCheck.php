<?php
session_start();
require "./../DB/dataBase.php";

$userName = $_POST['username'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
$params = array($userName,$password);
$statement = $con->prepare($sql);
$statement->execute($params); 
$data = $statement->fetchAll(PDO::FETCH_ASSOC);
if(!empty($data)){
    $_SESSION['Auth'] = $data;
    if(!empty($_SESSION['Auth'])){
        header("location:./../pages/index.php");
    }
}else{
    header("location:./../pages/login.php");
}
