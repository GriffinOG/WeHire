<?php
include('dbcon.php');
$schoolID = $_POST['schoolID'];
$courseName = $_POST['course'];
$categoryID = $_POST['category'];
$sql = "INSERT INTO `course_tbl`(`courseName`, `schoolID`, `categoryID`) VALUES ('$courseName',$schoolID,$categoryID)";
$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if($query){
  $sql = "SELECT `courseID` FROM `course_tbl` WHERE `courseName`='$courseName' AND `schoolID`=$schoolID";
  $query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
  if ($query) {
    while ($row = mysqli_fetch_assoc($query)) {
      $courseID = $row['courseID'];
    }
  }
  header("Location: editunits.php?courseid=" . $courseID);
}else {
  die('SQL Error: ' . mysqli_error($conn));
}
?>
