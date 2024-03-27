<?php 
require_once "./../DB/dataBase.php";

$name = $_POST['name'];
$discharge_day = $_POST['discharge_day'];
$discharge_month = $_POST['discharge_mouth'];
// var_dump($discharge_day);
// JUST NAME
    if(!empty($name) && empty($discharge_day) && empty($discharge_month))
    {
        $pattern = '%' . $name . '%';
        $sql = 'SELECT * FROM files WHERE name LIKE :pattern';
        $statement = $con->prepare($sql);
        $statement->execute([':pattern' => $pattern]);
    }
    //NAME AND DISCHARGE DAY
    // elseif(!empty($name) && !empty($discharge_day) && empty($discharge_month))
    // {
    //     $sql = "SELECT * FROM files WHERE name LIKE ? AND discharge_day = ?";
    //     $params = array("%$name%", "%$discharge_day%");
    //     $statement = $con->prepare($sql);
    //     $statement->execute($params); 
    // }
    //NAME AND DISCHAGE DAY AND MOUTH
    elseif(!empty($name) && !empty($discharge_day) && !empty($discharge_month))
    {
        $sql = "SELECT * FROM files WHERE name LIKE ? AND discharge_day = ? AND discharge_mouth = ?";
        $params = array("%$name%",$discharge_day,$discharge_month);
        $statement = $con->prepare($sql);
        $statement->execute($params); 
    }
   
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    var_dump($data);

?> 