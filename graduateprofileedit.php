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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="css/mystyle.css">

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
    </ol>

    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4" style="height: 100%">
        <div class="list-group">
					<a href="graduatehome.php" class="list-group-item">Recommended</a>
          <a href="graduatecv.php" class="list-group-item">Curriculum Vitae</a>
          <a href="transcriptpg.php" class="list-group-item">Transcript</a>
          <a href="services.html" class="list-group-item">Applications</a>
        </div>
      </div>
      <!-- Content Column -->
      <div class="col-lg-9 mb-4">
        <h2>Profile Edit</h2>
        <div class="img-container">
          <img src="avatars/<?php echo $graduateAvatar; ?>" style="margin:0px 15px 15px 15px" class="img-circle" height="200" width="200" alt="img/defavatar.png">
        </div>
        <form action="upload.php" method="post" enctype="multipart/form-data">
          <div class="input-group mb-3">
            <div class="custom-file">
              <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="email"><?php echo $email; ?></span>
            </div>
            <input name="email" type="email" class="form-control" placeholder="New Email" aria-label="Email" aria-describedby="email">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="phone"><?php echo $phone; ?></span>
            </div>
            <input name="phone" type="phone" class="form-control" placeholder="New Phone Number" aria-label="Phone" aria-describedby="phone">
          </div>
          <input class="btn btn-primary" type="submit" value="Submit" style="float:right">
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

  <script>

  $('#inputGroupFile01').on('change',function(){
              //get the file name
              var fileName = $(this).val();
              //replace the "Choose a file" label
              $(this).next('#custom-file-label').html(fileName);
          })

</script>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
