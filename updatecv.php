<?php
include('session.php');
$cv = $conn->real_escape_string($_POST['cv']);
if (isset($_SESSION['login_userid'])) {
	$userID = $conn->real_escape_string($_SESSION['login_userid']);
}

$sql = "UPDATE `graduate_tbl` SET `cv` = '$cv' WHERE `graduate_tbl`.`graduateID` = $userID";
mysqli_query($conn,$sql) or die(mysqli_error($conn));
header("Location: graduatecv.php");
 ?>
