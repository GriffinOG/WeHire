<?php
include('dbcon.php');
$companyID = $_GET['companyid'];
$companySql = "SELECT `companyName`, `established`, `about`, `email`, `city`, `country`, `address`, `password`, `phone`, `website`
FROM `company_tbl`
WHERE `companyID`=$companyID";

$companyQuery = mysqli_query($conn, $companySql);

if (!$companyQuery) {
  die ('SQL Error: ' . mysqli_error($conn));
};

$row = mysqli_fetch_assoc($companyQuery) or die(mysqli_error($conn));

if ($companyQuery = mysqli_query($conn, $companySql)) {
  /* fetch associative array */
  while ($row = mysqli_fetch_assoc($companyQuery)) {
      $companyName = $row['companyName'];
      $established = $row['established'];
      $about = $row['about'];
      $email = $row['email'];
      $city = $row['city'];
      $country = $row['country'];
      $address = $row['address'];
      $phone = $row['phone'];
      $website = $row['website'];
  }
}

$jobSql = "SELECT `jobID`,`jobName`, `pic`, `companyID`, `categoryID`, `description`
FROM `job_tbl`
WHERE `job_tbl`.`companyID`=$companyID";

$jobQuery = mysqli_query($conn, $jobSql);

if (!$jobQuery) {
  die ('SQL Error: ' . mysqli_error($conn));
};

$row = mysqli_fetch_assoc($jobQuery) or die(mysqli_error($conn));

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $companyName; ?></title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles -->
  <link href="css/modern-business.css" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


</head>

<body>

  <!-- Navigation -->
  <?php include('graduatenav.php'); ?>
  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('http://placehold.it/1900x1080')">
          <div class="carousel-caption d-none d-md-block">
            <h3><?php echo $companyName; ?></h3>
            <p>Established <?php echo $established; ?></p>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container" style="margin-top:30px">
    <!-- Marketing Icons Section -->
    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
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
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">About company</h4>
          <div class="card-body">
            <p class="card-text"><?php echo substr($about,0,300); ?></p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
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
      </div>
    </div>
    <!-- /.row -->

    <!-- Portfolio Section -->
    <h2>Available Jobs</h2>

    <div class="row">
      <?php
      if ($jobQuery = mysqli_query($conn, $jobSql)) {
        /* fetch associative array */
        while ($row = mysqli_fetch_assoc($jobQuery)) {
          $jobID = $row['jobID'];
          $jobPic = $row['pic'];
            $jobName = $row['jobName'];
            $description = $row['description'];
            echo '<div class="col-lg-4 col-sm-6 portfolio-item">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#" id="'.$jobID.'" onclick="jobClick(id)">'.$jobName.'</a>
                  </h4>
                  <p class="card-text">'.substr($description,0,270).'</p>
                </div>
              </div>
            </div>';
        }
      }
       ?>

    <!-- /.row -->
  </div>
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; WeHire 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
    function jobClick(id) {
      var jobid = id;
      var queryString = "?jobid=" + jobid;
      window.location.href = "jobdescription.php" + queryString;
    }
  </script>
</body>

</html>
