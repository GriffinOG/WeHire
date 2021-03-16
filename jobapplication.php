<?php
include('jobdetails.php');
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

  <title>Job Application</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <style media="screen">
  .shadow-textarea textarea.form-control::placeholder {
    font-weight: 300;
  }
  .shadow-textarea textarea.form-control {
      padding-left: 0.8rem;
  }
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
      <li class="breadcrumb-item active">Job Application</li>
    </ol>

    <div class="row">
      <div class="col-lg-12">
        <form action="sendapp.php" method="post">
          <div class="form-group shadow-textarea">
						<input type="hidden" id="graduateID" name="graduateID" value="<?php echo $graduateID; ?>">
						<input type="hidden" id="jobID" name="jobID" value="<?php echo $_GET['jobid']; ?>">
						<input type="hidden" id="companyID" name="companyID" value="<?php echo $companyID; ?>">
            <textarea name="app" class="form-control shadow-sm p-6 bg-light" id="exampleFormControlTextarea6" rows="30" placeholder="Write something here...">
<?php echo $facilitator . "\n";
echo $jobName . "\n";
echo $companyName . "\n";
echo $address . "\n";
echo $city . ", " . $country . "\n\n";
$name = explode(" ", $facilitator); //Get facilitator's second name for salutation
echo "Dear " . $facilitarorStatus . ". " . $name[1] . ",\n\n";
echo "Sincerely,\n";
echo $graduateName; ?>
            </textarea>
          </div>
					<input class="btn btn-primary mb-3" type="submit" value="Apply" style="float:right">
        </form>
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
  </script>

</body>

</html>
