<html>
<head>
	<title>Car List</title>
</head>

<body>
	<form>
	<h3 align="center"><font color="#0000FF">Car Details</font></h3>
	<table align="center" border="1">
	<tr>
		<th><font color="#0000FF">CarPLateNumber</font></th>
		<th><font color="#0000FF">CarBrand</font></th>
		<th><font color="#0000FF">CarModel</font></th>
		<th><font color="#0000FF">CarYear</font></th>
		<th><font color="#0000FF">CarColour</font></th>
		<th><font color="#0000FF">CarRemarks</font></th>
		<th><font color="#0000FF">CarPrice</font></th>
		<th><font color="#0000FF">CarStatus</font></th>
		<th colspan="2"><font color="#0000FF">Action</font></th>
	</tr>

	<?php
	// Connection to the server and datbase
	$dbc = mysqli_connect ("localhost","root","","yau_auto_database");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: ".mysqli_connect_error();
	}
	$sql = "select * from car";
	$result = mysqli_query($dbc, $sql);
	while($row = mysqli_fetch_assoc($result))
	{
		Print '
		<tr>
			<td><font color="#0000FF">'.$row['CarPLateNumber'].'</font></td>
			<td><font color="#0000FF">'.$row['CarBrand'].'</font></td>
			<td><font color="#0000FF">'.$row['CarModel'].'</font></td>
			<td><font color="#0000FF">'.$row['CarYear'].'</font></td>
			<td><font color="#0000FF">'.$row['CarColour'].'</font></td>
			<td><font color="#0000FF">'.$row['CarRemarks'].'</font></td>
			<td><font color="#0000FF">'.$row['CarPrice'].'</font></td>
			<td><font color="#0000FF">'.$row['CarStatus'].'</font></td>
			<td><a href="fupdcar.php?fCarPLateNumber='.$row['CarPLateNumber'].' & " class="btn btn-warning" role="button">Update</a></td>
			<td><a href="fdelcar.php?fCarPLateNumber='.$row['CarPLateNumber'].'" class="btn btn-danger" role="button">Delete</a></td>
		</tr>';
	}
	?>
	</table>
	</form>
</body>
</html>