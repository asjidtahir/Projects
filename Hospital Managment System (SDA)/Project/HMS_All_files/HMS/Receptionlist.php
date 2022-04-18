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
		  background-image: url('abcd.jpg');
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

	<form action="appointment.php" method="post">
	<div class="col d-flex justify-content-center">
  <div class="row">
  	<div class="col-md-4">
	  <div class="card" style="width: 18rem;">
		<img class="card-img-top" src="pictures/aaa.png" alt="Card image cap">
    <div class="card">
	  <div class="card-header">Create Appointment</div>
	  <div class="card-body">
	  <button type="submit" name="login" class="btn btn-primary">Create Appointment</button>	
      </div>
    </div>
  </div>
  </form>
</div>
</div><br><br>
  

<form action="Doctor_portal.php" method="post">
	<div class="col d-flex justify-content-center">
  <div class="row">
	<div class="col-md-4">
	  <div class="card" style="width: 18rem;">
		<img class="card-img-top" src="pictures/b.png" alt="Card image cap">
    <div class="card">
	  <div class="card-header">Doctor Portal</div>
	  <div class="card-body">
	  <button type="submit" name="login" class="btn btn-primary">View Doctor Portal</button>	
      </div>
    </div>
  </div>
  </form>
</div>
</div>
<br><br>
  

<form action="view_patients_detail.php" method="post">
	<div class="col d-flex justify-content-center">
  <div class="row">
	<div class="col-md-4">
	  <div class="card" style="width: 18rem;">
		<img class="card-img-top" src="pictures/c.png" alt="Card image cap">
    <div class="card">
	  <div class="card-header">Patients Detail</div>
	  <div class="card-body">
	  <button type="submit" name="login" class="btn btn-primary">View Patients Detail</button>	
      </div>
    </div>
  </div>
  </form>
  
</body>
</html>