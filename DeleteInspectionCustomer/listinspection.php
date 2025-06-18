<html>
<head>
 <title>Car List</title>
</head>

<body>
 <form>
 <h3 align="center"><font color="#0000FF">Inspections Details</font></h3>

 <table align="center" border="1">
 <tr>
  <th><font color="#0000FF">Inspection ID</font></th>
  <th><font color="#0000FF">Date</font></th>
  <th><font color="#0000FF">Time</font></th>
  <th><font color="#0000FF">Status</font></th>
  <th><font color="#0000FF">Offer Price</font></th>
  <th><font color="#0000FF">Customer Email</font></th>
  <th><font color="#0000FF">Employee ID</font></th>
  <th><font color="#0000FF">Car Plate Number</font></th>
  <th colspan="2"><font color="#0000FF">Action</font></th>
 </tr>

 <?php
 // Connection to the server and datbase
 $dbc = mysqli_connect ("localhost","root","","yau_auto_database");
 if (mysqli_connect_errno())
 {
  echo "Failed to connect to MySQL: ".mysqli_connect_error();
 }
 $sql = "select * from inspection";
 $result = mysqli_query($dbc, $sql);
 while($row = mysqli_fetch_assoc($result))
 {
  Print '
  <tr>
   <td><font color="#0000FF">'.$row['IDInspection'].'</font></td>
   <td><font color="#0000FF">'.$row['InsDate'].'</font></td>
   <td><font color="#0000FF">'.$row['InsTime'].'</font></td>
   <td><font color="#0000FF">'.$row['InsStatus'].'</font></td>
   <td><font color="#0000FF">'.$row['InsOfferPrice'].'</font></td>
   <td><font color="#0000FF">'.$row['CusEmail'].'</font></td>
   <td><font color="#0000FF">'.$row['IDEmployee'].'</font></td>
   <td><font color="#0000FF">'.$row['CarPlatNumber'].'</font></td>
   <td><a href="insdelprocess.php?IDInspection='.$row['IDInspection'].'" class="btn btn-danger" role="button">Delete</a></td>
  </tr>';
 }
 ?>
 </table>
 </form>
</body>
</html>