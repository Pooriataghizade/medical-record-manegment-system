<?php
include "./../body/head.php";
include "./../DB/dataBase.php";
include "./../helpers/withchMF.php";
include "./../helpers/statusF.php";

$id = $_GET['id'];
$query2 = "select * from files where id='$id'";
$stm2 = $con->prepare($query2);
$stm2->execute();
$data =  $stm2->fetchAll(PDO::FETCH_ASSOC);

?>
<body dir="rtl">
<?php 
include "./../body/header.php";
?>

<?php 

foreach($data as $dt)
{?>
<div style="margin:5px 2px;padding:3.2px 7.5px">
<h3 style="margin-bottom: 2.6px;"><?= $dt['name']?></h3>
        <div style="display: flex;font-family: yekanReg;">
          <h4 style="font-family: yekanReg;">تاریخ ترخیص : </h4>
          <h4><?= $dt['discharge_day'];?></h4>
          <h4><?= witchMouth($dt['discharge_mouth']);?></h4>
        </div>
        <div>
            وضعیت : <?= statusF($dt['status']); ?>
        </div>
        <div style="display: flex; justify-content: space-between;">
            <div style="display: flex;">
                <a style="margin-left: 5px;" href="./../act/smdiStatus.php?status=4&id=<?= $dt['id']; ?>""><button style="padding: 2px 3.6px;">سورت شده</button></a>
                <a style="margin-left: 5px;" href="./../act/smdiStatus.php?status=3&id=<?= $dt['id']; ?>"><button style="padding: 2px 3.6px;">صمدی برده</button></a>
                <a style="margin-left: 5px;" href="./../act/smdiStatus.php?status=2&id=<?= $dt['id']; ?>""><button style="padding: 2px 3.6px;">نقصی برای واحد ها</button></a>
                <a style="margin-left: 5px;" href=""><button style="padding: 2px 3.6px;">در بخش</button></a>
            </div>
            <a href="./../act/smdiStatus.php?status=0&id=<?= $dt['id']; ?>""><button style="padding: 2px 3.6px;">بررسی نشده</button></a>
        </div>
      
        <div style="margin-top: 1rem;">
            <label style="font-family: yekanBold;" for="">یادداشت</label>
            <form action="./../act/noted.php?id=<?= $dt['note'];?>" method="POST">
                <input type="hidden" name="id" value="<?= $dt['id']; ?>">
                <textarea style="padding: 5px;" name="note" id="" cols="30" rows="10">
                <?php 
        if($dt['note']){
            ?>
            <?= $dt['note'];?>
        <?php
        };
        ?>
                </textarea>
                <br>
                <button style="padding: 2px 4.5px; border-radius: 5px;" type="submit">ارسال</button>
            </form>
        </div>
 
       
</div>
<?php } ?>


</body>
