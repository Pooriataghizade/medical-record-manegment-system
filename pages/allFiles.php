<?php
session_start();
include "./../body/head.php";
include "./../DB/dataBase.php";
if(isset($_SESSION['data'])){
$data = $_SESSION['data'];
}else{
  $query = "SELECT * FROM files";
  $stmt = $con->prepare($query);
  $stmt->execute(); 
  $data =  $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
<a href="./index.php">HOME</a>
<!-- SEARCH --><!-- SEARCH --><!-- SEARCH --><!-- SEARCH --><!-- SEARCH -->
<!-- SEARCH --><!-- SEARCH --><!-- SEARCH -->
<!-- SEARCH --><!-- SEARCH --><!-- SEARCH --><!-- SEARCH --><!-- SEARCH -->
<div style="background: black;
    margin-top: 0px;
    padding: 10px 5px;">
    
    <h2 style="color: whitesmoke;margin-bottom: 6.25px;">Search : </h2>
    <button><a href="./../act/delsession.php">del session</a></button>
     <form action="./../act/searchData2DB.php" method="POST">

      <label for="name">Name : </label>
      <input name="name" type="text">

      <label for="discharge_day">Day : </label>
      <input name="discharge_day" type="number">

      <label for="discharge_mouth">Mouth : </label>
      <select name="discharge_mouth" id="">
        <option value="">SELECT</option>
        <option value="1">Farvardin</option>
        <option value="2">Ordibehesht</option>
        <option value="3">Khordad</option>
        <option value="4">Tir</option>
        <option value="5">Mordad</option>
        <option value="6">Shahrivar</option>
        <option value="7">Mehr</option>
        <option value="12">Esfand</option>
      </select>

      <button type="submit">SEARCH</button>
     </form>
    </div>

    <div style="display: flex;justify-content: CENTER;flex-wrap: wrap;">
      <?php  foreach($data as $dt){   ?>
      <div style="    background-color: #36434a;
    margin-inline: 5px;
    margin: 5px 6px;
    min-width: 240px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 17px 5PX;
    border-radius: 2px;
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
    <!-- SEARCH --><!-- SEARCH --><!-- SEARCH --><!-- SEARCH --><!-- SEARCH -->
<!-- SEARCH --><!-- SEARCH --><!-- SEARCH -->
<!-- SEARCH --><!-- SEARCH --><!-- SEARCH --><!-- SEARCH --><!-- SEARCH -->