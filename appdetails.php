<?php
include('dbcon.php');

$appID = $_GET['appid'];

$appSql = "SELECT `sent_apps_tbl`.`appID`,`graduate_tbl`.`avatar`,`graduate_tbl`.`graduateID`,`graduate_tbl`.`graduateName`,`graduate_tbl`.`email`,
`graduate_tbl`.`phone`,`jobID`, `sent_apps_tbl`.`text`
            FROM `graduate_tbl`,`sent_apps_tbl`
            WHERE `sent_apps_tbl`.`graduateID` = `graduate_tbl`.`graduateID`
            AND `appID`='$appID'";

$appQuery = mysqli_query($conn, $appSql);

if (!$appQuery) {
  die ('SQL Error: ' . mysqli_error($conn));
}

$row=mysqli_fetch_assoc($appQuery) or die(mysqli_error($conn));

if ($appQuery = mysqli_query($conn, $appSql)) {
  /* fetch associative array */
  while ($row = mysqli_fetch_assoc($appQuery)) {
    $appID = $row['appID'];
      $graduateID = $row['graduateID'];
      $graduateAvatar = $row['avatar'];
      $graduateName = $row['graduateName'];
      $phone = $row['phone'];
      $email = $row['email'];
      $jobID = $row['jobID'];
      $appText = $row['text'];
  }
} ?>
