<?php
include('dbcon.php');
$categorySql = "SELECT * FROM `category_tbl`";
$categoryQuery = mysqli_query($conn,$categorySql) or die(mysqli_error($conn));
 ?>
