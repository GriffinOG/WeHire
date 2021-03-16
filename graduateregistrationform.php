<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Home Page</title>

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
      <a class="navbar-brand" href="graduateregistrationform.php">WeHire</a>
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
      <li class="breadcrumb-item active">Graduate Registration</li>
    </ol>

    <!-- Content Row -->
    <div class="row" style="margin-top:10px">
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4" style="height: 100%">
        <div class="list-group">
          <a href="graduateregistrationform.php" class="list-group-item active">Graduate Registration</a>
          <a href="gradeupdate.php" class="list-group-item">Grade Update</a>
          <a href="graduatelist.php" class="list-group-item">Registered Graduates</a>
          <a href="courselist.php" class="list-group-item">Our Courses</a>
        </div>
      </div>
      <!-- Content Column -->
      <div class="col-lg-9 mb-4">
        <h2>New Graduate</h2>
        <form action="graduatereg.php" method="post">
          <div class="form-group">
            <label>School Registration</label>
              <input id="schoolID" type="text" class="form-control" placeholder="Registration number" name="schoolID">
          </div> <!-- form-group end.// -->
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>First name </label>
              <input id="fname" type="text" class="form-control" placeholder="Your first name" name="firstName">
            </div>
            <div class="form-group col-md-6">
              <label>Last name </label>
              <input id="lname" type="text" class="form-control" placeholder="Your last name" name="lastName">
            </div>
          </div> <!-- form-row end.// -->

          <!-- form-group end.// -->
          <div class="form-group">
            <label>Date of Birth </label>
            <input id="DoB" type="date" class="form-control" placeholder="Your date of birth" name="DoB">
          </div> <!-- form-group end.// -->
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Email address</label>
              <input type="email" class="form-control" placeholder="Email" name="email">
            </div>
            <div class="form-group col-md-6">
              <label>Phone</label>
                <input class="form-control" type="tel" name="phone">
            </div>
          </div> <!-- form-group end.// -->
          <div class="form-group">
            <label>Create password</label>
              <input class="form-control" type="password" name="password">
          </div> <!-- form-group end.// -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Register  </button>
            </div> <!-- form-group// -->
            <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our Terms of use and Privacy Policy.</small>
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
