<?php
include 'dbcon.php';
$schoolID = $_POST['schoolID'];
$fName = $_POST['firstName'];
$lName = $_POST['lastName'];
$dob = $_POST['DoB'];
$email = $_POST['email'];
$pass = $_POST['password'];
$phone = $_POST['phone'];

$graduateName = $fName." ".$lName;
$sql="INSERT INTO `graduate_tbl`(`graduateSchoolID`,`graduateName`, `dateOfBirth`, `email`, `password`, `phone`)
VALUES ('$schoolID','$graduateName','$dob','$email','$pass','$phone')";

$regQuery = mysqli_query($conn,$sql) or die(mysqli_error($conn));

if(!$regQuery){
  die ('SQL Error: ' . mysqli_error($conn));
}else {
  $idSql = "SELECT `graduateID` FROM `graduate_tbl` WHERE `email`='$email' AND `password`='$pass'";
  $idQuery = mysqli_query($conn,$idSql) or die(mysqli_error($conn));
  if ($idQuery) {
    while ($row = mysqli_fetch_assoc($idQuery)) {
      $gradID = $row['graduateID'];
    }
  }
  header("Location: addcourse.php?graduateid=" . $gradID);
}

 ?>
