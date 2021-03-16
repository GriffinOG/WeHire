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
      <a class="navbar-brand" href="index.html">WeHire</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
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
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <ol class="breadcrumb" style="margin-top:10px">
      <li class="breadcrumb-item">Home
      </li>
    </ol>

    <!-- Content Row -->
    <div class="row">
      <?php include('companydetails.php'); ?>
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4">
        <div class="card" style="margin-bottom:15px">
          <div id="myimg"  style="position:relative">
            <img class="card-img-top" src="http://placehold.it/700x400" alt="">
            <button onclick="window.location.href = 'companyprofileedit.php';" type="button" class="btn btn-primary btn-lg btn-block editProfile" style="font-size:13px; padding:2px"><i class="fas fa-pen fa-xs" style="margin-right:5px"></i>Edit Profile</button>
          </div>
          <div class="list-group list-group-flush" style="border-width:0;">
          <a href="companyhome.php" class="list-group-item">Recommendations</a>
          <a href="companyjobs.php" class="list-group-item active">Jobs</a>
          <a href="companyapplications.php" class="list-group-item">Applications</a>
          </div>
        </div>

        <div class="card" style="margin-bottom:15px">
          <h4 class="card-header">Contacts</h4>
          <div class="card-body" style="padding:0px">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <i class="fa fa-phone" style="padding:5px"></i>
                <?php echo $phone; ?>
              </li>
              <li class="list-group-item">
                <i class="fa fa-envelope" style="padding:5px"></i>
                <a href="#"><?php echo $email; ?></a>
              </li>
              <li class="list-group-item">
                <i class="fa fa-globe" style="padding:5px"></i>
                <a href="#"><?php echo $website; ?></a>
              </li>
            </ul>
          </div>
        </div>

        <div class="card">
          <h4 class="card-header">location</h4>
          <div class="card-body" style="padding:0px">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <i class="fa fa-mail-bulk" style="padding:5px"></i>
                <?php echo $address; ?>
              </li>
              <li class="list-group-item">
                <i class="fa fa-city" style="padding:5px"></i>
                <?php echo $city; ?>
              </li>
              <li class="list-group-item">
                <i class="fa fa-flag" style="padding:5px"></i>
                <?php echo $country; ?>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Content Column -->
      <div class="col-lg-9 mb-4">
        <h2>New Job</h2>
        <div class="img-container">
          <img id="formpic" class="img-fluid rounded" src="http://placehold.it/900x300" alt="">
        </div>
        <form action="newjob.php" method="post" enctype="multipart/form-data">
          <div class="input-group mb-3">
            <div class="custom-file">
              <input onchange="readURL(this);" type="file" name="image" class="custom-file-input" id="inputGroupFile01" required>
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>
          <div class="form-group">
            <label>Name</label>
              <input id="jobName" class="form-control" type="text" name="jobName" placeholder="Job name">
          </div> <!-- form-group end.// -->
          <label>Facilitator</label>
          <div class="form-row">
            <div class="form-group col-md-3">
              <select id="salutation" class="form-control" placeholder="Salutation" name="salutation">
                <option>Ms</option>
                <option>Mr</option>
                <option>Mrs</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <input id="facilitatorName" type="text" class="form-control" placeholder="Name" name="facilitatorName">
            </div>
          </div> <!-- form-row end.// -->
          <label>Selection</label>
          <div class="form-row mb-3">
            <div class="input-group col-md-6">
              <div class="input-group-prepend">
                <span class="input-group-text" id="email">Course</span>
              </div>
              <select id="course" class="form-control" name="course" placeholder="Course">
                <?php
                $courseSql = "SELECT * FROM `course_tbl`";
                $courseQuery = mysqli_query($conn,$courseSql) or die(mysqli_error($conn));
                while ($row = mysqli_fetch_assoc($courseQuery)) {
                  echo '<option>'.$row['courseName'].'</option>';
                } ?>
              </select>
            </div>
            <div class="input-group col-md-6">
              <div class="input-group-prepend">
                <span class="input-group-text" id="email">Unit</span>
              </div>
              <select id="unit" class="form-control" name="unit" placeholder="Unit">
                <?php
                $unitSql = "SELECT * FROM `unit_tbl`";
                $unitQuery = mysqli_query($conn,$unitSql) or die(mysqli_error($conn));
                while ($row = mysqli_fetch_assoc($unitQuery)) {
                  echo '<option>'.$row['unitName'].'</option>';
                } ?>
              </select>
            </div>
            <small style="margin:5px; color:#0191FF">This input is required to make recommendations. They may be left blank.</small>
          </div> <!-- form-row end.// -->
          <div class="form-group">
            <label>Category</label>
              <select id="category" class="form-control" name="category" placeholder="Category">
                <?php
                $categorySql = "SELECT * FROM `category_tbl`";
                $categoryQuery = mysqli_query($conn,$categorySql) or die(mysqli_error($conn));
                while ($row = mysqli_fetch_assoc($categoryQuery)) {
                  echo '<option value = "'.$row['categoryID'].'">'.$row['categoryName'].'</option>';
                } ?>
              </select>
          </div> <!-- form-group end.// -->
          <div class="form-group">
            <label>Job Description</label>
              <textarea id="jobDescription" class="form-control" name="jobDescription" rows="15"></textarea>
          </div> <!-- form-group end.// -->
          <input class="btn btn-primary" type="submit" value="Add" style="float:right">
        </form>
      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; WeHire 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- <script type="text/javascript">
    function graduateClick(id) {
      var graduateid = id;
      var queryString = "?graduateid=" + graduateid;
      window.location.href = "graduateprofile.php" + queryString;
    }
  </script> -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/myscript.js"></script>

</body>

</html>
