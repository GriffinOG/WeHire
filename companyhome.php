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

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Graduates For You
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="companyhome.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Recommendations</li>
    </ol>

    <!-- Content Row -->
    <div class="row">
      <?php include('companydetails.php');
      $graduateSql = $criterion;
      $course = substr($graduateSql, strpos($graduateSql, "\"") + 1);
      $graduateQuery = mysqli_query($conn, $graduateSql);

      if (!$graduateQuery) {
        die ('SQL Error: ' . mysqli_error($conn));
      }
      ?>
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4">
        <div class="card" style="margin-bottom:15px">
          <div id="myimg" style="position:relative">
            <img class="card-img-top" src="companypics/<?php echo $companyPic; ?>" onerror="this.src='img/default.jpg';" alt="company pic">
            <button onclick="window.location.href = 'companyprofileedit.php';" type="button" class="btn btn-primary btn-lg btn-block editProfile" style="font-size:13px; padding:2px"><i class="fas fa-pen fa-xs" style="margin-right:5px"></i>Edit Profile</button>
          </div>

            <div class="list-group list-group-flush" style="border-width:0;">
                <a href="companyhome.php" class="list-group-item active">Recommendations</a>
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
        <h2>Recommendations</h2>
        <?php if ($course!=null) {
          echo '<h5>'.substr($course,0,-1).'</h5>';
        }?>
        <div class="row">
          <?php
          $listedGraduates = array();
          $i = 0;
          while ($row = mysqli_fetch_array($graduateQuery)) {
            $graduateID = $row['graduateID'];
            if (!in_array($graduateID,$listedGraduates)) {
              $listedGraduates[$i++] = $graduateID;
              $graduateAvatar = $row['avatar'];
              $graduateName = $row['graduateName'];
              $cv = $row['cv'];
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
          }
          ?>
        </div>
        <?php
        //For every job, find its criteria and list graduates who meet them as recommended
        if ($jobQuery = mysqli_query($conn, $jobSql)) {
          /* fetch associative array */
          while ($row = mysqli_fetch_assoc($jobQuery)) {
            $listedGraduates = array();
            $i = 0;
            $jobID = $row['jobID'];
            $jobName = $row['jobName'];
            echo "<h5>For " . substr($jobName,0) . "</h5>";
            echo '<div class = "row">';
            $criteriaSql = "SELECT * FROM `criteria_tbl` WHERE `jobID`=$jobID";
            $criteriaQuery = mysqli_query($conn,$criteriaSql) or die('SQL Error: ' . mysqli_error($conn));
            while ($row = mysqli_fetch_assoc($criteriaQuery)) {
              $sql = $row['query'];
              $query = mysqli_query($conn,$sql) or die('SQL Error: ' . mysqli_error($conn));
              while ($gradRow = mysqli_fetch_assoc($query)) {
                $graduateID = $gradRow['graduateID'];
                if (!in_array($graduateID,$listedGraduates)) {
                  $listedGraduates[$i++] = $graduateID;
                  $graduateAvatar = $gradRow['avatar'];
                  $graduateName = $gradRow['graduateName'];
                  $cv = $gradRow['cv'];
                  $DoB = $gradRow['dateOfBirth'];
                  echo '<div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100" style="padding:15px 10px 15px 10px">
                      <div class="text-center">
                        <img src="img/defavatar.png" onerror="this.src=\'img/defavatar.png\';" style="margin:15px" class="img-circle" height="100" width="100" alt="Avatar">
                          <h4 style="margin-bottom:0px">'.$graduateName.'</h4>
                          <p style="margin-bottom:10px">'.$DoB.'</p>
                          <p class="card-text" style="font-size:13px; margin-bottom:10px">'.substr($cv,0,100).'</p>
                          <a id="'.$graduateID.'" onclick="graduateClick(id)" class="btn btn-primary" style = "color:white">Read More &rarr;</a>
                      </div>
                      </div>
                  </div>';
                }
              }
            }
            echo "</div>";
          }
        } ?>
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

</body>

</html>
