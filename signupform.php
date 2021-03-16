<html>
</<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Company/Institution Registration</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
  </head>
  <body>
    <div class="container">
    <br>  <p class="text-center">Sign up as Company or log in as either Graduate or Company</a></p>
    <hr>


    <div class="row justify-content-center">
    <div class="col-md-6">
    <div class="card">
    <header class="card-header">
      <a href="loginform.php" class="float-right btn btn-outline-primary mt-1">Log in</a>
      <h4 class="card-title mt-2">Sign up</h4>
    </header>
    <article class="card-body">
    <form action="signup.php" method="post">
      <div class="form-group">
        <label>Company/Institution name </label>
        <input type="text" class="form-control" placeholder="" name="ciname">
      </div> <!-- form-group end.// -->
      <div class="form-group">
        <label>Email address</label>
        <input type="email" class="form-control" placeholder="" name="ciemail">
        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div> <!-- form-group end.// -->
      <div class="form-group">
        <label>Account type</label>
        <select id="inputState" class="form-control" name="ciacctype">
          <option>Company</option>
          <option>Institution</option>
        </select>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Country</label>
          <select id="inputState" class="form-control" name="cicountry">
            <option> Choose...</option>
              <option selected="">Kenya</option>
              <option>Uzbekistan</option>
              <option>Russia</option>
              <option>United States</option>
              <option>India</option>
              <option>Afganistan</option>
          </select>
        </div> <!-- form-group end.// -->
        <div class="form-group col-md-6">
          <label>City</label>
          <input type="text" class="form-control" name="cicity">
        </div> <!-- form-group end.// -->
      </div> <!-- form-row.// -->
      <div class="form-group">
        <label>Create password</label>
          <input class="form-control" type="password" name="cipass">
      </div> <!-- form-group end.// -->
      <div class="form-group">
        <label>Phone</label>
          <input class="form-control" type="tel" name="phone">
      </div> <!-- form-group end.// -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block"> Register  </button>
        </div> <!-- form-group// -->
        <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>
    </form>
    </article> <!-- card-body end .// -->
    <div class="border-top card-body text-center">Have an account? <a href="">Log In</a></div>
    </div> <!-- card.// -->
    </div> <!-- col.//-->

    </div> <!-- row.//-->


    </div>
    <!--container end.//-->

    <br><br>

  </body>
</html>
