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

  <title>My Applications</title>

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
  <?php include('graduatenav.php'); ?>

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
          <img src="avatars/<?php echo $graduateAvatar; ?>" style="margin:0px 15px 15px 15px" class="img-circle" height="100" width="100" alt="Avatar">
        </div>
        <button onclick="window.location.href = 'graduateprofileedit.php';" type="button" class="btn btn-primary btn-lg btn-block" style="font-size: 18px; margin-bottom:10px"><i class="fa fa-pen" style="font-size:16px; margin-right:10px"></i>Edit Profile</button>


        <div class="list-group">
					<a href="graduatehome.php" class="list-group-item">Recommended</a>
          <a href="graduatecv.php" class="list-group-item">Curriculum Vitae</a>
          <a href="transcriptpg.php" class="list-group-item">Transcript</a>
          <a href="graduateapps.php" class="list-group-item active">Applications</a>
        </div>
      </div>
      <!-- Content Column -->
      <div class="col-lg-9 mb-4">
        <h2>Recommendations</h2>
        <div class="row">
          <?php
          while ($appRow = mysqli_fetch_assoc($appsQuery)) {
            $appID = $appRow['appID'];
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
                    <h4 style="margin:5px">'.$name.'</h4>
                    <a id="'.$appID.'" onclick="appClick(id,'.$appJobID.')" class="btn btn-primary" style = "color:white">Read More &rarr;</a>
                  </div>
                  </div>
              </div>';
            }

          } ?>
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

  <script type="text/javascript">
    function appClick(appid, jobid) {
      var appid = appid;
      var queryString = "?appid=" + appid + "&jobid=" + jobid;
      window.location.href = "appreview.php" + queryString;
    }
  </script>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
