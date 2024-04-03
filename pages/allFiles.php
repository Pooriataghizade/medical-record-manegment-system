<?php
session_start();
include "./../body/head.php";
include "./../DB/dataBase.php";
include "./../helpers/withchMF.php";
$dateOfJdate = jdate("d");
$ddate = jdate("F");

// require_once "./../act/searchData2DB.php";
require "./../helpers/filesSearchFunc.php";

if(!isset($_SESSION['data'])){
  
  $query = "SELECT * FROM files";
  $stmt = $con->prepare($query);
  $stmt->execute(); 
  $data =  $stmt->fetchAll(PDO::FETCH_ASSOC);

}else{
  $data = $_SESSION['data'];
}

?>
<body dir="rtl">
<?php
require "./../body/header.php";

?>
<div class="shadow"
style="

    margin:15px 20px;
    padding: 10px 5px;">
    
    <h2 style="color: whitesmoke;margin-bottom: 6.25px;">Search : </h2>
    <button><a href="./../act/delsession.php">del session</a></button>
     <form action="./../act/searchData2DB.php" method="POST">

      <label for="name">نام : </label>
      <input name="name" type="text">

      <label for="discharge_day">روز : </label>
      <input name="discharge_day" type="number">

      <label for="discharge_mouth">ماه : </label>
      <select name="discharge_mouth" id="">
        <option value="">انتخاب</option>
        <option value="1">فروردین</option>
        <option value="2">اردیبهشت</option>
        <option value="3">خرداد</option>
        <option value="4">تیر</option>
        <option value="5">مرداد</option>
        <option value="6">شهریور</option>
        <option value="7">مهر</option>
        <option value="12">اسفند</option>
      </select>

      <button type="submit">جستوجو</button>
     </form>
    </div>

    <div style="display: flex;justify-content: CENTER;flex-wrap: wrap;">
      <?php  foreach($data as $dt){   ?>
      <div style="    background-color:#294e38;
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
    <!-- SEARCH --><!-- SEARCH --><!-- SEARCH --><!-- SEARCH --><!-- SEARCH -->
<!-- SEARCH --><!-- SEARCH --><!-- SEARCH -->
<!-- SEARCH --><!-- SEARCH --><!-- SEARCH --><!-- SEARCH --><!-- SEARCH -->
</body>