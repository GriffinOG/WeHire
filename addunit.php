<?php
include('dbcon.php');
$unitName = $_POST['unitName'];
$courseID = $_POST['courseID'];
$year = $_POST['year'];
$semester = $_POST['semester'];

$sql = "INSERT INTO `unit_tbl`(`unitName`, `courseID`, `year`, `semester`)
VALUES ('$unitName',$courseID,$year,$year)";

$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));

if ($query) {
  header("Location: allunits.php?courseid=" . $courseID);
}
?>                                                                                                     
