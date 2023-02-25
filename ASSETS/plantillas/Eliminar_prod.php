<?php
require "conexion.php";

$p = $_GET['p'];

$consul_elim_pro = "DELETE FROM productos WHERE id_producto = $p";

mysqli_query($cnx, $consul_elim_pro);

header("Location: ../../panel.php?a=4");
   
?>