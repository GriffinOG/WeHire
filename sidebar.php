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

  <style media="screen">
  .img-container{
    width: 100%;
    align-items: center;
    justify-content: space-around;
    margin: 0 auto;
    overflow: hidden;
    padding: 10px 0;
    align-items: center;
    justify-content: space-around;
    display: flex;
    float: none;
  }
    .img-circle{
      border-radius: 50%;
    }
  </style>
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

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Careers For You
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">Home
      </li>
    </ol>

    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4">
        <div class="img-container">
          <img src="img/defavatar.png" style="margin:0px 15px 15px 15px" class="img-circle" height="100" width="100" alt="Avatar">
        </div>
        <button onclick="window.location.href = 'graduateprofileedit.php';" type="button" class="btn btn-primary btn-lg btn-block" style="font-size: 18px; margin-bottom:10px"><i class="fa fa-pen" style="font-size:16px; margin-right:10px"></i>Edit Profile</button>


        <div class="list-group">
          <a href="graduatecv.php" class="list-group-item">Curriculum Vitae</a>
          <a href="transcriptpg.php" class="list-group-item">Transcript</a>
          <a href="services.html" class="list-group-item">Applications</a>
          <a href="contact.html" class="list-group-item">Starred</a>
        </div>
      </div>
      <!-- Content Column -->
      <div class="col-lg-9 mb-4">
        <h2>Recommendations</h2>
        <?php
        $listedJobs = array();
        $i = 0;
        include('jobrecommend.php');
        $jobName = " ";
        $companyName = " ";
        $jobDescription = " ";
        while ($unitRow = mysqli_fetch_array($unitQuery)) {
          $unitName = $unitRow['unitName'];
          while ($jobRow = mysqli_fetch_array($jobQuery)) {
            $jobQueryString = $jobRow['query'];
            if (strpos($jobQueryString, $unitName) !== false) {
              $jobID = $jobRow['jobID'];
              if (!in_array($jobID,$listedJobs)) {
                $listedJobs[$i++] = $jobID;
                $jobName = $jobRow['jobName'];
                $companyName = $jobRow['companyName'];
                $jobDescription = $jobRow['description'];
                echo '<div class="card mb-4" id="'.$jobID.'">';
                echo '<img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">';
                echo '<div class="card-body">';
                echo '<h2 class="card-title" style="margin-bottom: 0px">'.$jobName.'</h2>';
                echo '<h6>'.$companyName.'</h6>';
                echo '<p class="card-text"  style="margin-top: 10px">'.substr($jobDescription,0,300).'</p>
                <a id="'.$jobID.'" onclick="jobClick(id)" class="btn btn-primary" style = "color:white">Read More &rarr;</a>
              </div>
              <div class="card-footer text-muted">
                Posted on January 1, 2017
              </div>
            </div>';
              }
            }
          }
        }
        while ($courseRow = mysqli_fetch_array($courseQuery)) {
          $courseName = $courseRow['courseName'];
          while ($jobRow = mysqli_fetch_array($jobQuery)) {
            $jobQueryString = $jobRow['query'];
            if (strpos($jobQueryString, $courseName) !== false) {
              $jobID = $jobRow['jobID'];
              if (!in_array($jobID,$listedJobs)) {
                $listedJobs[$i++] = $jobID;
                $jobName = $jobRow['jobName'];
                $companyName = $jobRow['companyName'];
                $jobDescription = $jobRow['description'];
                echo '<div class="card mb-4" id="'.$jobID.'">';
                echo '<img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">';
                echo '<div class="card-body">';
                echo '<h2 class="card-title" style="margin-bottom: 0px">'.$jobName.'</h2>';
                echo '<h6>'.$companyName.'</h6>';
                echo '<p class="card-text"  style="margin-top: 10px">'.substr($jobDescription,0,300).'</p>
                <a id="'.$jobID.'" onclick="jobClick(id)" class="btn btn-primary" style = "color:white">Read More &rarr;</a>
              </div>
              <div class="card-footer text-muted">
                Posted on January 1, 2017
              </div>
            </div>';
              }
            }
          }
        }
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

  <script type="text/javascript">
    function jobClick(id) {
      var jobid = id;
      var queryString = "?jobid=" + jobid;
      window.location.href = "jobdescription.php" + queryString;
    }
  </script>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
