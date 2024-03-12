<?php

require_once "./../DB/dataBase.php";
$id = $_GET['id'];
$query3 = "DELETE FROM files WHERE id='$id'";
$stm3 = $con->prepare($query3);
if($stm3->execute()){
    header("location:./../pages/index.php");
}



?>