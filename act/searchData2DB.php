<?php 
require_once "./../DB/dataBase.php";

$name = $_POST['name'];
$discharge_day = $_POST['discharge_day'];
$discharge_month = $_POST['discharge_mouth'];

$sql = "SELECT * FROM files WHERE 1=1"; // Start with a dummy condition

if (!empty($name)) {
    $sql .= " AND name = :name";
}
if (!empty($discharge_day)) {
    $sql .= " AND discharge_day = :date";
}
if (!empty($discharge_month)) {
    $sql .= " AND discharge_mouth = :mouth";
}

// Execute the query
$stmt = $con->prepare($sql);

if (!empty($name)) {
    $stmt->bindParam(':name', $name);
}
if (!empty($discharge_day)) {
    $stmt->bindParam(':date', $discharge_day);
}
if (!empty($discharge_month)) {
    $stmt->bindParam(':mouth', $discharge_month);
}

$stmt->execute();

// Fetch results
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display results (you can format this as needed)
foreach ($results as $row) {
    echo "Name: " . $row['name'] . ", Discharge Date: " . $row['discharge_date'] . ", Discharge Mouth: " . $row['discharge_mouth'] . "<br>";
}
?>
?> 