<?php
include("conectar.php");

$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id=:id";
$query = $conex->prepare($sql);
$query->execute(array(':id' => $id));

//puede ser admin.php
header("Location: admin.php");

?>