<?php
include('jobdetails.php');
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Job Description</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <style media="screen">
  </style>
</head>

<body>
  <!-- Navigation -->
  <?php include('graduatenav.php'); ?>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <?php
    echo '<h1 class="mt-4 mb-3">'.$jobName.'
      <small>by
        <a href="#" id = "'.$companyID.'"  onclick="companyClick(id)">'.$companyName.'</a>
      </small>
    </h1>
'; ?>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item active">Job Description</li>
    </ol>

    <div class="row">


      <!-- Post Content Column -->
      <div id="jobDescription" class="col-lg-8">

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

        <hr>

        <!-- Date/Time -->
        <p>Posted on January 1, 2017 at 12:00 PM</p>

        <hr>

        <!-- Post Content -->
        <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p> -->

        <?php

       echo '<p>'.$jobDescription.'</P>';

        ?>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <!-- <div class="card mb-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div> -->

        <!-- Job application Widget -->
        <button id="<?php echo $jobID; ?>" onclick="applyJob(id)" type="button" class="btn btn-primary btn-lg btn-block" style="font-size: 18px; margin-bottom:0px"><i class="fa fa-envelope" style="font-size:16px; margin-right:10px"></i>Apply</button>

        <div class="card my-4">
          <h5 class="card-header">Company Contacts</h5>
          <div class="card-body" style="padding:0px">
            <div class="row">
              <div class="col-lg-12">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <i class="fa fa-envelope" style="padding:5px"></i>
                    <a href="#"><?php echo $email; ?></a>
                  </li>
                  <li class="list-group-item">
                    <i class="fa fa-phone" style="padding:5px"></i>
                    <?php echo $phone; ?>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Company contacts Widget -->
        <div class="card my-4">
          <h5 class="card-header">More About Company</h5>
          <div class="card-body" style="padding:0px">
            <div class="row">
              <div class="col-lg-12">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <i class="fa fa-building" style="padding:5px"></i>
                    <?php echo '<a id = "'.$companyID.'"  onclick="companyClick(id)"  href="#">'.$companyName.'</a>'  ?>
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

  <script type="text/javascript">
    function companyClick(id) {
      var companyid = id;
      var queryString = "?companyid=" + companyid;
      window.location.href = "companyprofile.php" + queryString;
    }
    function applyJob(id) {
      var jobid = id;
      var queryString = "?jobid=" + jobid;
      window.location.href = "jobapplication.php" + queryString;
    }
  </script>
</body>

</html>
