<?php 
session_start();
if(!isset($_SESSION['Auth'])){
  header("location:./login.php");
  // var_dump("ASS");die();
}
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
<body>
<?php 
require "./../layout/header.php";
?>
<div class="container mt-5" >
  <!-- Add Area -->
  <div class="w-25 bg-primary p-3 rounded">
    <label class="mb-3 text-white" for="">Add new File</label>
    <form action="./../act/sendData2DB.php" method="POST">
      <div class="input-group mb-3">
        <span class="input-group-text" id="addon-wrapping">Name</span>
        <input type="text" name="name" class="form-control" placeholder="Name" aria-label="Username" aria-describedby="addon-wrapping">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="addon-wrapping">Day</span>
        <input type="text" name="discharge_day" class="form-control" value="<?= convert_persian_to_english($dateOfJdate)?>" placeholder="discharge_day" aria-label="Username" aria-describedby="addon-wrapping">
      </div>
      <div class="input-group mb-3">
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
      <button type="submit" class="btn btn-dark">Add</button>
      </div>
    </form>
  </div>
  <!-- Show Area -->
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
</div>

</body>
</html>