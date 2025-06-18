<html>
<head>
</head>

<body>

<?php
$IDTDrive = $_GET['IDTDrive'];

// Connection to the server and datbase
$dbc = mysqli_connect ("localhost","root","","yau_auto_database");
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: ".mysqli_connect_error();
}
$sql = "select * from testdrive where IDTDrive = '$IDTDrive'";
$result = mysqli_query($dbc,$sql);

// to display the details error
if (false === $result)
{
	echo mysql_error();
}

$row = mysqli_fetch_assoc($result)
?>

	<form action="testdriveUpdateProcess.php?IDTDrive=<?php echo $IDTDrive;?>" method="post">
	<h2 align="center">Update Test Drive Record</h2>
	<table align="center" border="1">
	<tr>
		<h3><td>Test Drive ID</td>
		<td><input type="text" name="IDTDrive" value='<?=$row['IDTDrive'];?>' disabled></td></h3>
	</tr>
	<tr>
		<td>Test Drive Date</td>
		<td><input type="text" name="TDrDate" value='<?=$row['TDrDate'];?>'></td>
	</tr>
	<tr>
		<td>Test Drive Time</td>
		<td><input type="text" name="TDrTime" value='<?=$row['TDrTime'];?>'></td>
	</tr>
	<tr>
		<td>Test Drive Status</td>
		<td><input type="text" name="TDrStatus" value='<?=$row['TDrStatus'];?>'></td>
	</tr>
	<tr>
		<td>Car Plate Number</td>
		<td><input type="text" name="CarPlatNumber" value='<?=$row['CarPlatNumber'];?>'></td>
	</tr>
	<tr>
		<td>Customer Email</td>
		<td><input type="text" name="CusEmail" value='<?=$row['CusEmail'];?>'></td>
	</tr>
	<tr>
		<td>Employee ID</td>
		<td><input type="text" name="IDEmployee" value='<?=$row['IDEmployee'];?>'></td>
	</tr>
	<tr>
		<td colspan="2"><center><input type="submit" value="Update" onClick="return confirm('Are you sure?')"><input type="button" value="Cancel" onclick="window.location.href='listTestDrive.php';"></center></td>
	</tr>
	</table>
	</form>
</body>
</html>