<?php
include('session.php');
include('companydetails.php');
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
  <style media="screen">
    .row{
      margin-bottom: 15px;
    }
  </style>
</head>

<body>
  <!-- Navigation -->
  <?php include('companynav.php'); ?>


  <!-- Page Content -->
  <div class="container">

    <ol class="breadcrumb" style="margin-top:10px">
      <li class="breadcrumb-item">
        <a href="companyhome.php">Home</a>
      </li>
    </ol>

    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4">
        <div class="card" style="margin-bottom:15px">
          <div id="myimg" style="position:relative">
            <img class="card-img-top" src="http://placehold.it/700x400" alt="">
          </div>

            <div class="list-group list-group-flush" style="border-width:0;">
                <a href="companyhome.php" class="list-group-item">Recommendations</a>
                <a href="companyabout.php" class="list-group-item">About Us</a>
                <a href="companyjobs.php" class="list-group-item">Jobs</a>
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
        <h2>Profile Edit</h2>
        <div class="img-container">
          <img id="formpic" class="img-fluid rounded" src="companypics/<?php echo $companyPic; ?>" onerror="this.src='img/default.jpg';" alt="">
        </div>
        <form action="compprofedit.php" method="post" enctype="multipart/form-data">
          <div class="input-group mb-3">
            <div class="custom-file">
              <input onchange="readURL(this);" type="file" name="image" class="custom-file-input" id="inputGroupFile01" required>
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
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="address"><?php echo $address; ?></span>
            </div>
            <input name="address" type="text" class="form-control" placeholder="New Address" aria-label="Address" aria-describedby="address">
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
  <script type="text/javascript" src="js/myscript.js"></script>

</body>

</html>
