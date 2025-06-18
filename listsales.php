<html>
<head>
	<title>Sales' List</title>
</head>

<body>
	<form>
	<h3 align="center"><font color="#0000FF">Sales Details</font></h3>
	<table align="center" border="1">
	<tr>
		<th><font color="#0000FF">Invoice No.</font></th>
		<th><font color="#0000FF">Product ID</font></th>
		<th><font color="#0000FF">Product Name</font></th>
		<th><font color="#0000FF">Customer ID</font></th>
		<th><font color="#0000FF">Product Quantity</font></th>
		<th><font color="#0000FF">Product Price (RM)</font></th>
		<th><font color="#0000FF">Total Sales (RM)</font></th>
		<th colspan="2"><font color="#0000FF">Action</font></th>
	</tr>

	<?php
	$dbc = mysqli_connect ("localhost","root","","sales");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: ".mysqli_connect_error();
	}
	$sql="SELECT s.* , p.* FROM `sales` s,`product` p WHERE s.`Prodid`=p.`Prodid`";
	$result = mysqli_query($dbc, $sql);
	while($row = mysqli_fetch_assoc($result))
	{
		$total=$row['qtysales']*$row['Prodprice'];
		Print '
		<tr>
			<td><font color="#0000FF">'.$row['invoiceno'].'</font></td>
			<td><font color="#0000FF">'.$row['Prodid'].'</font></td>
			<td><font color="#0000FF">'.$row['Prodname'].'</font></td>
			<td><font color="#0000FF">'.$row['Custid'].'</font></td>
			<td><font color="#0000FF">'.$row['qtysales'].'</font></td>
			<td><font color="#0000FF">'.$row['Prodprice'].'</font></td>
			<td><font color="#0000FF">'.$total.'</font></td>
			<td><a href="fupdsales.php?finvno='.$row['invoiceno'].' & " class="btn btn-warning" role="button">Update</a></td>
			<td><a href="fdelsales.php?finvno='.$row['invoiceno'].'" class="btn btn-danger" role="button">Delete</a></td>
		</tr>';
	}
	?>
	</table>
	</form>
</body>
</html>