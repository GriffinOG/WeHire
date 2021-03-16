<?php
include('dbcon.php');
$graduateID = $_GET['graduateid'];
include('graduatedetails.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Graduate Profile</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link rel="stylesheet" href="css/mystyle.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>

<body>
  <!-- Navigation -->
  <?php include('companynav.php'); ?>


  <!-- Page Content -->
  <div class="container">

    <!-- Content Row -->
    <div class="row" style="margin-top:20px">
      <!-- Sidebar Column -->
      <div class="col-lg-4 mb-4">
        <div class="text-center">
          <img src="img/defavatar.png" style="margin:15px" class="img-circle" height="100" width="100" alt="Avatar">
          <h3><?php echo $graduateName; ?></h3>
          <p><?php echo $DoB; ?></p>
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
            </ul>
          </div>
        </div>
      </div>
      <!-- Content Column -->
      <div class="col-lg-8 mb-4">
        <div class="card">
          <h4 class="card-header">About me</h4>
          <div class="card-body">
            <p class="card-text"><?php echo nl2br($cv); ?></p>
          </div>
        </div>
        <?php include('printtranscript.php'); ?>
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
