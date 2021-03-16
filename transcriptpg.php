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

  <title>My Transcript</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <style media="screen">
    .img-circle{
      border-radius: 50%;
      position: relative;
      left: 25%;
    }
  </style>
</head>

<body>

  <!-- Navigation -->
  <?php include('graduatenav.php'); ?>
  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->

    <ol class="breadcrumb" style="margin-top:10px">
      <li class="breadcrumb-item">
        <a href="graduatehome.php">Home</a>
      </li>
      <li class="breadcrumb-item active">My Transcript</li>
    </ol>

    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4">
        <img src="img/defavatar.png" style="margin:15px" class="img-circle" height="100" width="100" alt="Avatar">

        <div class="list-group">
          <a href="graduatehome.php" class="list-group-item">Recommended</a>
          <a href="graduatecv.php" class="list-group-item">Curriculum Vitae</a>
          <a href="transcriptpg.php" class="list-group-item active">Transcript</a>
          <a href="graduateapps.php" class="list-group-item">Applications</a>
        </div>
      </div>
      <!-- Content Column -->
      <div class="col-lg-9 mb-4">
        <h2>Transcript</h2>
        <?php
        include('printtranscript.php');
         ?>
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

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
