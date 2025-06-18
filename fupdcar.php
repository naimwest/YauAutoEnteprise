<html>
<head>
</head>

<body>

<?php
$CarPLateNumber = $_GET['fCarPLateNumber'];

// Connection to the server and datbase
$dbc = mysqli_connect ("localhost","root","","yau_auto_database");
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: ".mysqli_connect_error();
}
$sql = "select * from car where CarPLateNumber = '$CarPLateNumber'";
$result = mysqli_query($dbc,$sql);

// to display the details error
if (false === $result)
{
	echo mysql_error();
}
$row = mysqli_fetch_assoc($result)
?>

	<form action="carupdprocess.php?fCarPLateNumber=<?php echo $CarPLateNumber;?>" method="post">
	<h2 align="center">Update car Record</h2>
	<table align="center" border="1">
	<tr>
		<h3><td>CarPLateNumber</td>
		<td><input type="text" name="fCarPLateNumber" value='<?=$row['CarPLateNumber'];?>' disabled></td></h3>
	</tr>
	<tr>
		<td>CarBrand</td>
		<td><input type="text" name="fCarBrand" value='<?=$row['CarBrand'];?>'></td>
	</tr>
	<tr>
		<td>CarModel</td>
		<td><input type="text" name="fCarModel" value='<?=$row['CarModel'];?>'></td>
	</tr>
	<tr>
		<td>CarYear</td>
		<td><input type="text" name="fCarYear" value='<?=$row['CarYear'];?>'></td>
	</tr>
	<tr>
		<td>CarColour</td>
		<td><input type="text" name="fCarColour" value='<?=$row['CarColour'];?>'></td>
	</tr>
	<tr>
		<td>CarRemarks</td>
		<td><input type="text" name="fCarRemarks" value='<?=$row['CarRemarks'];?>'></td>
	</tr>
	<tr>
		<td>CarPrice</td>
		<td><input type="text" name="fCarPrice" value='<?=$row['CarPrice'];?>'></td>
	</tr>
	<tr>
		<td>CarStatus</td>
		<td><input type="text" name="fCarStatus" value='<?=$row['CarStatus'];?>'></td>
	</tr>
	<tr>
		<td colspan="2"><center><input type="submit" value="Update" onClick="return confirm('Are you sure?')"></center></td>
	</tr>
	</table>
	</form>
</body>
</html>