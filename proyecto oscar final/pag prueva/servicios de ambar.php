<!DOCTYPE html>
<html>
<head>
  <body>
  <title>Tabla de catálogos</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-image: url('costi.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
      background-attachment: fixed;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>

  <h2>Taller de costura Ámbar</h2>

  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "catalogoambar";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
  }

  // Consulta SQL para obtener los datos de la tabla
  $sql = "SELECT * FROM catalogo";
  $result = $conn->query($sql);

  // Mostrar la tabla si hay resultados
  if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Servicios</th>";
    echo "<th>Descripción</th>";
    echo "<th>Precios</th>";
    echo "</tr>";
    // Recorrer los resultados y mostrar los datos en filas de la tabla
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["Servicios"] . "</td>";
      echo "<td>" . $row["Descripcion"] . "</td>";
      echo "<td>" . $row["Precios"] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "No se encontraron resultados.";
  }

  
  $conn->close();
  ?>
</head>

</body>
</html>
