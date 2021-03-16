<?php
// session_start();
include('dbcon.php');

if (isset($_SESSION['login_userid'])) {
	$userID = $conn->real_escape_string($_SESSION['login_userid']);
}
$unitSql = "SELECT `unit_tbl`.`unitName`
FROM `grade_tbl`,`unit_tbl`,`graduate_tbl`,`course_tbl`
WHERE `grade_tbl`.`unitCode`=`unit_tbl`.`unitCode`
AND `unit_tbl`.`courseID`=`course_tbl`.`courseID`
AND `grade_tbl`.`graduateID`=$userID
AND `grade_tbl`.`graduateID`=`graduate_tbl`.`graduateID`";

$unitQuery = mysqli_query($conn, $unitSql) or die(mysqli_error($conn));

if (!$unitQuery) {
	die ('SQL Error: ' . mysqli_error($conn));
}

$courseSql = "SELECT DISTINCTROW `course_tbl`.`courseName`
FROM `grade_tbl`,`unit_tbl`,`graduate_tbl`,`course_tbl`
WHERE `grade_tbl`.`unitCode`=`unit_tbl`.`unitCode`
AND `unit_tbl`.`courseID`=`course_tbl`.`courseID`
AND `grade_tbl`.`graduateID`=$userID
AND `grade_tbl`.`graduateID`=`graduate_tbl`.`graduateID`";

$courseQuery = mysqli_query($conn, $courseSql) or die(mysqli_error($conn));

if (!$courseQuery) {
	die ('SQL Error: ' . mysqli_error($conn));
}


$jobSql = "SELECT `criteria_tbl`.`jobID`,`criteria_tbl`.`query`,
`job_tbl`.`jobName`,`company_tbl`.`companyName`,`job_tbl`.`description`
FROM `criteria_tbl`, `job_tbl`,`company_tbl`
WHERE `criteria_tbl`.`jobID`=`job_tbl`.`jobID`
AND `job_tbl`.`companyID`=`company_tbl`.`companyID`";

$jobQuery = mysqli_query($conn, $jobSql);

if (!$jobQuery) {
	die ('SQL Error: ' . mysqli_error($conn));
}



 ?>
