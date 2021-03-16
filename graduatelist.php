<?php
include('session.php');
if (isset($_SESSION['login_userid'])) {
	$schoolID = $conn->real_escape_string($_SESSION['login_userid']);
}
include('graduatesbyschool.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Our Graduates</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="css/mystyle.css">

</head>

<body>
  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="graduateregistrationform.php">WeHire</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <ol class="breadcrumb" style="margin-top:10px">
      <li class="breadcrumb-item">
        <a href="graduateregistrationform.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Graduate List</li>
    </ol>

    <!-- Content Row -->
    <div class="row" style="margin-top:10px">
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4" style="height: 100%">
        <div class="list-group">
          <a href="graduateregistrationform.php" class="list-group-item">Graduate Registration</a>
          <a href="gradeupdate.php" class="list-group-item">Grade Update</a>
          <a href="graduatelist.php" class="list-group-item active">Registered Graduates</a>
          <a href="courselist.php" class="list-group-item">Our Courses</a>
        </div>
      </div>
      <!-- Content Column -->
      <div class="col-lg-9 mb-4">
        <h2>Our Graduates</h2>
        <div class="row">
          <?php
          while ($row = mysqli_fetch_assoc($query)) {
            $graduateID = $row['graduateID'];
            $graduateAvatar = $row['avatar'];
            $graduateName = $row['graduateName'];
            $cv = $row['cv'];
            $email = $row['email'];
            $phone = $row['phone'];
            $DoB = $row['dateOfBirth'];
            echo '<div class="col-lg-4 col-sm-6 portfolio-item">
              <div class="card h-100" style="padding:15px 10px 15px 10px">
                <div class="text-center">
                  <img src="avatars/'.$graduateAvatar.'" onerror="this.src=\'img/defavatar.png\';" style="margin:15px" class="img-circle" height="100" width="100" alt="Avatar">
                    <h4 style="margin-bottom:0px">'.$graduateName.'</h4>
                    <p style="margin-bottom:10px">'.$DoB.'</p>
                    <p class="card-text" style="font-size:13px; margin-bottom:10px">'.substr($cv,0,100).'</p>
                    <a id="'.$graduateID.'" onclick="graduateClick(id)" class="btn btn-primary" style = "color:white">Read More &rarr;</a>
                </div>
                </div>
            </div>';
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

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
