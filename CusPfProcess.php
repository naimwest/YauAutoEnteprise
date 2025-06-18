<?php
session_start();
$dbc = new mysqli("localhost", "root", "", "yau_auto_database");
if ($dbc->connect_error) {
    die("Connect error: " . $dbc->connect_error);
}

// Get updated values from form
$name = $_POST['CusName'];
$email = $_POST['CusEmail']; // read-only, used to identify user
$phone = $_POST['CusNoTel'];
$password = $_POST['CusPassword'];

// Build query
if (!empty($password)) {
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $query = "UPDATE customers SET CusName=?, CusNoTel=?, CusPassword=? WHERE CusEmail=?";
    $stmt = $dbc->prepare($query);
    $stmt->bind_param("ssss", $name, $phone, $hashed, $email);
} else {
    $query = "UPDATE customers SET CusName=?, CusNoTel=? WHERE CusEmail=?";
    $stmt = $dbc->prepare($query);
    $stmt->bind_param("sss", $name, $phone, $email);
}

if ($stmt->execute()) {
    echo "Profile updated successfully.";
} else {
    echo "Update failed: " . $stmt->error;
}
$stmt->close();
$dbc->close();
?>
