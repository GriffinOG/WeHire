<?php
include('session.php');
if (isset($_SESSION['graduateid'])) {
  $graduateID = $conn->real_escape_string($_SESSION['graduateid']);
}

$gradesArray = $_POST;

foreach ($gradesArray as $unitCode => $grade) {
  $updateSql = "INSERT INTO `grade_tbl`(`graduateID`, `unitCode`, `marks`, `grade`)
  VALUES ($graduateID,$unitCode, 0,'$grade')";
  $updateQuery = mysqli_query($conn,$updateSql) or die(mysqli_error($conn));
}
 ?>
