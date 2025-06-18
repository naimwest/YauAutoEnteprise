<?php
$IDInspection = $_GET['IDInspection'];
$dbc = mysqli_connect ("localhost", "root", "", "yau_auto_database");
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "DELETE FROM inspection where IDInspection='$IDInspection'";
$result = mysqli_query($dbc, $sql);
if($result)
{
	mysqli_commit($dbc);
	Print '<script>alert("Inspection Record Successfuly Deleted.");</script>';
	Print '<script>window.location.assign("listinspection.php");</script>';
}

else
{
	mysqli_rollback($dbc);
	Print '<script>alert("Inspection Record is failed to be Deleted.");</script>';
	Print '<script>window.location.assign("listinspection.php");</script>';
}
?>