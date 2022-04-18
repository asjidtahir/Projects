<!DOCTYPE html>
<html>
<head>
	<title>HMS</title>
	
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		
		 
  	</style>
</head>
<body>
	<style>
		body {
		  background-image: url('abc.jpg');
		}
		</style>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Hospital Management System(HMS)</a>
			</div>
		</div>
	</nav>
	<br>
	<br>

	
  

<form action="View_Available_Doctors.php" method="post">
	<div class="col d-flex justify-content-center">
  <div class="row">
	<div class="col-md-4">
	  <div class="card" style="width: 18rem;">
		<img class="card-img-top" src="pictures/1234.jpg" alt="Card image cap">
    <div class="card">
	  <div class="card-header">Available Doctors Detail</div>
	  <div class="card-body">
	  <button type="submit" name="login" class="btn btn-primary">View Doctors Detail</button>	
      </div>
    </div>
  </div>
  </form>
</div>
</div>
<br><br>
  

<form action="Checked_Patients_detail.php" method="post">
	<div class="col d-flex justify-content-center">
  <div class="row">
	<div class="col-md-4">
	  <div class="card" style="width: 18rem;">
		<img class="card-img-top" src="pictures/c.png" alt="Card image cap">
    <div class="card">
	  <div class="card-header">Check Patients Detail</div>
	  <div class="card-body">
	  <button type="submit" name="login" class="btn btn-primary">View Patients Detail</button>	
      </div>
    </div>
  </div>
  </form>
  
</body>
</html>