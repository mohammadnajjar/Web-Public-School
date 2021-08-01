<?php 
require 'MyConnection.php';
$db = new DB_Connect();
$courses_arr = $db->getCourses();

// print_r( $courses_arr);

$coursesList='<ul class="courseList list-group text-muted mb-3">';

foreach ($courses_arr as $key => $course) {
	$coursesList.='<li courseId="'.$course["id"].'" class="courseItem list-group-item d-flex justify-content-between align-items-center">
					    '.$course["courseName"].'<span class="badge badge-dark">'.$course["sessionCount"].'</span>
					  </li>';
}
$coursesList.='</ul>';
?>

<!DOCTYPE html>
<html>
<head>
 	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Visions Ins.</title>

	<!-- Bootstrap CSS -->

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<style type="text/css">
		/*scroll in mywebsite*/
		::-webkit-scrollbar{
			width: 10px;
			height: 3px;
		}
		::-webkit-scrollbar-track{
			box-shadow: inset 0 0 5px lightblue;
			border-radius: 5px;
		}
		::-webkit-scrollbar-thumb{
			background: #ffc107;
			border-radius: 5px;
		}
		::-webkit-scrollbar-thumb:hover{
			background: #08526d;
		}
	</style>
</head>
<body>

	<!-- start navbar -->
	<div class="header container">
		<nav class="navbar navbar-light  navbar-expand-sm">
		  <a class="navbar-brand" href="index.html">
		    <img src="images/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
		    <b>Web Public School</b>
		  </a>
		  <ul class="navbar-nav  ml-auto">
				<li class="nav-item col-xs-3">
				    <a class="nav-link mt-0" href="index.html"><i class="fas fa-home"></i></a>
			    </li>
			    <li class="nav-item col-xs-3">
				    <a class="nav-link" href="courses.php"><i class="fas fa-book"></i></a>
				</li>
				<li class="nav-item col-xs-3">
					<a class="nav-link" href="http://localhost/web_course_2/institute_proj/teacher.php"><i class="fas fa-users"></i></a>
				</li>
				<!-- Dropdown -->
				<li class="nav-item dropdown  col-xs-3">
					<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
					    <i class="fas fa-user"></i>
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#"></a>
						<a class="dropdown-item" href="#">Preferences</a>
						<a class="dropdown-item" href="#">Log out</a>
					</div>
			    </li>
			</ul>
		</nav>
	</div>
	<!-- end navbar -->

	<!-- start page title -->
	<div class="row bg-warning">
  		<div class="container">
		  <h5 class="text-light text-center pt-2"><b>Available Courses</b></h5>
		</div>
	</div>
	<!-- end page title  -->

	<!-- start main cont -->
	<div class="main-cont">
		<div class="container">
			<div class="row mt-5">
				<div class="col-xs-12 col-md-4">
					<h4 class="text-light bg-primary px-3 py-3 rounded mb-0"> Courses</h4>
					<!-- <ul class="courseList list-group text-muted mb-3">
					  <li course="C#" class="courseItem list-group-item d-flex justify-content-between align-items-center">
					    C#
					    <span class="badge badge-dark">10</span>
					  </li>
					  <li course="C++" class="courseItem list-group-item d-flex justify-content-between align-items-center">
					    C++
					    <span class="badge badge-dark">20</span>
					  </li>
					  <li course="Web" class="courseItem list-group-item d-flex justify-content-between align-items-center">
					    Web
					    <span class="badge badge-dark">15</span>
					  </li>
					  <li course="Android" class="courseItem list-group-item d-flex justify-content-between align-items-center">
					    Android
					    <span class="badge badge-dark">15</span>
					  </li>
					  <li course="PLC" class="courseItem list-group-item d-flex justify-content-between align-items-center">
					    PLC
					    <span class="badge badge-dark">7</span>
					  </li>
					</ul> -->
					<?php echo $coursesList;?>
				</div>
				<div class="col-xs-12 col-md-4">
				<div class="card border-primary content-card mb-3">
					<div class="card-header bg-primary text-light ">
					  <h5 class="mr-auto d-inline-block"><i class="fas fa-book"></i> Course Content.</h5>
					</div>
				  <div class="card-body">
					<div id="list-detail" class="list-group"><i class="text-muted">Select a Course to show its content</i></div>
				</div>
				</div>
				</div>
				<div class="col-xs-12 col-md-4">
					<div class="card border-primary session-card">
						<div class="card-header bg-primary text-light ">
						  <h5 class="mr-auto d-inline-block"><i class="fas fa-info-circle"></i> Session Info.</h5>
						</div>
					  <div class="card-body">
						<form>
						  <div class="form-group">
						    <label for="session-title">Title</label>
						    <input type="text" class="form-control" id="session-title" placeholder="Title of Session" required="">
						  </div>
						  <div class="form-group">
						    <label for="session-rank">Rank</label>
						    <input type="number" class="form-control" id="session-rank" placeholder="Rank of Session" required="">
						  </div>
						</form>
						<div class="mb-2">
							<div class="alert alert-danger" role="alert"></div>
					  		<button class="btn btn-primary" id="addSession" ><i class="fa fa-plus-circle"></i> Add</button>
					  		<button class="btn btn-warning text-light" id="updateSession"><i class="fa fa-cogs"></i> Update</button>
					  		<button class="btn btn-danger" id="deleteSession"><i class="fa fa-minus-circle"></i> Delete</button>
					  	</div>
						</div>
					</div>
				</div>
		</div>
	</div>
	<!-- end main cont -->

	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/propper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugin.js"></script>
</body>
</html>	