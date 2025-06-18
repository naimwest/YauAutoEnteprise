<?php
$IDTDrive=$_GET['IDTDrive'];
$TDrDate=$_POST['TDrDate'];
$TDrTime=$_POST['TDrTime'];

$TDrStatus=$_POST['TDrStatus'];
$CarPlatNumber=$_POST['CarPlatNumber'];
$CusEmail=$_POST['CusEmail'];

$IDEmployee=$_POST['IDEmployee'];

$dbc = mysqli_connect ("localhost", "root", "","yau_auto_database");
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "update testdrive set IDTDrive='$IDTDrive', TDrDate='$TDrDate', TDrTime='$TDrTime', TDrStatus='$TDrStatus', CarPlatNumber='$CarPlatNumber', CusEmail='$CusEmail' , IDEmployee='$IDEmployee'";
$result = mysqli_query($dbc, $sql);

if($result)
{
	mysqli_commit($dbc);
	Print '<script>alert("Test Drive is successfully updated.");</script>';
	Print '<script>window.location.assign("listTestDrive.php");</script>';
}

else
{
	mysqli_rollback($dbc);
	Print '<script>alert("Test Drive is failed to update.");</script>';
	Print '<script>window.location.assign("listTestDrive.php");</script>';
}
?>