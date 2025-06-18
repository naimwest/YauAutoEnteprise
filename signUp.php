<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css" />

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Yau Auto Enterprise - Sign Up</title>
  <link rel="stylesheet" href="style.css" />
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
    <div class="signup-container">
      <div class="form-section">
        <h2>Sign Up</h2>
         <form action="signup_process.php" method="POST">
          <label for="CusName">Name:</label>
          <input type="text" name= "CusName" placeholder="Name" />

          <label for="CusEmail">Email:</label>
          <input type="text" name="CusEmail" placeholder="Email" />

          <label for="CusNoTel">Phone Number:</label>
          <input type="text" name="CusNoTel" placeholder="Phone num" />

          <label for="CusPassword">Password:</label>
          <input type="text" name="CusPassword" placeholder="Password" />

          <button type="submit">Sign up</button>
        </form>
      </div>
      <div class="image-section">
        <img src="pickeretaYAU.webp" alt="Showroom" />
      </div>
    </div>
  </main>
</body>
</html>
