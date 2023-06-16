<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "catalogoambar";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$nombre = $_POST["nombre"];
$pass = $_POST["pass"];
$email = $_POST["email"];



$sql = "UPDATE usuarios SET nombre='$nombre', username='$pass', contrasenia='$email' ";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>