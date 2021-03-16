<?php
include('session.php');
$courseID = $_GET['courseid'];

$courseName = "";
$courseSql = "SELECT `courseName` FROM `course_tbl` WHERE `courseID`=$courseID";
$courseQuery = mysqli_query($conn,$courseSql) or die('SQL Error: ' . mysqli_error($conn));
while ($courseRow = mysqli_fetch_assoc($courseQuery)) {
  $courseName = $courseRow['courseName'];
}

$unitsSql = "SELECT * FROM `unit_tbl` WHERE `courseID`=$courseID ORDER BY `year`,`semester`";
$unitsQuery=mysqli_query($conn,$unitsSql) or die('SQL Error: ' . mysqli_error($conn));

 ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title><?php echo $courseName; ?> Units</title>

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
       <li class="breadcrumb-item">
         <a href="graduateregistrationform.php">Home</a>
       </li>
       <li class="breadcrumb-item">
         <a href="courselist.php">Our Courses</a>
       </li>
       <li class="breadcrumb-item active">Listed Units</li>
     </ol>

     <!-- Content Row -->
     <div class="row h-100" style="margin-top:10px">
       <!-- Sidebar Column -->
       <div class="col-lg-3 mb-4">
         <div class="list-group">
           <a href="graduateregistrationform.php" class="list-group-item">Graduate Registration</a>
           <a href="gradeupdate.php" class="list-group-item">Grade Update</a>
           <a href="graduatelist.php" class="list-group-item">Registered Graduates</a>
           <a href="courselist.php" class="list-group-item active">Our Courses</a>
         </div>
       </div>
       <!-- Content Column -->
       <div class="col-lg-9 mb-4">
         <div class="header" style="margin-bottom:10px">
           <h2 style="display:inline"><?php echo $courseName; ?></h2>
           <button style="display:inline; float:right; font-size: 18px; margin-bottom:0px"
           onclick="newUnit(<?php echo $courseID; ?>)" type="button" class="btn btn-primary">
           <i class="fa fa-plus" style="font-size:16px; margin-right:10px"></i>New</button>
         </div>

           <?php
           if (mysqli_num_rows($unitsQuery)==0) {
             echo '<p style="text-align:center">There are no units registered under this course</p>';
           }
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
                     echo '<th>ACTION</th>';
                     echo '</tr>';
                     echo '</thead>';
                     echo '<tbody>';

                     $sem = $unitRow['semester'];
                 }

                 echo '<tr>';
                 echo '<td>'.$unitRow['unitCode'].'</td>';
                 echo '<td>'.$unitRow['unitName'].'</td>';
                 echo '<td><button type="button" class="btn btn-danger">Drop</button></td></td>';
                 echo '</tr>';
             }
             echo '</tbody>';
             echo '</table>';
            ?>

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
   <script type="text/javascript" src="js/myscript.js"></script>

 </body>

 </html>
