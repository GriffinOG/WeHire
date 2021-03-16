<?php
   include('dbcon.php');
   session_start();

   $user_check = $_SESSION['login_userid'];

   $query = "SELECT `graduateName` AS `name`
   FROM `graduate_tbl` WHERE `graduateID`='$user_check'
   UNION
   SELECT `schoolName` AS `name`
   FROM `school_tbl` WHERE `schoolID`='$user_check'
   UNION
   SELECT `companyName` AS `name`
   FROM `company_tbl` WHERE `companyID`='$user_check'";

   $sess_sql = mysqli_query($conn,$query);

   $row = mysqli_fetch_array($sess_sql,MYSQLI_ASSOC) or die(mysqli_error($conn));

   $login_session = $row['name'];

   if(!isset($user_check)){
      header("location:login.php");
      die();
   }
?>
