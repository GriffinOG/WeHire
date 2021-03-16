<?php include('session.php'); ?>
<html>
</<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Student Registration</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
  </head>
  <body style="background:url(img/background.jpg)">
    <div class="container">
    <br>  <p class="text-center">Register a student or update their grade</a></p>
    <hr>


    <div class="row justify-content-center">
    <div class="col-md-6">
    <div class="card">
    <header class="card-header">
      <a href="graduatereglist.php" class="float-right btn btn-outline-primary mt-1">Registered Graduates</a>
      <h4 class="card-title mt-2">Graduate Registration</h4>
    </header>
    <article class="card-body">
    <form action="graduatereg.php" method="post">
      <div class="form-group">
        <label>School Registration</label>
          <input id="schoolID" type="text" class="form-control" placeholder="Registration number" name="schoolID">
      </div> <!-- form-group end.// -->
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>First name </label>
          <input id="fname" type="text" class="form-control" placeholder="Your first name" name="firstName">
        </div>
        <div class="form-group col-md-6">
          <label>Last name </label>
          <input id="lname" type="text" class="form-control" placeholder="Your last name" name="lastName">
        </div>
      </div> <!-- form-row end.// -->

      <!-- form-group end.// -->
      <div class="form-group">
        <label>Date of Birth </label>
        <input id="DoB" type="date" class="form-control" placeholder="Your date of birth" name="DoB">
      </div> <!-- form-group end.// -->
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Email address</label>
          <input type="email" class="form-control" placeholder="Email" name="email">
        </div>
        <div class="form-group col-md-6">
          <label>Phone</label>
            <input class="form-control" type="tel" name="phone">
        </div>
      </div> <!-- form-group end.// -->
      <div class="form-group">
        <label>Create password</label>
          <input class="form-control" type="password" name="password">
      </div> <!-- form-group end.// -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block"> Register  </button>
        </div> <!-- form-group// -->
        <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>
    </form>
    </article> <!-- card-body end .// -->
    </div> <!-- card.// -->
    </div> <!-- col.//-->

    </div> <!-- row.//-->


    </div>
    <!--container end.//-->

    <br><br>

  </body>
</html>
