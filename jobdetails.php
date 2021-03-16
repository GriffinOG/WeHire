<?php
include('dbcon.php');

$jobID = $_GET['jobid'];

$jobSql = "SELECT `jobName`,`facilitarorStatus`,`facilitator`, `pic`,`company_tbl`.`companyID`, `company_tbl`.`companyName`, `description`,
`company_tbl`.`email`,`company_tbl`.`phone`,`company_tbl`.`website`,`company_tbl`.`address`,
`company_tbl`.`city`, `company_tbl`.`country`
FROM `job_tbl`,`company_tbl`
WHERE `jobID`=$jobID
AND `job_tbl`.`companyID`=`company_tbl`.`companyID`";

$jobQuery = mysqli_query($conn, $jobSql);

if (!$jobQuery) {
  die ('SQL Error: ' . mysqli_error($conn));
}

$row=mysqli_fetch_assoc($jobQuery) or die(mysqli_error($conn));

if ($jobQuery = mysqli_query($conn, $jobSql)) {
  /* fetch associative array */
  while ($row = mysqli_fetch_assoc($jobQuery)) {
      $jobName = $row['jobName'];
      $facilitarorStatus = $row['facilitarorStatus'];
      $facilitator = $row['facilitator'];
      $companyID = $row['companyID'];
      $companyName = $row['companyName'];
      $jobDescription = $row['description'];
      $email = $row['email'];
      $phone = $row['phone'];
      $website = $row['website'];
      $address = $row['address'];
      $city = $row['city'];
      $country = $row['country'];
  }
} ?>
