<?php 
include "./../body/head.php";
include "./../DB/dataBase.php";


$dateOfJdate = jdate("d");
$ddate = jdate("F");

//HELPERS FUNCTIONS => 
switch($ddate)
{
  case "اسفند";
  $f = "12";
  break;
  case "فروردین";
  $f="1";
  break;
  case "اردیبهشت";
  $f = "2";
  break;
}

function convert_persian_to_english($string) {
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    $output = str_replace($persian, $english, $string);
    return $output;
}

//END OF HELPERS FUNCTION ;

$dateOfJdateOnFuntionEng = convert_persian_to_english($dateOfJdate);
//QUERY OF SHOW TODAY FILES =>
$query = "SELECT * FROM files WHERE discharge_mouth = :f AND discharge_day = :dateOfJdate";
$stmt = $con->prepare($query);
$stmt->bindParam(':f', $f, PDO::PARAM_STR);
$stmt->bindParam(':dateOfJdate',$dateOfJdateOnFuntionEng , PDO::PARAM_STR);
$stmt->execute(); 
$data =  $stmt->fetchAll(PDO::FETCH_ASSOC);
//END OF QUERY ;


?>


<body>
    <?php // include "./../body/header.php";?>
    <div>
        MEDICAL RECORD MANEGMENT SYSTEM 
    </div>
    <a href="./allFiles.php">All Files</a>
    <!-- ADD NEW FILE =>  -->
<div style="display: flex;justify-content: space-between;background: #36434a";>
<div style="
    margin-top: 0px;
    padding: 10px 5px;">
    <h2 style="color: whitesmoke;margin-bottom: 6.25px;">Add New File : </h2>
     <form action="./../act/sendData2DB.php" method="POST">
      <label for="name">Name : </label>
      <input name="name" type="text">
      <label for="discharge_day">Day : </label>
      <input name="discharge_day" type="text" value="<?= convert_persian_to_english($dateOfJdate); ?>">
      <label for="discharge_mouth">Mouth : </label>
      <select name="discharge_mouth" id="">
        <option value="1" <?php if($f == "1"){echo "selected";}?>>Farvardin</option>
        <option value="2">Ordibehesht</option>
        <option value="3">Khordad</option>
        <option value="4">Tir</option>
        <option value="5">Mordad</option>
        <option value="6">Shahrivar</option>
        <option value="7">Mehr</option>
        <option value="12" <?php if($f == "12"){echo "selected";}?>>Esfand</option>
      </select>
      <button type="submit">ADD</button>
     </form>
    </div>
<!-- END NEW FILE ; -->


<!-- SEARCH --><!-- SEARCH --><!-- SEARCH --><!-- SEARCH --><!-- SEARCH -->
<!-- SEARCH --><!-- SEARCH --><!-- SEARCH -->
<!-- SEARCH --><!-- SEARCH --><!-- SEARCH --><!-- SEARCH --><!-- SEARCH -->
    </div>
    <!-- SEARCH --><!-- SEARCH --><!-- SEARCH --><!-- SEARCH --><!-- SEARCH -->
<!-- SEARCH --><!-- SEARCH --><!-- SEARCH -->
<!-- SEARCH --><!-- SEARCH --><!-- SEARCH --><!-- SEARCH --><!-- SEARCH -->
    <div style="display: flex;justify-content: CENTER;flex-wrap: wrap;">
      <?php  foreach($data as $dt){   ?>
      <div style="    background-color: #034c70;
    margin-inline: 5px;
    margin: 5px 6px;
    min-width: 240px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 17px 5PX;
    border-radius: 10px;
    color:whitesmoke;">
        <h3><?= $dt['name']?></h3>
        <div style="display: flex;">
            <H3>DAY OF DISCHARGE : </H3>
            <h3><?= $dt['discharge_day'];?></h3>
        </div>
         <DIV style="display: flex;">
         <H3>DAY OF DISCHARGE : </H3>
        <h3><?= $dt['discharge_mouth'];?></h3>
         </DIV>
             <div style="display: flex;justify-content: space-around;">
               
             
             <button style="background-color:#f50b0b ;padding: 4px 27px; border-radius: 5px;" type="button"><a style="text-decoration: none; color:whitesmoke" href="./../act/delete.php?id=<?= $dt['id']; ?>">Delete</a></button>
             <button type="button" style="background: #ffbc00;
             padding: 4px 27px;
             border-radius: 5px;"><a style="text-decoration: none;color: #034c70;" href="./fileSingle.php?id=<?= $dt['id'];?>">Details</a></button> 
            </div>
      </div>
      
      <?php }?>
    </div>
</body>
</html>