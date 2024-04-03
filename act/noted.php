<?php
require "./../DB/dataBase.php";
require "./../helpers/statusF.php";

$id = $_POST['id'];
$note = $_POST['note'];


$sql = "UPDATE files SET note=? WHERE id=?";
$stmt= $con->prepare($sql);
if($stmt->execute([$note,$id])){
    header("location:./../pages/fileSingle.php?id=$id");
}else{
    var_dump("ASS");die();
}

?>