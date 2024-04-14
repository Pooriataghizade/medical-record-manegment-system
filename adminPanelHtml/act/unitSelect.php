<?php
require "./../DB/dataBase.php";
require "./../helpers/statusF.php";

$id = $_GET['id'];
$unit = $_POST['unit'];



$sql = "UPDATE files SET unit=? WHERE id=?";
$stmt= $con->prepare($sql);
if($stmt->execute([$unit,$id])){
    header("location:./../pages/fileSingle.php?id=$id");
}else{
    var_dump("ASS");die();
}

?>