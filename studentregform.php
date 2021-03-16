<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/formstyle.css">
    <title>Student Registration</title>
  </head>
  <body>
    <div class="container">
      <div class="topnav">
        <a class="active" href="studentregform.php">Student Registration</a>
        <a href="courseupdateform.php">Grade Update</a>
      </div>
      <form action="studentreg.php" method="post">
        <div class="row">
          <div class="col-100">
            <label for="fname">First Name</label>
          </div>
          <div class="col-100">
            <input type="text" id="fname" name="firstName" placeholder="Your name..">
          </div>
        </div>
        <div class="row">
          <div class="col-100">
            <label for="lname">Last Name</label>
          </div>
          <div class="col-100">
            <input type="text" id="lname" name="lastName" placeholder="Your last name..">
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-25">
            <label for="country">Country</label>
          </div>
          <div class="col-75">
            <select id="country" name="country">
              <option value="australia">Australia</option>
              <option value="canada">Canada</option>
              <option value="usa">USA</option>
            </select>
          </div>
        </div> -->
        <div class="row">
          <div class="col-100">
            <label for="DoB">Date of Birth</label>
          </div>
          <div class="col-100">
            <input type="date" id="DoB" name="DoB" placeholder="Your date of birth..">
          </div>
        </div>
        <div class="row">
          <div class="col-100">
            <label for="email">Email</label>
          </div>
          <div class="col-100">
            <input type="email" id="email" name="email" placeholder="Your email..">
          </div>
        </div>
        <div class="row">
          <div class="col-100">
            <label for="password">Password</label>
          </div>
          <div class="col-100">
            <input type="password" id="password" name="password" placeholder="Your password..">
          </div>
        </div>
        <div class="row">
          <div class="col-100">
            <label for="phone">Phone</label>
          </div>
          <div class="col-100">
            <input type="tel" id="phone" name="phone" placeholder="Your phone number..">
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-25">
            <label for="subject">Subject</label>
          </div>
          <div class="col-75">
            <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
          </div>
        </div> -->
        <div class="row">
          <input type="submit" value="Submit">
        </div>
      </form>
    </div>
  </body>
</html>
