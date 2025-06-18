<html>
<head>
	<title>Contract</title>
</head>

<body>
	<form>
	<h3 align="center"><font color="#0000FF">Contract</font></h3>

	<table align="center" border="1">
	<tr>
		<th><font color="#0000FF">Test Drive ID</font></th>
		<th><font color="#0000FF">Test Drive Date</font></th>
		<th><font color="#0000FF">Test Drive Time</font></th>
		<th><font color="#0000FF">Test Drive Status</font></th>
		<th><font color="#0000FF">Car Plate Number</font></th>
		<th><font color="#0000FF">Customer Email</font></th>
		<th><font color="#0000FF">Employee ID</font></th>
		<th colspan="2"><font color="#0000FF">Action</font></th>
	</tr>

	<?php
	// Connection to the server and datbase
	$dbc = mysqli_connect ("localhost","root","","yau_auto_database");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: ".mysqli_connect_error();
	}
	$sql = "select * from testdrive";
	$result = mysqli_query($dbc, $sql);
	while($row = mysqli_fetch_assoc($result))
	{
		Print '
		<tr>
			<td><font color="#0000FF">'.$row['IDTDrive'].'</font></td>
			<td><font color="#0000FF">'.$row['TDrDate'].'</font></td>
			<td><font color="#0000FF">'.$row['TDrTime'].'</font></td>
			<td><font color="#0000FF">'.$row['TDrStatus'].'</font></td>
			<td><font color="#0000FF">'.$row['CarPlatNumber'].'</font></td>
			<td><font color="#0000FF">'.$row['CusEmail'].'</font></td>
			<td><font color="#0000FF">'.$row['IDEmployee'].'</font></td>
			<td><a href="fupdTestDrive.php?IDTDrive='.$row['IDTDrive'].' & " class="btn btn-warning" role="button">Update</a></td>
		</tr>';
	}
	?>
	</table>
	</form>
</body>
</html>