<?php
include('dbcon.php');
if (isset($_SESSION['login_userid'])) {
	$userID = $conn->real_escape_string($_SESSION['login_userid']);
}

$courseSql = "SELECT *
FROM `course_tbl`
WHERE `schoolID`=$userID";

$courseQuery = mysqli_query($conn, $courseSql) or die(mysqli_error($conn));

if(!$courseQuery){
  die('SQL Error: ' . mysqli_error($conn));
}
 ?>
