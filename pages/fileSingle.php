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
    <h1><?php 
    if($dt['status'] == "0")
    {echo "بررسی نشده";}
    elseif($dt['status'] == "1")
    {echo "سورت شده";}
    elseif($dt['status'] == "2")
    {echo "صمدی";}
     ?></h1>
    <div style="display: flex;justify-content: space-between; align-items: center; width: 100%;">
    <button type="button" style="background: #ffbc00;
             padding: 4px 27px;
             border-radius: 5px;"><a style="text-decoration: none;color: #034c70;" href="./fileStatus.php?st=1&id=<?= $dt['id'];?>">Sorted</a></button> 
       <button type="button" style="background: #ffbc00;
             padding: 4px 27px;
             border-radius: 5px;"><a style="text-decoration: none;color: #034c70;" href="./fileStatus.php?st=2&id=<?= $dt['id'];?>">Samadi</a></button> 
       <a href="">BAYGANI</a>
       <a href="">Unit For Problem</a>
       <a href="">Unit For complete File</a>
       
    </div>
    <div>

        <textarea name="" id="" cols="30" rows="10"></textarea>
        <button>Add Note To File</button>
    </div>
    <button><a href="./index.php">BACK</a></button>
</div>
<?php } ?>


</body>
