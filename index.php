<?php
echo "<link rel='stylesheet' href='.css'>";
//CONEXION
    $direccion_bd = "localhost";
    $nombre_bd = "delmate";
    $usuario_bd = "root";
    $contraseña_bd = "";
    $conexion = mysqli_connect ($direccion_bd, $usuario_bd, $contraseña_bd, $nombre_bd);
//FORMULARIO 
    $mateID = $_POST['mateID'];
    $mateStock = $_POST['mateStock'];
    $mateDescripcion = $_POST['mateDescripcion'];
    $mateContado = $_POST['mateContado'];
    $mateTarjetas = $_POST['mateTarjetas'];
//CONSULTAS
$cargar = "INSERT INTO mates (CODIGO, Stock, DESCRIPCION, Contado, Tarjetas) VALUES ('$mateID', '$mateStock', '$mateDescripcion', '$mateContado', '$mateTarjetas')";
    if($conexion->query($cargar) === TRUE) {
        echo "<script>alert('SE INGRESO CORRECTAMENTE')</script>";
        mostrarBasedeDatos($direccion_bd,$nombre_bd,$usuario_bd, $contraseña_bd);

    }

function mostrarBasedeDatos($direccion_bd,$nombre_bd,$usuario_bd, $contraseña_bd){
    $conexion = mysqli_connect ($direccion_bd, $usuario_bd, $contraseña_bd, $nombre_bd);
    $mostrar= "SELECT * FROM mates";
    $result = $conexion->query($mostrar);
    if ($result->num_rows > 0) {//Comprueba que hay datos
        echo "<table>
                <tr>
                    <th>CODIGO</th>
                    <th>STOCK</th>
                    <th>DESCRIPCION</th>
                    <th>CONTADO</th>
                    <th>TARJETAS</th>
                    <th>ACCIONES</th> 
                </tr>";
        while ($row = $result->fetch_assoc()) { 
            echo "<tr>
                    <td>" . $row["CODIGO"] . "</td>
                    <td>" . $row["Stock"] . "</td>
                    <td>" . $row["DESCRIPCION"] . "</td>
                    <td>" . $row["Contado"] . "</td>
                    <td>" . $row["Tarjetas"] . "</td>
                    <td><a href='editar.php' ¿id=" . $row["CODIGO"] . "'>Editar</a></td>
                  </tr>";
        }
        echo "</table>";
    } 
}

?>