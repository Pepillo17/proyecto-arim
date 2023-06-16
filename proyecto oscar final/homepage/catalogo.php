<html>
        <body>
            <h1>catalogo</h1>
            
             <h3>visualiza nuestro catalogo</h3>
             <style>
     table {
       font-family: arial, sans-serif;
       border-collapse: collapse;
       width: 100%;
     }
     
     td, th {
       border: 1px solid #dddddd;
       text-align: left;
       padding: 8px;
     }
     
     tr:nth-child(even) {
       background-color: #dddddd;
     }
     </style>
     </head>
     <body>
     
     <h2>EQUIPO ZOE</h2>
     
     
     <table>
       <tr>
         <th>integrantes</th>
         <th>rol</th>
         <th>red social</th>
         <th>foto</th>
       </tr>
       <tr>
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

$sql = "SELECT Servicios, Descripcion, precios, FROM catalogo";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo"<table>";
  while($row = $result->fetch_assoc()) {
     echo "<tr>".
        "<th>Servicios</th>".
        "<th>Descripcion</th>".
        "<th>precios</th>".
    "</tr>".
   
    "<tr>".
      "<td>".$row["Sevicios"]."</td>".
      "<td>".$row[ "Descripcion"]."</td>".
      "<td>".$row["precios"]."</td>".
      "width='120px'
      height='140px'></td></td>".
    "</tr>";
  } echo"</table>";
} else {
  echo "0 results";
} 
$conn->close();
?>
     </table>
        </body>
</html>