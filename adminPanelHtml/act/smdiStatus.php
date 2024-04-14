<?php
require "./../DB/dataBase.php";
require "./../helpers/statusF.php";

$status = $_GET['status'] ;
$id = $_GET['id'];
$sql = "UPDATE files SET status=? WHERE id=?";
$stmt= $con->prepare($sql);
if($stmt->execute([$status,$id])){
    header("location:./../pages/fileSingle.php?id=$id");
}else{
    var_dump("ASS");die();
}

?>