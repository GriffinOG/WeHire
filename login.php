<?php
include('dbcon.php');
session_start();
$ciemail =$_POST['ciemail'];
$cipass =$_POST['cipass'];

$sql = "SELECT `companyID` AS `id`, `email`, `password` FROM `company_tbl`
WHERE `email`='$ciemail' AND `password`='$cipass'
UNION
SELECT `schoolID` AS `id`,`email`, `password` FROM `school_tbl`
WHERE `email`='$ciemail' AND `password`='$cipass'
UNION
SELECT `graduateID` AS `id`,`email`, `password` FROM `graduate_tbl`
WHERE `email`='$ciemail' AND `password`='$cipass'";

$r=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($r) or die(mysqli_error($conn));

//Now to check, we use an if() statement
if($row = 1) {
 print "\nRecord exists";
 if ($r=mysqli_query($conn,$sql)) {
   /* fetch associative array */
   while ($row = mysqli_fetch_assoc($r)) {
       // printf ("%s (%s)\n", $row["id"], $row["email"]);

       $ciid=$row["id"];
       $ciemail = $row["email"];
   }
   goToHomepage($ciid);
}
  } else {
    print "\nInvalid email or password";
    header( "Location: loginform.php" );
}

function goToHomepage($id)
{
  if($id>500000)
  {
    // session_register("myid");
    $_SESSION['login_userid'] = $id;
    header("Location: graduatehome.php");
    exit();
  }elseif ($id>300000) {
    // session_register("myid");
    $_SESSION['login_userid'] = $id;
    header("Location: companyhome.php");
    exit();
  }elseif ($id>100000) {
    // session_register("myid");
    $_SESSION['login_userid'] = $id;
    header("Location: graduateregistrationform.php");
    exit();
  }
}
 ?>
