<html>

<body>
<?php
$IDInspection = $_GET['IDInspection'];
$dbc = mysqli_connect ("localhost","root","","yau_auto_database");
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "select * from Inspection where IDInspection = '$IDInspection'";
$results = mysqli_query($dbc, $sql);
$row = mysqli_fetch_assoc($results);
?>

	<form action="fdelinspection.php?IDInspection=<?php echo $IDInspection;?>" method="post">
	<h1 align="center">Delete Inspection Details</h1>

	<table align="center" border="1">
	<h3>
		<tr>
			<td>Inspection ID</td>
			<td><input type="text" name="IDInspection" value='<?=$row['IDInspection'];?>' disabled></td>
		</tr>
		<tr>
			<td>Inspection Date</td>
			<td><input type="text" name="InsDate" value='<?=$row['InsDate'];?>' disabled></td>
		</tr>
		<tr>
			<td>Inspection Time</td>
			<td><input type="text" name="InsTime" value='<?=$row['InsTime'];?>' disabled></td>
		</tr>
		<tr>
			<td>Inspection Status</td>
			<td><input type="text" name="InsStatus" value='<?=$row['InsStatus'];?>' disabled></td>
		</tr>
		<tr>
			<td>Offered Price</td>
			<td><input type="text" name="InsOfferPrice" value='<?=$row['InsOfferPrice'];?>' disabled></td>
		</tr>
		<tr>
			<td>Customer Email</td>
			<td><input type="text" name="CusEmail" value='<?=$row['CusEmail'];?>' disabled></td>
		</tr>
		<tr>
			<td>Employee ID</td>
			<td><input type="text" name="IDEmployee" value='<?=$row['IDEmployee'];?>' disabled></td>
		</tr>
		<tr>
			<td>Car Plate Number</td>
			<td><input type="text" name="CarPlatNumber" value='<?=$row['CarPlatNumber'];?>' disabled></td>
		</tr>
			<td colspan="2" align="center"><input type="submit" value="Delete from list" onClick="return confirm('Are you sure?')"><input type="button" value="Cancel" onclick="window.location.href='listinspection.php';"></td>
	</h3>
</table>
</form>
</body>
