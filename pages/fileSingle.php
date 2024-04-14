<?php
include "./../layout/head.php";
include "./../DB/dataBase.php";
include "./../helpers/withchMF.php";
include "./../helpers/statusF.php";
include "./../helpers/witchUnitFunc.php";

$id = $_GET['id'];
$query2 = "select * from files where id='$id'";
$stm2 = $con->prepare($query2);
$stm2->execute();
$data =  $stm2->fetchAll(PDO::FETCH_ASSOC);

?>
<body>
<?php 
include "./../layout/header.php";
?>

<?php 

foreach($data as $dt)
{?>
<div class="container mt-3 d-flex justify-content-center">
    <div class="card w-50 p-5">
        <!-- NAME -->
        <h4 class="text-center"><?= $dt['name']; ?></h4>
        <!-- Discharge Date  -->
        <div class="d-flex justify-content-center">
            <label for="">discharge Date : </label>
            <p class=""><?= witchMouth($dt['discharge_mouth']);?></p>
            <p><?= $dt['discharge_day'];?></p>
            <span class="badge rounded-pill text-bg-success">Success</span>
        </div>
        <!-- Show Status -->
        <div class="yekanReg text-center">
            وضعیت : <?= statusF($dt['status']); ?>
        </div>
        <!-- Handle Show Unit  -->
        <?php
            if(!empty($dt['unit'])){
        ?>
            <div class="d-flex justify-content-center">
                <p> بخش : <?= witchUnit($dt['unit']); ?></p>
            </div>
        <?php
      };
      ?>
      <!-- Status Btns -->
        <div class="d-felx mx-auto mt-2">
            <a  href="./../act/smdiStatus.php?status=4&id=<?= $dt['id']; ?>"><button class="btn btn-primary">سورت شده</button></a>
            <a  href="./../act/smdiStatus.php?status=3&id=<?= $dt['id']; ?>"><button class="btn btn-primary">صمدی برده</button></a>
            <a  href="./../act/smdiStatus.php?status=2&id=<?= $dt['id']; ?>"><button class="btn btn-primary">نقصی برای واحد ها</button></a>
            <a class="" href=""><button class="btn btn-primary">در بخش</button></a>
            <a href="./../act/smdiStatus.php?status=0&id=<?= $dt['id']; ?>"><button class="btn btn-primary">بررسی نشده</button></a>
        </div>
        <!-- Select Unit INput-->
        <div class="mt-3">
            <label for="">Select Unit : </label>
            <form action="./../act/unitSelect.php?id=<?= $dt['id']; ?>" method="POST">
                <div class="d-flex justify-content-center">
                    <select name="unit" id="" class="form-control">
                        <option value="0" selected>انتخاب بخش</option>
                        <option value="1">بخش 1 </option>
                        <option value="2">بخش 2 </option>
                        <option value="3">بخش 3</option>
                        <option value="4">بخش 4</option>
                        <option value="5">بخش 5</option>
                        <option value="6">بخش 6</option>
                        <option value="7">بخش 7</option>
                        <option value="8">بخش SICU1</option>
                        <option value="9">بخش SICU2</option>
                        <option value="10">بخش MICU</option>
                        <option value="11">بخش CCU</option>
                        <option value="12">بخش VIP</option>
                        <option value="13">DayCare</option>
                    </select>
                    <button type="submit">Select</button>
                </div>
            </form>
        </div>
        <!-- Note -->
        <div class="mt-3">
            <label for="">Note: </label>
            <br>
            <form action="./../act/noted.php" method="POST">
                <input type="hidden" name="id" value="<?= $dt['id']; ?>">
                <textarea name="note" id="" class="w-100 form-control">
                    <?php if($dt['note'])echo $dt['note'];?>
                </textarea>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary mt-2"><a href="./index.php">Back</a></button>
                    <button type="submit" class="btn btn-dark mt-2">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>


</body>
