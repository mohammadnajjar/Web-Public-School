<?php 
require 'MyConnection.php';
$db = new DB_Connect();
$user_arr = $db->getUsers();

// print_r( $user_arr);

$teacherInfo="";
for($i=0;$i<count($user_arr);$i++){
	$teacherInfo.='<tr>
						        <td>
						        	<img src="images/employee.png" class="card-img img-fluid rounded-circle bg-light mx-auto d-block" alt="">
						        </td>
						        <td>'.$user_arr[$i]["name"].'</td>
						        <td>'.$user_arr[$i]["mobile"].'</td>
						        <td>'.$user_arr[$i]["address"].'</td>
						        <td>
						        	<button class="btn btn-primary ">
						        		<i class="fas fa-list"></i> View details
						        	</button>
						        </td>
						      </tr>';
}
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
			width: 10px;	/*for vertical bar*/
			height: 10px; /*for horizontab bar*/
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
					<a class="nav-link" href=""><i class="fas fa-users"></i></a>
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
		  <h5 class="text-light text-center pt-2"><b>Teachers Profiles</b></h5>
		</div>
	</div>
	<!-- end page title  -->

	<!-- start main cont -->
	<div class="main-cont">
		<div class="row">
			<div class="container">
				<div class="card border-primary mb-3 mt-5 main-card">
					<div class="card-header bg-primary text-light ">
					  <h5 class="mr-auto d-inline-block"><i class="fas fa-user"></i> Teacher Info.</h5>
					</div>
				  <div class="card-body">
				   	<div class="table-responsive">
				   		<table class="table table-bordered mb-3 text-center text-muted marksheet-table" >
						    <thead class="thead-light">
						      <tr>
						        <th>Photo</th>
						        <th>Name</th>
						        <th>Address</th>
						        <th>Parent Name</th>
						        <th>Available Action</th>
						      </tr>
						    </thead>
						    <tbody>
						      
						    <?php echo $teacherInfo ?>

						    </tbody>
						  </table>
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