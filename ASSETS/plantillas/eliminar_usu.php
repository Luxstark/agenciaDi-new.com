<?php
require "conexion.php";

$u = $_GET['u'];

$consul_eliminar = "DELETE FROM usuarios WHERE id_usuario = $u";

mysqli_query($cnx, $consul_eliminar);


header("Location: ../../panel.php?e=4");
   
?>