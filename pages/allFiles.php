<?php
session_start();
include "./../layout/head.php";
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
<body>
<?php
require "./../layout/header.php";

?>
<div class="container mt-5">
  <!-- SEARCH AREA -->
  <form action="./../act/searchData2DB.php" method="POST">
      
      <div class="w-25 bg-primary p-3 rounded">
        <label for="" class="text-white mb-3">Search : </label>
        <div class="input-group mb-3  mx-1">
          <span class="input-group-text" id="addon-wrapping">Name</span>
          <input type="text" name="name" class="form-control" placeholder="Name" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group mb-3 mx-1">
          <span class="input-group-text" id="addon-wrapping">Day</span>
          <input type="text" name="discharge_day" class="form-control" value="<?= convert_persian_to_english($dateOfJdate)?>" placeholder="discharge_day" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <div class="input-group mb-3 mx-1">
          <span class="input-group-text" id="addon-wrapping">Mouth</span>
          <select class="form-control" name="discharge_mouth" id="">
          <option value="1" <?php if($f == "1"){echo "selected";}?>>فروردین</option>
          <option value="2" <?php if($f == "2")echo "selected";?>>Ordibehesht</option>
          <option value="3">Khordad</option>
          <option value="4">Tir</option>
          <option value="5">Mordad</option>
          <option value="6">Shahrivar</option>
          <option value="7">Mehr</option>
          <option value="12" <?php if($f == "12"){echo "selected";}?>>Esfand</option>
        </select>
        </div>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-dark">Search</button>
        </div>
      </div>
  </form>
  <!-- End Search Area -->

  <!-- Show all Files -->
  <div>
    <div class="d-flex flex-wrap mt-3">
    <?php  foreach($data as $dt){   ?>
      <div class="mx-1 px-2 py-1 bg-primary my-1 d-flex flex-column justify-content-center align-items-center rounded">
        <p class="fs-4"><?= $dt['name']?></p>
        <div style="display: flex;">
          <p class="fs-4">Discharge Date : </p>
          <p class="fs-4"><?= $dt['discharge_day'];?></p>
          <p class="fs-4"><?= witchMouth($dt['discharge_mouth']);?></p>
        </div>
        <div class="d-flex justify-content-between">
          <a class="btn btn-primary" href="./fileSingle.php?id=<?= $dt['id'];?>">Details</a>
          <a class="btn btn-primary" href="./../act/delete.php?id=<?= $dt['id']; ?>">Delete</a>
        </div>
        
      </div>
      
      <?php }?>
    </div>
  </div>
  <!--End Show all Files -->
</div>
</body>