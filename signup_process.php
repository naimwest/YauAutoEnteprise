<?php
// 1. Connect
$dbc = mysqli_connect("localhost", "root", "", "yau_auto_database");
if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
}

// 2. Get and validate form data
$CusName     = $_POST['CusName']   ?? '';
$CusEmail    = $_POST['CusEmail']  ?? '';
$CusNoTel    = $_POST['CusNoTel']  ?? '';
$CusPassword = $_POST['CusPassword'] ?? '';

// Very light validation example – expand as needed
if (!filter_var($CusEmail, FILTER_VALIDATE_EMAIL) || $CusPassword === '') {
    echo '<script>alert("Invalid input");</script>';
    exit;
}

// 3. Hash the password
$hashedPassword = password_hash($CusPassword, PASSWORD_DEFAULT);

// 4. Insert using a prepared statement
$sql = "INSERT INTO `customer` (CusEmail, CusPassword, CusName, CusNoTel)
        VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($dbc, $sql);
if (!$stmt) {
    die("Prepare failed: " . mysqli_error($dbc));
}

mysqli_stmt_bind_param($stmt, "ssss", $CusEmail, $hashedPassword, $CusName, $CusNoTel);

// 5. Execute and report
if (mysqli_stmt_execute($stmt)) {
    echo '<script>alert("Record has been added");</script>';
} else {
    echo '<script>alert("Data is invalid, no record added");</script>';
}

// 6. Clean up
mysqli_stmt_close($stmt);
mysqli_close($dbc);
?>
