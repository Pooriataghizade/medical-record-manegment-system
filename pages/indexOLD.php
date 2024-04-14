<?php 
session_start();
include "./../layout/head.php";
include "./../DB/dataBase.php";
include "./../helpers/withchMF.php";

$dateOfJdate = jdate("d");
$ddate = jdate("F");

//HELPERS FUNCTIONS => 
require "./../helpers/filesSearchFunc.php";
//END OF HELPERS FUNCTION ;

//QUERY OF SHOW TODAY FILES =>
$dateOfJdateOnFuntionEng = convert_persian_to_english($dateOfJdate);
$query = "SELECT * FROM files WHERE discharge_mouth = :f AND discharge_day = :dateOfJdate";
$stmt = $con->prepare($query);
$stmt->bindParam(':f', $f, PDO::PARAM_STR);
$stmt->bindParam(':dateOfJdate',$dateOfJdateOnFuntionEng , PDO::PARAM_STR);
$stmt->execute(); 
$data =  $stmt->fetchAll(PDO::FETCH_ASSOC);
//END OF QUERY ;
?>
<body dir="rtl">
<?php 
require "./../layout/header.php";
?>
<div style="display: flex;justify-content: space-between;">
<div>
    <h3 class="mb-6-25">افزودن پرونده جدید</h3>
     <form action="./../act/sendData2DB.php" method="POST">
      <label for="name">نام : </label>
      <input name="name" type="text">
      <label for="discharge_day">روز : </label>
      <input name="discharge_day" type="text" value="<?= convert_persian_to_english($dateOfJdate); ?>">
      <label for="discharge_mouth">ماه : </label>
      <select name="discharge_mouth" id="">
        <option value="1" <?php if($f == "1"){echo "selected";}?>>فروردین</option>
        <option value="2" <?php if($f == "2")echo "selected";?>>Ordibehesht</option>
        <option value="3">Khordad</option>
        <option value="4">Tir</option>
        <option value="5">Mordad</option>
        <option value="6">Shahrivar</option>
        <option value="7">Mehr</option>
        <option value="12" <?php if($f == "12"){echo "selected";}?>>Esfand</option>
      </select>
      <button style="padding: 2px 3px;font-family:yekanReg" type="submit">افزودن</button>
     </form>
    </div>
<!-- END NEW FILE ; -->

    </div>
    <div style="display: flex;justify-content: CENTER;flex-wrap: wrap;">
      <?php  foreach($data as $dt){   ?>
      <div style="    background-color:#585858;
    margin-inline: 5px;
    margin: 5px 6px;
    min-width: 240px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 17px 5PX;
    border-radius: 5px;
    color:aliceblue;
    ">
        <h3><?= $dt['name']?></h3>
        <div style="display: flex;">
          <h3>تاریخ ترخیص : </h3>
          <h3><?= $dt['discharge_day'];?></h3>
          <h3><?= witchMouth($dt['discharge_mouth']);?></h3>
        </div>
        
       
         
             <div style="display: flex;justify-content: space-around;">
               
             
             <button type="button" style="background: #ffbc00;
             padding: 4px 27px;
             border-radius: 5px;"><a style="text-decoration: none;color: #034c70;" href="./fileSingle.php?id=<?= $dt['id'];?>">جزئیات</a></button> 
             <button style="background-color:#f50b0b ;padding: 4px 27px; border-radius: 5px;" type="button"><a style="text-decoration: none; color:whitesmoke" href="./../act/delete.php?id=<?= $dt['id']; ?>">حذف</a></button>
            </div>
      </div>
      
      <?php }?>
    </div>


    <?php
    include "./../layout/script.php";
    ?>
</body>
</html>