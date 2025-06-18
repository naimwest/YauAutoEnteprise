<?php
$CarPLateNumber=$_POST['fCarPLateNumber'];
$CarBrand=$_POST['fCarBrand'];
$CarModel=$_POST['fCarModel'];

$CarYear=$_POST['fCarYear'];
$CarColour=$_POST['fCarColour'];
$CarRemarks=$_POST['fCarRemarks'];

$CarPrice=$_POST['fCarPrice'];
$CarStatus=$_POST['fCarStatus'];

$dbc = mysqli_connect ("localhost", "root", "","yau_auto_database");
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "update `car` set `CarPLateNumber`='$CarPLateNumber',`CarBrand`='$CarBrand',`CarModel`='$CarModel',`CarYear`='$CarYear', `CarColour`='$CarColour',`CarRemarks`='$CarRemarks' , `CarPrice`='$CarPrice',`CarStatus`='$CarStatus' where `CarPLateNumber`='$CarPLateNumber'";
$result = mysqli_query($dbc, $sql);

if($result)
{
	mysqli_commit($dbc);
	Print '<script>alert("car is successfully updated.");</script>';
	Print '<script>window.location.assign("listcar.php");</script>';
}

else
{
	mysqli_rollback($dbc);
	Print '<script>alert("Car is failed to update.");</script>';
	Print '<script>window.location.assign("listca.php");</script>';
}
?>