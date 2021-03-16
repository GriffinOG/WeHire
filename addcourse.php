<?php
include('session.php');

$gradID = $_GET['graduateid'];
$_SESSION['graduateid'] = $gradID;
if (isset($_SESSION['login_userid'])) {
 $schoolID = $conn->real_escape_string($_SESSION['login_userid']);
}

$coursesSql = "SELECT * FROM `course_tbl` WHERE `schoolID`=$schoolID";

$coursesQuery = mysqli_query($conn, $coursesSql) or die(mysqli_error($conn));

if (!$coursesQuery) {
	die ('SQL Error: ' . mysqli_error($conn));
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Course</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(window).load(function(){
        $('#addCourse').modal('show');
    });
    </script>
  </head>
  <body>
    <!-- The Modal -->
    <div class="modal fade show" id="addCourse" role="dialog">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

          <form action="index.html" method="post">

          </form>
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Course Selection</h4>
            <button type="button" class="close" data-dismiss="modal" style="float:right">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form action="gradeupdate.php" method="get">
              <div class="form-group">
                <label for="courseSelect">Select course:</label>
                <select name="course" class="form-control" id="courseSelect">
                  <?php
                  while ($courseRow = mysqli_fetch_array($coursesQuery)) {
                    $courseID = $courseRow['courseID'];
                    $courseName = $courseRow['courseName'];
                    echo '<option value='.$courseID.'>'.$courseName.'</option>';
                  }
                   ?>
                </select>
              </div>
              <input class="btn btn-primary" type="submit" value="Submit" style="float:right; margin-top:15px">
            </form>
          </div>

        </div>
      </div>
    </div>

  </body>
</html>
