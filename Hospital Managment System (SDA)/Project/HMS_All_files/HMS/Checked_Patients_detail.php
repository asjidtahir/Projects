<html>
<head>
 <title>Student Information</title>
 <style type="text/css">
#side_bar{
background-color: whitesmoke;
padding: 50px;
width: 150px;
height: 150px;
}
</style>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3
.1/css/bootstrap.min.css" integrity="sha384-
ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="an
onymous">
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


<?php 
if(isset($_POST['login']))
{
	$username = 'root';
	$password = '';
	// Check connection
	try 
	{
		$conn = new PDO("mysql:host=localhost;dbname=hms", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} 
	catch(PDOException $e) 
	{
		echo "Connection failed: " . $e->getMessage();
	}
	session_start();
	// $roll= $_SESSION['email'];
	$query_1 = $conn->prepare("select * from patient");
	$query_1->execute([]);
	$result = $query_1->fetchAll(PDO::FETCH_ASSOC);
 ?>	
 	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Hospital Management System(HMS)</a>
			</div>
		</div>
	</nav><br>

 </thead>
 <tbody>
	<center><h4>Patients Detail</h4></center>
	<tbody>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<form>
					<table class="table table-striped table-bordered table-hover table-condensed">
						<tr>
							<th>Patient_ID</th>	
							<th>First_Name</th>	
							<th>Last_Name</th>
							<th>Gender</th>
							<th>Mobile No.</th>
							<th>Date of Birth</th>
							<th>Address</th>
							<th>Disease</th>
							<th>Recept</th>
						</tr>
						
						<?php
						
							foreach ($result as $key=>$value)
							{	
								$Patient_ID="";
								$First_Name = "";
								$Last_Name = "";
								$Gender = "";
								$Phone_no = "";
								$P_DOB = "";
								$Address = "";
									$Patient_ID=$value['Patient_ID'];
									$First_Name = $value['First_Name'];
									$Last_Name = $value['Last_Name'];
									$Gender = $value['Gender'];
									$Phone_no = $value['Phone_no'];
									$P_DOB = $value['P_DOB'];
									$Address = $value['Address'];		
									$_SESSION['Patient_ID']=$Patient_ID;									
						?>
							<tr>
								<td><?php echo $Patient_ID;?></td>
								<td><?php echo $First_Name;?></td>
								<td><?php echo $Last_Name;?></td>
								<td><?php echo $Gender;?></td>
								<td><?php echo $Phone_no;?></td>
								<td><?php echo $P_DOB;?></td>
								<td><?php echo $Address;?></td>
								
								<td>
									<div>
										<select class="form-control">
										<option name="Disease" value="Disease">Disease</option>
										<option name="Disease" value="Surgical">Surgical</option>
										<option name="Disease" value="Gyna">Gyna</option>
										<option name="Disease" value="Heart">Heart</option>
										<option name="Disease" value="Emergency">Emergency</option>
										</select>
									</div>
								</td>
								<td>	
									<form action="Receipt.php" method="post">	
									<a href="Receipt.php" formmethod="post" class="btn btn-primary">Receipt</a>
									</form>	
								</td>
							</tr>					
							<?php
							}
							?>
					</table>
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
</tbody>
 <?php
}

?>
<!--<button onclick="window.location.href='Receipt.php'">Continue</button>
	<td> <a href="Receipt.php" class="btn btn-primary">Receipt</a> </td> -->
<!-- <button onclick="window.location.href='Receipt.php'">Continue</button>
<a href="Receipt.php" class="btn btn-primary">Receipt</a>  -->
</body>
</html>