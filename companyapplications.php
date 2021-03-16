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
  <style media="screen">
  .overflow {
    height:150px;
    overflow-y: scroll;
  }
  </style>
</head>

<body>
  <!-- Navigation -->
  <?php include('companynav.php'); ?>


  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Graduates For You
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">Home
      </li>
    </ol>

    <!-- Content Row -->
    <div class="row">
      <?php include('companydetails.php');
      ?>
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4">
        <div class="card" style="margin-bottom:15px">
          <div id="myimg"  style="position:relative">
            <img class="card-img-top" src="companypics/<?php echo $companyPic; ?>" onerror="this.src='img/default.jpg';" alt="">
            <button onclick="window.location.href = 'companyprofileedit.php';" type="button" class="btn btn-primary btn-lg btn-block editProfile" style="font-size:13px; padding:2px"><i class="fas fa-pen fa-xs" style="margin-right:5px"></i>Edit Profile</button>
          </div>
            <div class="list-group list-group-flush" style="border-width:0;">
                <a href="companyhome.php" class="list-group-item">Recommendations</a>
                <a href="companyabout.php" class="list-group-item">About Us</a>
                <a href="companyjobs.php" class="list-group-item">Jobs</a>
                <a href="companyapplications.php" class="list-group-item active">Applications</a>
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
        <h2>Applications</h2>
        <div class="row">
          <?php
          while ($jobRow = mysqli_fetch_assoc($jobQuery)) {
            $jobID = $jobRow['jobID'];
            $appSql = "SELECT `sent_apps_tbl`.`appID`,`graduate_tbl`.`graduateName`,`jobID`, `text`
            FROM `graduate_tbl`,`sent_apps_tbl`
            WHERE `sent_apps_tbl`.`graduateID` = `graduate_tbl`.`graduateID`
            AND `jobID`='$jobID'";
            $appQuery = mysqli_query($conn, $appSql) or die('SQL Error: ' . mysqli_error($conn));
            while ($appRow = mysqli_fetch_assoc($appQuery)) {
              $appID = $appRow['appID'];
              $graduateName = $appRow['graduateName'];
              $appJobID = $appRow['jobID'];
              $appText = $appRow['text'];
              $sql = "SELECT `jobName` FROM `job_tbl` WHERE `jobID`=$appJobID";
              $query = mysqli_query($conn, $sql) or die('SQL Error: ' . mysqli_error($conn));
              while ($row = mysqli_fetch_assoc($query)) {
                $name = $row['jobName'];
                echo '<div class="col-lg-4 col-sm-6">
                  <div class="card h-100" style="padding:15px 10px 15px 10px">
                    <div class="text-center">
                      <div class="overflow border border-primary rounded" style="text-align:left">'.nl2br($appText).'</div>
                      <h4 style="margin:5px">'.$graduateName.'</h4>
                      <a id="'.$appID.'" onclick="appClick(id)" class="btn btn-primary" style = "color:white">Read More &rarr;</a>
                    </div>
                    </div>
                </div>';
              }
            }

          }
           ?>
        </div>

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

  <script type="text/javascript">
    function appClick(id) {
      var appid = id;
      var queryString = "?appid=" + appid;
      window.location.href = "apppg.php" + queryString;
    }
  </script>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
