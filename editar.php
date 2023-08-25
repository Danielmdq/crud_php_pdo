<?php
include_once("conectar.php");

if(isset($_POST['actualizar'])){

    $id = $_POST['id'];

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];

if(empty($nombre) || empty($apellido) || empty($usuario) || empty($email)){
    
    if(empty($nombre)){
        echo "<font color='red'>El campo Nombre está vacío</font><br/>";
    }
    if(empty($apellido)){
        echo "<font color='red'>El campo Apellido está vacío</font><br/>";
    }
    if(empty($usuario)){
        echo "<font color='red'>El campo Usuario está vacío</font><br/>";
    }
    if(empty($email)){
        echo "<font color='red'>El campo Email está vacío</font><br/>";
    }
}else{
    $sql = "UPDATE usuarios SET nombre=:nombre, apellido=:apellido, usuario=:usuario, email=:email WHERE id=:id";
    $query = $conex->prepare($sql);

    $query->bindParam(':id', $id);
    $query->bindParam(':nombre', $nombre);
    $query->bindParam(':apellido', $apellido);
    $query->bindParam(':usuario', $usuario);
    $query->bindParam(':email', $email);
    $query->execute();
//falta revisar
    header("Location: aadmin.php");
}
}
?>

<?php
$id = $_GET['id'];

$sql = "SELECT * FROM usuarios WHERE id=:id";
$query = $conex->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC)){
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $usuario = $row['usuario'];
    $email = $row['email'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <a href="index.php">Inicio</a>
    <br/><br/>

    <form action="editar.php" name="formulario" method="post">
<table class="tabla_bis">
    <tr>
        <td>Nombre</td>
        <td><input type="text" name="nombre" value="<?php echo $nombre; ?>"></td>
    </tr>
    <tr>
        <td>Apellido</td>
        <td><input type="text" name="apellido" value="<?php echo $apellido; ?>"></td>
    </tr>
    <tr>
        <td>Usuario</td>
        <td><input type="text" name="usuario" value="<?php echo $usuario; ?>"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
    </tr>
    <tr>
        <td><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"></td>
        <td><input type="submit" name="actualizar" value="actualizar"></td>
    </tr>
</table>

    </form>
    
</body>
</html>