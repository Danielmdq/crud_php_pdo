<?php
include_once("conectar.php");

$resultado = $conex->query("SELECT * FROM usuarios ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body class="admin">
    <div class="agregar">
    <a href="agregar.html">Agregar nuevos datos</a>
    </div>
    <br/><br/>
    <div class="crud">
    <a href="index.php">CRUD página de inicio</a>
    </div>

    <table class="tabla_tres">
        <tr bgcolor='#CCCCCC'>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Usuario</td>
            <td>Email</td>
            <td>Actualizar</td>
        </tr>
        <?php
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>";
            echo "<td>" .$row['nombre']."</td>";
            echo "<td>" .$row['apellido']."</td>";
            echo "<td>" .$row['usuario']."</td>";
            echo "<td>" .$row['email']."</td>";
            echo "<td><a href=\"editar.php?id=$row[id]\">Editar</a> | <a href=\"borrar.php?id=$row[id]\" onClick=\"return confirm('¿Está seguro de que desea eliminar?')\">Borrar</a></td>"; 
        }
        ?>

    </table>
    
</body>
</html>