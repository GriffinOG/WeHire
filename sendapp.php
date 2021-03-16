<?php
include 'dbcon.php';
$graduateID = $_POST['graduateID'];
$jobID = $_POST['jobID'];
$app = $_POST['app'];
$companyID = $_POST['companyID'];

$sql="INSERT INTO `sent_apps_tbl`(`graduateID`, `jobID`, `text`)
VALUES ('$graduateID','$jobID','$app')";

$appQuery = mysqli_query($conn,$sql) or die(mysqli_error($conn));

if(!$appQuery){
  die ('SQL Error: ' . mysqli_error($conn));
}else {
  header("Location: companyprofile.php?companyid=" . $companyID);
}
 ?>
