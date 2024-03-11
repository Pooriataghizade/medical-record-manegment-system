<?php 
include "./../body/head.php";
include "./../DB/dataBase.php";
$query2 = "select * from files";
$stm2 = $con->prepare($query2);
$stm2->execute();
$data =  $stm2->fetchAll(PDO::FETCH_ASSOC);


$dddate = jdate("d");
$ddate = jdate("F");
switch($ddate)
{
  case "اسفند";
  $f = "12";
}

?>
<body>
    <?php include "./../body/header.php";?>
    <div class="forform">
     <form action="./../act/sendData2DB.php" method="POST">
      <label for="name">Name : </label>
      <input name="name" type="text">
      <label for="discharge_day">Day : </label>
      <input name="discharge_day" type="text" value="<?= $dddate; ?>">
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
      <button type="submit">OK</button>
     </form>
    </div>
    <div style="display: flex;justify-content: flex-start;flex-wrap: wrap;">
      <?php  foreach($data as $dt){   ?>
      <div style="background-color: white; margin-inline:5px;background-color: white;
    margin-inline: 5px;
    margin: 5px 6px;
    
    min-width: 250px;    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;padding:5px;border-radius:15px;">
        <h3><?= $dt['name']?></h3>
        <h3><?= $dt['discharge_day'];?></h3>
        <h3><?= $dt['discharge_mouth'];?></h3>
        <button>Ditaels</button>
      </div>
      
      <?php }?>
    </div>
</body>
</html>