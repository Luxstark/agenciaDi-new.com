<?php
require "conexion.php";

$id_usuario = $_POST['id_usuario'];
$id_nivel = $_POST['id_nivel'];

$consul_modi = "UPDATE usuarios SET id_nivel=$id_nivel WHERE id_usuario = $id_usuario";

mysqli_query($cnx, $consul_modi);

header("Location: ../../panel.php?e=1");

mysqli_close($cnx);

?>