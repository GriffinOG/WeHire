<?php
include('session.php');
include('schoolcourses.php');

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
       <li class="breadcrumb-item">
         <a href="graduateregistrationform.php">Home</a>
       </li>
       <li class="breadcrumb-item active">Our Courses</li>
     </ol>

     <!-- Content Row -->
     <div class="row" style="margin-top:10px">
       <!-- Sidebar Column -->
       <div class="col-lg-3 mb-4" style="height: 100%">
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
           <h2 style="display:inline">Our Courses</h2>
           <button style="display:inline; float:right; font-size: 18px; margin-bottom:0px"
           data-toggle="modal" data-target="#addCourse" type="button" class="btn btn-primary">
           <i class="fa fa-plus" style="font-size:16px; margin-right:10px"></i>New</button>
         </div>

         <!-- The Modal -->
         <div class="modal fade" id="addCourse">
           <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
             <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                 <h4 class="modal-title">New Course</h4>
                 <button type="button" class="close" data-dismiss="modal" style="float:right">&times;</button>
               </div>

               <!-- Modal body -->
               <div class="modal-body">
                 <form action="newcourse.php" method="post">
                     <div class="form-group">
                       <label>Course name </label>
                       <input id="cname" type="text" class="form-control" placeholder="Course name" name="course">
                     </div>
                     <div class="form-group">
                       <label>Category</label>
                       <select id="category" class="form-control" name="category" placeholder="Category">
                         <?php
                         include('allcategories.php');
                         while ($row = mysqli_fetch_assoc($categoryQuery)) {
                           echo '<option value = "'.$row['categoryID'].'">'.$row['categoryName'].'</option>';
                         } ?>
                       </select>
                     </div>
                      <input type="hidden" id="schoolID" name="schoolID" value="<?php echo $userID; ?>">
                     <input class="btn btn-primary" type="submit" value="Submit" style="float:right; margin-top:10px">
                 </form>
               </div>

             </div>
           </div>
         </div>
         <?php
          echo '<table class="table">
          <thead class="thead-light">
            <tr>
              <th>COURSE ID</th>
              <th>COURSE NAME</th>
              <th>ACTION</th>
             </tr>
           </thead>
         <tbody>';
         while ($row = mysqli_fetch_assoc($courseQuery)) {
           $courseID = $row['courseID'];
           $courseName = $row['courseName'];
           echo '<tr>';
           echo '<td>'.$courseID.'</td>';
           echo '<td>'.$courseName.'</td>';
           echo '<td><button id="'.$courseID.'" type="button" onclick="courseClick(id)" class="btn btn-primary">Edit Units</button>
           <button type="button" class="btn btn-danger">Drop</button></td>';
           echo '</tr>';
         }
         echo '</tbody></table>';
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
