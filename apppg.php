<?php
include('appdetails.php');
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Application</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/mystyle.css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <style media="screen">
  </style>
</head>

<body>
  <!-- Navigation -->
  <?php include('companynav.php'); ?>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <?php
    echo '<h1 class="mt-4 mb-3">Application
      <small>by
        <a href="#" id = "'.$graduateID.'"  onclick="graduateClick(id)">'.$graduateName.'</a>
      </small>
    </h1>
'; ?>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="companyhome.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Application</li>
    </ol>

    <div class="row">


      <!-- Content Column -->
      <div id="app" class="col-lg-8">

        <!-- Content -->

        <?php

       echo '<p>'.nl2br($appText).'</P>';

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

        <div class="my-4 text-center">
          <img src="avatars/<?php echo $graduateAvatar; ?>" style="margin:0px 15px 15px 15px" class="img-circle" height="150" width="150" alt="Avatar">
          <h3><?php echo $graduateName; ?></h3>
        </div>
        <div class="card my-4">
          <h5 class="card-header">Graduate Contacts</h5>
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
    function graduateClick(id) {
      var graduateid = id;
      var queryString = "?graduateid=" + graduateid;
      window.location.href = "graduateprofile.php" + queryString;
    }
  </script>
</body>

</html>
