<?php

$graduateSql = "SELECT `graduateID`,`graduateSchoolID`, `graduateName`, `avatar`, `dateOfBirth`, `email`, `phone`, `cv`, `years`
FROM `graduate_tbl`
WHERE `graduateID` = $graduateID";

$graduateQuery = mysqli_query($conn, $graduateSql);

if (!$graduateQuery) {
  die ('SQL Error: ' . mysqli_error($conn));
};

$row = mysqli_fetch_assoc($graduateQuery) or die(mysqli_error($conn));

if ($graduateQuery = mysqli_query($conn, $graduateSql)) {
  /* fetch associative array */
  while ($row = mysqli_fetch_assoc($graduateQuery)) {
    $graduateID = $row['graduateID'];
    $graduateAvatar = $row['avatar'];
      $graduateName = $row['graduateName'];
      $cv = $row['cv'];
      $email = $row['email'];
      $phone = $row['phone'];
      $DoB = $row['dateOfBirth'];
  }
}

$appSql = "SELECT * FROM `sent_apps_tbl` WHERE `graduateID`=$graduateID";
$appsQuery = mysqli_query($conn, $appSql) or die ('SQL Error: ' . mysqli_error($conn));
 ?>
