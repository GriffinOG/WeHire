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
  header("Location: graduateregform.php");
}

 ?>
