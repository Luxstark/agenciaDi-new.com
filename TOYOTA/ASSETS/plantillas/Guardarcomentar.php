<?php
session_start();
require "conexion.php";

$id_usuario = $_SESSION['id_usaurio'];
echo $id_usuario ;
$id_producto = $_POST['producto']; //recibo la variable que tiene el boton con name "producto"
$comentario = $_POST['comentario']; //recibo la variable de la "textarea" con name "comentario"
$fecha = date("Y-m-d"); 

$consul_guarComent = "INSERT INTO comentarios 
(id_producto, comentario, fecha, id_usuario)
VALUES ($id_producto, '$comentario', '$fecha', $id_usuario)";

mysqli_query($cnx, $consul_guarComent);

header("Location: ../../index.php?p=$id_producto");

mysqli_close($cnx);
?>