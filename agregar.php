<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <h2>Agregar datos</h2>
    <br/>
    <?php
include_once("conectar.php");

if(isset($_POST['Submit'])){
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

        echo "<br/><a href='javascript:self.history.back();'>Volver</a>";

    }else{

        $sql = "INSERT INTO usuarios (nombre, apellido, usuario, email) VALUES (:nombre, :apellido, :usuario, :email)";
        $query = $conex->prepare($sql);

        $query->bindparam(':nombre', $nombre);
        $query->bindparam(':apellido', $apellido);
        $query->bindparam(':usuario', $usuario);
        $query->bindparam(':email', $email);
        $query->execute();

        echo "<font color='green'>Datos agregados correctamente</font><br/>";
//ver si es index
        echo "<br/><a href='admin.php'>Ver resultado</a>";

    }
}
    ?>

</body>
</html>