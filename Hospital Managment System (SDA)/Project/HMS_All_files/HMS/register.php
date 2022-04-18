<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"hms");
	$query = "insert into Patient values(null,'$_POST[First_Name]','$_POST[Last_Name]','$_POST[Gender]','$_POST[Phone_no]','$_POST[P_DOB]','$_POST[Address]')";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Registration successfully....You may login now.")
	window.location.href = "Receptionlist.php"; 
</script>