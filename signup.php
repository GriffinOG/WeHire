<?php
include 'dbcon.php';
$ciname =$_POST['ciname'];
$ciemail =$_POST['ciemail'];
$ciacctype =$_POST['ciacctype'];
$cicountry =$_POST['cicountry'];
$cicity =$_POST['cicity'];
$cipass =$_POST['cipass'];
$phone =$_POST['phone'];

if($ciacctype=="Institution")
{
  $sql="INSERT INTO school_tbl (`schoolName`, `email`, `city`, `country`, `password`, `phone`) VALUES
  ('$ciname','$ciemail','$cicity','$cicountry','$cipass','$phone')";
}else {
  $sql="INSERT INTO company_tbl (`companyName`, `email`, `city`, `country`, `password`, `phone`) VALUES
  ('$ciname','$ciemail','$cicity','$cicountry','$cipass','$phone')";
}

mysqli_query($conn,$sql) or die(mysqli_error($conn));
?>
