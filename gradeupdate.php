<?php
include('session.php');
$courseID = $_GET['course'];
if (isset($_SESSION['graduateid'])) {
  $graduateID = $conn->real_escape_string($_SESSION['graduateid']);
}

$gradDetails = "SELECT `graduateName`
FROM `graduate_tbl`
WHERE `graduateID`=$graduateID";

$r=mysqli_query($conn,$gradDetails);

while ($row = mysqli_fetch_assoc($r)) {
    // printf ("%s (%s)\n", $row["id"], $row["email"]);

    $graduateName = $row['graduateName'];
}

$unitsSql = "SELECT * FROM `unit_tbl` WHERE `courseID`=$courseID ORDER BY `year`,`semester`";
$unitsQuery=mysqli_query($conn,$unitsSql);

 ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>Grade Update</title>

   <!-- Bootstrap core CSS -->
   <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

   <!-- Custom styles for this template -->
   <link href="css/modern-business.css" rel="stylesheet">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
 	<link rel="stylesheet" href="css/mystyle.css">

 </head>

 <body>
   <!-- Navigation -->
   <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
     <div class="container">
       <a class="navbar-brand" href="graduatehome.php">WeHire</a>
       <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <!-- <div class="collapse navbar-collapse" id="navbarResponsive">
         <ul class="navbar-nav ml-auto">
           <li class="nav-item">
             <a class="nav-link" href="about.html">New</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="services.html">Trending</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="contact.html">Companies</a>
           </li>
           <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Suggest By
             </a>
             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
               <a class="dropdown-item" href="portfolio-1-col.html">Units</a>
               <a class="dropdown-item" href="portfolio-2-col.html">Course</a>
               <a class="dropdown-item" href="portfolio-3-col.html">Category</a>
             </div>
           </li>
         </ul>
       </div> -->
     </div>
   </nav>

   <!-- Page Content -->
   <div class="container">

     <ol class="breadcrumb" style="margin-top:10px">
       <li class="breadcrumb-item">Home</li>
     </ol>

     <!-- Content Row -->
     <div class="row" style="margin-top:10px">
       <!-- Sidebar Column -->
       <div class="col-lg-3 mb-4" style="height: 100%">
         <div class="list-group">
           <a href="graduateregistrationform.php" class="list-group-item">Graduate Registration</a>
           <a href="gradeupdate.php" class="list-group-item active">Grade Update</a>
           <a href="graduatelist.php" class="list-group-item">Registered Graduates</a>
           <a href="courselist.php" class="list-group-item">Our Courses</a>
         </div>
       </div>
       <!-- Content Column -->
       <div class="col-lg-9 mb-4">
         <h2><?php echo $graduateName; ?></h2>
         <form action="gradeupdt.php" method="post">
           <?php
             $year = -1;
             $sem = -1;
             while ($unitRow = mysqli_fetch_assoc($unitsQuery)) {
                 // printf ("%s (%s)\n", $row["id"], $row["email"]);

                 if (($sem != -1 && $sem != $unitRow['semester'])||
                 ($year != -1 && $year != $unitRow['year'])) {
                     echo '</tbody>';
                     echo '</table>';
                     echo "<br><br>";
                 }

                 if ($sem != $unitRow['semester']||
                 $year != $unitRow['year']) {
                     echo '<table class="table">';
                     if ($year!=$unitRow['year']) {
                       $year = $unitRow['year'];
                       $sem = -1;
                       echo '<h6 class="title" style="margin:7px;  text-align: center;">Year '.$year.'</h6>';
                     }
                     echo '<thead class="thead-light">';
                     echo '<tr>';
                     echo '<th>UNIT CODE</th>';
                     echo '<th>UNIT NAME</th>';
                     echo '<th>GRADE</th>';
                     echo '</tr>';
                     echo '</thead>';
                     echo '<tbody>';

                     $sem = $unitRow['semester'];
                 }

                 echo '<tr>';
                 echo '<td>'.$unitRow['unitCode'].'</td>';
                 echo '<td>'.$unitRow['unitName'].'</td>';
                 echo '<td><div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" name="'.$unitRow['unitCode'].'" id="inlineRadio1" value="A">
                       <label class="form-check-label" for="inlineRadio1">A</label>
                     </div>
                     <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" name="'.$unitRow['unitCode'].'" id="inlineRadio2" value="B">
                       <label class="form-check-label" for="inlineRadio2">B</label>
                     </div>
                     <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" name="'.$unitRow['unitCode'].'" id="inlineRadio3" value="C">
                       <label class="form-check-label" for="inlineRadio3">C</label>
                     </div>
                     <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" name="'.$unitRow['unitCode'].'" id="inlineRadio3" value="D">
                       <label class="form-check-label" for="inlineRadio3">D</label>
                     </div></td>';
                 echo '</tr>';
             }
             echo '</tbody>';
             echo '</table>';
             echo '<input class="btn btn-primary" type="submit" value="Submit" style="float:right; margin-top:15px">';
            ?>
         </form>

       </div>
     </div>
     <!-- /.row -->

   </div>
   <!-- /.container -->

   <!-- Footer -->
   <footer class="py-5 bg-dark">
     <div class="container">
       <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
     </div>
     <!-- /.container -->
   </footer>

   <!-- Bootstrap core JavaScript -->
   <script src="vendor/jquery/jquery.min.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 </body>

 </html>
