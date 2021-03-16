<?php
include('session.php');
$about = $conn->real_escape_string($_POST['about']);
if (isset($_SESSION['login_userid'])) {
	$userID = $conn->real_escape_string($_SESSION['login_userid']);
}

$sql = "UPDATE `company_tbl` SET `about` = '$about' WHERE `company_tbl`.`companyID` = $userID";
mysqli_query($conn,$sql) or die(mysqli_error($conn));
header("Location: companyabout.php");
 ?>
