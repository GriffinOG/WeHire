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
      <?php include('companydetails.php'); ?>
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4">
        <div class="card" style="margin-bottom:15px">
          <div id="myimg" style="position:relative">
            <img class="card-img-top" src="companypics/<?php echo $companyPic; ?>" onerror="this.src='img/default.jpg';" alt="">
            <button onclick="window.location.href = 'companyprofileedit.php';" type="button" class="btn btn-primary btn-lg btn-block editProfile" style="font-size:13px; padding:2px"><i class="fas fa-pen fa-xs" style="margin-right:5px"></i>Edit Profile</button>
          </div>
            <div class="list-group list-group-flush" style="border-width:0;">
                <a href="companyhome.php" class="list-group-item">Recommendations</a>
                <a href="companyabout.php" class="list-group-item">About Us</a>
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
        <div class="header" style="margin-bottom:10px">
          <h2 style="display:inline">Our Jobs</h2>
          <button style="display:inline; float:right" onclick="window.location.href = 'addjob.php';" type="button" class="btn btn-primary" style="font-size: 18px; margin-bottom:0px"><i class="fa fa-plus" style="font-size:16px; margin-right:10px"></i>New</button>
        </div>

        <div class="row">
          <?php
          if ($jobQuery = mysqli_query($conn, $jobSql)) {
            /* fetch associative array */
            while ($row = mysqli_fetch_assoc($jobQuery)) {
              $jobID = $row['jobID'];
              $jobPic = $row['pic'];
                $jobName = $row['jobName'];
                $description = $row['description'];
                echo '<div class="col-lg-6 portfolio-item">
                  <div class="card">
                    <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                    <div class="card-body">
                      <h4 class="card-title">
                        <a href="#" id="'.$jobID.'" onclick="jobClick(id)">'.$jobName.'</a>
                      </h4>
                      <p class="card-text">'.substr($description,0,200).'</p>
                    </div>
                  </div>
                </div>';
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
    function graduateClick(id) {
      var graduateid = id;
      var queryString = "?graduateid=" + graduateid;
      window.location.href = "graduateprofile.php" + queryString;
    }
  </script>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
