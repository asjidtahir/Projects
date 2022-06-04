<!DOCTYPE html>
<html>
<head>
	<title>LMS</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		#side_bar{
  			background-color: whitesmoke;
  			padding: 50px;
  			width: 300px;
  			height: 450px;
  		}
  	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Hospital Management System(HMS)</a>
			</div>
		</div>
	</nav>
    <section class="h-100 h-custom" style="background-color: #8fc4b7;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">
              <div class="card rounded-3">
               <!-- <img src="detail.png"> -->
                <div class="card-body p-4 p-md-5">
                  <h3>Enter Patient Detail</h3>
			
			<form action="register.php" method="post">
				<div class="form-group">
					<label for="name">First Name:</label>
					<input type="text" name="First_Name" class="form-control" required>
				</div>
                <div class="form-group">
					<label for="name">Last Name:</label>
					<input type="text" name="Last_Name" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="name">Gender</label>
					<input type="text" name="Gender" class="form-control" required>
				</div>
			
				<div class="form-group">
					<label for="name">Phone Number</label>
					<input type="text" name="Phone_no" class="form-control" required>
				</div>
                <div class="form-group">
					<label for="name">Date of Birth</label>
					<input type="text" name="P_DOB" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="name">Address:</label>
					<textarea rows="3" cols="40" class="form-control" name="Address"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Register</button>
			</form>
			</div>
            </div>
          </div>
        </div>
      </section>

</body>
</html>