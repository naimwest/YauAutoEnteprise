<?php
session_start();
$dbc = new mysqli("localhost", "root", "", "yau_auto_database");
if ($dbc->connect_error) {
    die("Connect error: " . $dbc->connect_error);
}

// Example: use email from session to get current user
$Cusmail = $_SESSION['CusEmail'];  // make sure the session is set after login

$query = "SELECT * FROM customer WHERE CusEmail = ?";
$stmt = $dbc->prepare($query);
$stmt->bind_param("s", $Cusmail);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/CusProfile.css" />

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Yau Auto Enterprise - Sign Up</title>
  <link rel="stylesheet" href="CusProfile.css" />
</head>
<body>
  <header>
    <div class="logo"> 
      <img src="LogoYau.png" alt="Yau Auto Logo" />
      <span>YAU AUTO <span class="yellow-text">ENTEPRISE</span></span>
    </div>
    <nav>
      <a href="#">Home</a>
      <a href="#">Buy Car</a>
      <a href="#">Sell Car</a>
      <a href="#">Services</a>
      <a href="#">Profile</a>
      <a href="#">Sign Up/Login</a>
    </nav>
  </header>

 <main>
    <div class="profile-container">
      <h2>Edit Profile</h2>
      <form action="CusProfileProcess.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="CusName" value="<?php echo $data['CusName']; ?>" required />

        <label for="email">Email:</label>
        <input type="email" id="email" name="CusEmail" value="<?php echo $data['CusEmail']; ?>" required readonly />

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="CusNoTel" value="<?php echo $data['CusNoTel']; ?>" required />

        <label for="password">Password:</label>
        <input type="password" id="password" name="CusPassword" placeholder="Enter new password" />

        <button type="submit">Change</button>
      </form>
    </div>
  </main>
</body>
</html>