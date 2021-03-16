<?php
include('session.php');
if (isset($_SESSION['login_userid'])) {
	$companyID = $conn->real_escape_string($_SESSION['login_userid']);
}

//Check if file has been uploaded
if (!empty($_FILES['image']['name'])) {
	$target_dir = "companypics/";
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
		$image = $companyID . '.' . $imageFileType;
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
					$sql = "UPDATE `company_tbl` SET `companyPic` = '$image' WHERE `company_tbl`.`companyID` = $companyID";
					// execute query
					mysqli_query($conn, $sql);

			} else {
					echo "Sorry, there was an error uploading your file.";
			}
	}
	header("Location: graduatehome.php");

}
if (!empty($_POST['email'])) {
	$email = $_POST['email'];
	$sql = "UPDATE `company_tbl` SET `email` = '$email' WHERE `company_tbl`.`companyID` = $companyID";
	mysqli_query($conn,$sql) or die(mysqli_error($conn));
	header("Location: companyhome.php");

}

if (!empty($_POST['phone'])) {
	$phone = $_POST['phone'];
	$sql = "UPDATE `company_tbl` SET `phone` = '$phone' WHERE `company_tbl`.`companyID` = $companyID";
	mysqli_query($conn,$sql) or die(mysqli_error($conn));
	header("Location: companyhome.php");

}

if (!empty($_POST['address'])) {
	$address = $_POST['address'];
	$sql = "UPDATE `company_tbl` SET `address` = '$address' WHERE `company_tbl`.`companyID` = $companyID";
	mysqli_query($conn,$sql) or die(mysqli_error($conn));
	header("Location: companyhome.php");

}

?>
