<head>
  <title>User Login</title>
  <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>



<div class="container">
<br>  <p class="text-center">Sign up as Company/Institution or log in as either Graduate or Company</a></p>
<hr>


<div class="row justify-content-center">
<div class="col-md-6">
<div class="card">
<header class="card-header">
  <a href="signupform.php" class="float-right btn btn-outline-primary mt-1">Sign up</a>
	<h4 class="card-title mt-2">Log in</h4>
</header>
<article class="card-body">
<form action="login.php" method="post">
	<div class="form-group">
		<label>Email address</label>
		<input type="email" class="form-control" placeholder="" name="ciemail">
	</div> <!-- form-group end.// -->

	<div class="form-group">
		<label>Password</label>
	    <input class="form-control" type="password" name="cipass">
	</div> <!-- form-group end.// -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Log in  </button>
    </div> <!-- form-group// -->
</form>
</article> <!-- card-body end .// -->
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div>
<!--container end.//-->

<br><br>
