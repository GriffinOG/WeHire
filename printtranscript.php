<?php
include('dbcon.php');

if (isset($_SESSION['login_userid'])) {
	$userID = $conn->real_escape_string($_SESSION['login_userid']);
} else {
	$userID = $graduateID;
}
$sql = "SELECT `grade_tbl`.`unitCode`,`unit_tbl`.`unitName`,
`grade_tbl`.`grade`,`unit_tbl`.`semester`,
`unit_tbl`.`year`, `course_tbl`.`courseName`
FROM `grade_tbl`,`unit_tbl`,`graduate_tbl`,`course_tbl`
WHERE `grade_tbl`.`unitCode`=`unit_tbl`.`unitCode`
AND `unit_tbl`.`courseID`=`course_tbl`.`courseID`
AND `grade_tbl`.`graduateID`=$userID
AND `grade_tbl`.`graduateID`=`graduate_tbl`.`graduateID`
ORDER BY `course_tbl`.`courseName`, `unit_tbl`.`year`, `unit_tbl`.`semester`";

$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<html>
<head>
	<style class="col-lg-9 mb-4">

	/* table {
		margin: auto;
		font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
		font-size: 12px;
	} */

	/* h1 {
		margin: 25px auto 0;
		text-align: center;
		text-transform: uppercase;
		font-size: 17px;
	} */

	table td {
		transition: all .5s;
	}

	/* Table */
	.data-table {
		border-collapse: collapse;
		font-size: 14px;
		min-width: 537px;
	}

	.data-table th,
	.data-table td {
		border: 1px solid #e1edff;
		padding: 7px 17px;
	}
	/* .data-table caption {
		margin: 7px;
	} */

	.table-caption {

	}

	/* Table Header */
	.data-table thead th {
		background-color: #508abb;
		color: #FFFFFF;
		border-color: #6ea1cc !important;
		text-transform: uppercase;
	}

	/* Table Body */
	.data-table tbody td {
		color: #353535;
	}
	.data-table tbody td:first-child,
	.data-table tbody td:nth-child(4),
	.data-table tbody td:last-child {
		text-align: right;
	}

	.data-table tbody tr:nth-child(odd) td {
		background-color: #f4fbff;
	}
	.data-table tbody tr:hover td {
		background-color: #ffffa2;
		border-color: #ffff0f;
	}

	/* Table Footer */
	.data-table tfoot th {
		background-color: #e5f5ff;
		text-align: right;
	}
	.data-table tfoot th:first-child {
		text-align: left;
	}
	.data-table tbody td:empty
	{
		background-color: #ffcccc;
	}

	</style>
</head>
<body>
		<?php
    $courseName = " ";
    $year = -1;
    $sem = -1;
		while ($row = mysqli_fetch_array($query))
		{
          if (($sem != -1 && $sem != $row['semester'])||
          ($year != -1 && $year != $row['year'])||
          ($courseName != " " && $courseName != $row['courseName'])) {
              echo '</tbody>';
              echo '</table>';
              echo "<br><br>";
          }

          if ($sem != $row['semester']||
          $year != $row['year']||
          $courseName != $row['courseName']) {
              echo '<table class="data-table" style="margin: auto;
							font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
							font-size: 12px">';
              if ($courseName!=$row['courseName']) {
                $courseName = $row['courseName'];
                $year = -1;
                $sem = -1;
                echo '<h1 style="margin: 25px auto 0;
								text-align: center;
								text-transform: uppercase;
								font-size: 17px">'.$courseName.'</h1>';
              }
              if ($year!=$row['year']) {
                $year = $row['year'];
                $sem = -1;
                echo '<h6 class="title" style="margin:7px;  text-align: center;">Year '.$year.'</h6>';
              }
              echo '<thead>';
              echo '<tr>';
              echo '<th>UNIT CODE</th>';
              echo '<th>UNIT NAME</th>';
              echo '<th>GRADE</th>';
              echo '</tr>';
              echo '</thead>';
              echo '<tbody>';

              $sem = $row['semester'];
          }

          echo '<tr>';
          echo '<td>'.$row['unitCode'].'</td>';
          echo '<td>'.$row['unitName'].'</td>';
          echo '<td>'.$row['grade'].'</td>';
          echo '</tr>';
       }

      echo '</tbody>';
      echo '</table>';
      ?>
</body>
</html>
