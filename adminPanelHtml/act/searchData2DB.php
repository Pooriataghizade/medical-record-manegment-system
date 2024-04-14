<?php
session_start(); 
require_once "./../DB/dataBase.php";
$name = $_POST['name'];
$discharge_day = $_POST['discharge_day'];
$discharge_month = $_POST['discharge_mouth'];

    // JUST NAME
    if(!empty($name) && empty($discharge_day) && empty($discharge_month))
    {
        $pattern = '%' . $name . '%';
        $sql = 'SELECT * FROM files WHERE name LIKE :pattern';
        $statement = $con->prepare($sql);
        $statement->execute([':pattern' => $pattern]);
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['data']=$data;


    }
    //NAME AND DISCHARGE DAY
    elseif(!empty($name) && !empty($discharge_day) && empty($discharge_month))
    {
        $sql = "SELECT * FROM files WHERE name LIKE ? AND discharge_day = ?";
        $params = array("%$name%",$discharge_day);
        $statement = $con->prepare($sql);
        $statement->execute($params);
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['data']=$data;


    }
    //NAME AND DISCHAGE DAY AND MOUTH
    elseif(!empty($name) && !empty($discharge_day) && !empty($discharge_month))
    {
        $sql = "SELECT * FROM files WHERE name LIKE ? AND discharge_day = ? AND discharge_mouth = ?";
        $params = array("%$name%",$discharge_day,$discharge_month);
        $statement = $con->prepare($sql);
        $statement->execute($params); 
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['data']=$data;


    }
    //DISCHAGE DAY AND MOUTH
    elseif(empty($name) && !empty($discharge_day) && !empty($discharge_month))
    {
        $sql = "SELECT * FROM files WHERE discharge_day = ? AND discharge_mouth = ?";
        $params = array($discharge_day,$discharge_month);
        $statement = $con->prepare($sql);
        $statement->execute($params); 
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['data']=$data;


    }
    //NAME and DISCHARGE MOuTH
    elseif(!empty($name) && empty($discharge_day) && !empty($discharge_month))
    {
        $sql = "SELECT * FROM files WHERE name LIKE ? AND discharge_mouth = ?";
        $params = array("%$name%",$discharge_month);
        $statement = $con->prepare($sql);
        $statement->execute($params);
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['data']=$data;

 
    }
    // JUST DISCHARGE MOUTH 
    elseif(empty($name) && empty($discharge_day) && !empty($discharge_month))
    {
        $sql = "SELECT * FROM files WHERE discharge_mouth = ?";
        $params = array($discharge_month);
        $statement = $con->prepare($sql);
        $statement->execute($params);
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['data']=$data;


    }
    //JUST DISCHARGE DAY
    elseif(empty($name) && !empty($discharge_day) && empty($discharge_month))
    {
        $sql = "SELECT * FROM files WHERE discharge_day = ?";
        $params = array($discharge_day);
        $statement = $con->prepare($sql);
        $statement->execute($params);
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['data']=$data;


    }
    
    if(!isset($data)){
        
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['data']=$data;
    }
    header("location:./../pages/allFiles.php");
?> 