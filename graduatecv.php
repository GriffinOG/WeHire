<?php
include('session.php');

if (isset($_SESSION['login_userid'])) {
	$graduateID = $conn->real_escape_string($_SESSION['login_userid']);
}

include('graduatedetails.php');
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
  <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="js/bootstrap.min.js"></script>

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


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

    .form-control {
    border: 0;
  }
  </style>
</head>

<body>
  <!-- Navigation -->
  <?php include('graduatenav.php'); ?>
  <!-- Page Content -->
  <div class="container">

    <ol class="breadcrumb" style="margin-top:10px">
      <li class="breadcrumb-item">
        <a href="graduatehome.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Curriculum Vitae</li>
  </ol>

    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4 h-100">
        <div class="img-container">
          <img src="img/defavatar.png" style="margin:15px" class="img-circle" height="100" width="100" alt="Avatar">
        </div>

        <div class="list-group">
					<a href="graduatehome.php" class="list-group-item">Recommended</a>
          <a href="graduatecv.php" class="list-group-item active">Curriculum Vitae</a>
          <a href="transcriptpg.php" class="list-group-item">Transcript</a>
          <a href="graduateapps.php" class="list-group-item">Applications</a>
        </div>
      </div>
      <!-- Content Column -->
      <div class="col-lg-9 mb-4">
        <h2>About me</h2>
        <p style="font-size:20px"><?php echo nl2br($cv); ?></p>
        <button type="button" class="btn btn-outline-primary"
        data-toggle="modal" data-target="#editCv">Edit</button>

        <!-- The Modal -->
        <div class="modal fade" id="editCv">
          <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">About me</h4>
                <button type="button" class="close" data-dismiss="modal" style="float:right">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form action="updatecv.php" method="post">
                  <div class="form-group">
                    <textarea class="form-control" name="cv" rows="5" id="cv"><?php echo $cv ?></textarea>
                    <input class="btn btn-primary" type="submit" value="Submit" style="float:right; margin-top:15px">
                  </div>
                </form>
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
