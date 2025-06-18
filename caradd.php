<?php
// assign data from car form into variable
$CarPLateNumber=$_POST['fCarPLateNumber'];
$CarBrand=$_POST['fCarBrand'];
$CarModel=$_POST['fCarModel'];

$CarYear=$_POST['fCarYear'];
$CarColour=$_POST['fCarColour'];
$CarRemarks=$_POST['fCarRemarks'];

$CarPrice=$_POST['fCarPrice'];
$CarStatus=$_POST['fCarStatus'];

// Connection to the server and datbase
$dbc = mysqli_connect ("localhost","root","","yau_auto_database");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: ".mysqli_connect_error();
}
// SQL statement to insert data from form into table car
$sql="insert into 'car'('CarPLateNumber','CarBrand','CarModel','CarYear','CarColour','CarRemarks','CarPrice','CarStatus') values ('$CarPLateNumber','$CarBrand','$CarModel','$CarYear','$CarColour','$CarRemarks','$CarPrice','$CarStatus')";
$results= mysqli_query($dbc,$sql);
if ($results)
{
mysqli_commit($dbc);
//display message box Record Been Added
print '<script>alert("Record Had Been Added");</script>';
//go to frmcar.php page
print '<script>window.location.assign("frmcar.php");</script>';
}
else
{ mysqli_rollback($dbc);
//display error message box
print '<script>alert("Data Is Invalid , No Record Been Added");</script>';
//go to frmcar.php page
print '<script>window.location.assign("frmcar.php");</script>';
}
?>