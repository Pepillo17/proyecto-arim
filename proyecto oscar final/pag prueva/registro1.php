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

$sql = "SELECT * FROM usuarios ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  $row = $result->fetch_assoc();
  // output data of each row
  echo "<h1>equipo zoe</h1>
<h3>coneccion con MYSQL</h3>

<h3> actualizar los datos  </h3>
<form action='registro1.php' method= 'post'>
    nombre : <input type = 'text' name ='Nombre' value = $row[nombre]><br>
    contrasenia : <input type = 'text' name ='Rol' value = $row[pass]><br>
    Email : <input type = 'text' name ='RedSocial' value = $row[email]><br>
    <input type= 'submit'>
</form>";
}
else {
  echo "sin resultados";
}


$conn->close();
?>

  </body>
</head>