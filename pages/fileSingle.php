<?php
include "./../body/head.php";
include "./../DB/dataBase.php";
$id = $_GET['id'];
$query2 = "select * from files where id='$id'";
$stm2 = $con->prepare($query2);
$stm2->execute();
$data =  $stm2->fetchAll(PDO::FETCH_ASSOC);
// var_dump($data);
?>
<body>
<?php include "./../body/header.php";
foreach($data as $dt)
{?>
    <div style="    margin-top: 5rem;
    text-align: -webkit-center;
    box-shadow: 0px 8px 28px 1px rgba(0, 78, 123, 0.2);
    background: darkgray;
    display: flex;
    flex-direction: column;
    justify-content: center;
    margin: 5rem 30rem;
    padding: 40px 1px;
    align-items: center;
    line-height: 33px;
    border-radius: 10px;">
    <h2><?= $dt['name']; ?></h2>
    <h3>تاریخ ترخیص : <?= $dt['discharge_day']?> <?= $dt['discharge_mouth']?></h3>
    <h1><?php if($dt['status'] == "0"){echo "بررسی نشده";}; ?></h1>
    <div style="display: flex;justify-content: space-between; align-items: center; width: 100%;">
       <a href="">SORTED</a>
       <a href="">SAMADI</a>
       <a href="">BAYGANI</a>
       <a href="">Unit For Problem</a>
       <a href="">Unit For complete File</a>
    </div>
    <button><a href="./index.php">BACK</a></button>
</div>
<?php } ?>


</body>
