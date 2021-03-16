<?php
include('dbcon.php');

if (isset($_SESSION['login_userid'])) {
	$companyID = $conn->real_escape_string($_SESSION['login_userid']);
}
$companySql = "SELECT `companyName`, `companyPic`, `established`, `about`, `email`, `city`, `country`, `address`, `password`, `phone`, `website`,`criterion`
FROM `company_tbl`
WHERE `companyID`=$companyID";

$companyQuery = mysqli_query($conn, $companySql);

if (!$companyQuery) {
  die ('SQL Error: ' . mysqli_error($conn));
};

$row = mysqli_fetch_assoc($companyQuery) or die(mysqli_error($conn));

if ($companyQuery = mysqli_query($conn, $companySql)) {
  /* fetch associative array */
  while ($row = mysqli_fetch_assoc($companyQuery)) {
      $companyName = $row['companyName'];
			$companyPic = $row['companyPic'];
      $established = $row['established'];
      $about = $row['about'];
      $email = $row['email'];
      $city = $row['city'];
      $country = $row['country'];
      $address = $row['address'];
      $phone = $row['phone'];
      $website = $row['website'];
			$criterion = $row['criterion'];
  }
}

$jobSql = "SELECT `jobID`,`jobName`, `pic`, `companyID`, `categoryID`, `description`
FROM `job_tbl`
WHERE `job_tbl`.`companyID`=$companyID";

$jobQuery = mysqli_query($conn, $jobSql);

if (!$jobQuery) {
  die ('SQL Error: ' . mysqli_error($conn));
};

// $jobRow = mysqli_fetch_assoc($jobQuery) or die(mysqli_error($conn));
 ?>
