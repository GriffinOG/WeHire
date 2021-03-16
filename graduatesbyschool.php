<?php
include('dbcon.php');

$sql = "SELECT DISTINCTROW `graduate_tbl`.`graduateID`, `graduate_tbl`.`graduateSchoolID`, `graduate_tbl`.`graduateName`, `graduate_tbl`.`avatar`, `graduate_tbl`.`dateOfBirth`, `graduate_tbl`.`email`, `graduate_tbl`.`phone`, `graduate_tbl`.`cv`
FROM `graduate_tbl`,`grade_tbl`,`unit_tbl`,`course_tbl`,`school_tbl`
WHERE `grade_tbl`.`graduateID`=`graduate_tbl`.`graduateID`
AND `grade_tbl`.`unitCode` = `unit_tbl`.`unitCode`
AND `unit_tbl`.`courseID` = `course_tbl`.`courseID`
AND `course_tbl`.`schoolID`=`school_tbl`.`schoolID`
AND `school_tbl`.`schoolID`= $schoolID";

$query = mysqli_query($conn,$sql) or die ('SQL Error: ' . mysqli_error($conn));
 ?>
