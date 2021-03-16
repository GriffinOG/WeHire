<?php
include('session.php');
if (isset($_SESSION['login_userid'])) {
	$companyID = $conn->real_escape_string($_SESSION['login_userid']);
}

$jobName = $_POST['jobName'];
$facilitarorStatus = $_POST['salutation'];
$facilitator = $_POST['facilitatorName'];
$courseName = $_POST['course'];
$unitName = $_POST['unit'];
$categoryID = $_POST['category'];
$description = $_POST['jobDescription'];

$picName = $companyID . $_POST['jobName'];
//Check if file has been uploaded
if (!empty($_FILES['image']['name'])) {
	$target_dir = "jobpics/";
	$image = $_FILES["image"]["name"];
	$target_file = $target_dir . basename($image);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// Check if image file is a actual image or fake image
	$check = getimagesize($_FILES["image"]["tmp_name"]);
	if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
	} else {
			echo "File is not an image.";
			$uploadOk = 0;
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		$image = $picName . '.' . $imageFileType;
			$target_file = $target_dir . $image;
			$uploadOk = 1;
	}
	// Check file size
	// if ($_FILES["image"]["size"] > 500000) {
	//     echo "Sorry, your file is too large.";
	//     $uploadOk = 0;
	// }
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
			if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
					echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
					$sql = "INSERT INTO `job_tbl`(`jobName`, `facilitarorStatus`, `facilitator`, `pic`, `companyID`, `categoryID`, `vacancy`, `description`)
          VALUES ('$jobName','$facilitarorStatus','$facilitator','$target_file','$companyID','$categoryID','vacant','$description')";
					// execute query
					$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
					if ($query) {
						$jobSql = "SELECT `jobID` FROM `job_tbl` WHERE `jobName`='$jobName' AND `companyID`=$companyID";
						$jobQuery = mysqli_query($conn,$jobSql) or die(mysqli_error($conn));
						if ($jobQuery) {
							while ($jobRow = mysqli_fetch_assoc($jobQuery)) {
								$jobID = $jobRow['jobID'];
								if (isset($courseName)) {
									$courseSql = "SELECT DISTINCTROW `graduate_tbl`.`graduateID`,`graduate_tbl`.`cv`,`graduate_tbl`.`dateOfBirth`, `graduate_tbl`.`graduateID`,`graduate_tbl`.`avatar`,
									`graduate_tbl`.`graduateName`,`graduate_tbl`.`cv`,
									`graduate_tbl`.`dateOfBirth`
									FROM `graduate_tbl`,`grade_tbl`,`unit_tbl`,`course_tbl`
									WHERE `grade_tbl`.`graduateID`=`graduate_tbl`.`graduateID`
									AND `grade_tbl`.`unitCode`=`unit_tbl`.`unitCode`
									AND `unit_tbl`.`courseID`=`course_tbl`.`courseID`
									AND `course_tbl`.`courseName`='$courseName'";
									$criteriaSql = "INSERT INTO `criteria_tbl`(`jobID`, `query`) VALUES ($jobID,'$courseSql')";
									mysqli_query($conn,$criteriaSql) or die(mysqli_error($conn));
								}
								if (isset($unitName)) {
									$unitSql = "SELECT `graduate_tbl`.`graduateID`,`graduate_tbl`.`cv`,`graduate_tbl`.`dateOfBirth`,`graduate_tbl`.`graduateName`,`graduate_tbl`.`avatar`,`graduate_tbl`.`email`,`graduate_tbl`.`phone`
									FROM `graduate_tbl`,`grade_tbl`,`unit_tbl`
									WHERE `grade_tbl`.`graduateID`=`graduate_tbl`.`graduateID`
									AND `grade_tbl`.`unitCode`=`unit_tbl`.`unitCode`
									AND `unit_tbl`.`unitName`='$unitName'";
									$criteriaSql = "INSERT INTO `criteria_tbl`(`jobID`, `query`) VALUES ($jobID,'$unitSql')";
									mysqli_query($conn,$criteriaSql) or die(mysqli_error($conn));
								}
							}
						}
					}

			} else {
					echo "Sorry, there was an error uploading your file.";
			}
	}
	header("Location: companyjobs.php");

}

?>
