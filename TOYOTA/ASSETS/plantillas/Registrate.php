<?php
require "conexion.php";

$usuario = mysqli_real_escape_string($cnx, $_POST['usuario']);
$nombre = mysqli_real_escape_string($cnx, $_POST['nombre']);
$apellido = mysqli_real_escape_string($cnx, $_POST['apellido']);
$clave = mysqli_real_escape_string($cnx, $_POST['clave']);
$id_nivel = 2;

$consul_regi = "SELECT * FROM usuarios WHERE usuario='$usuario'";

$cnx_consul_regi = mysqli_query($cnx, $consul_regi);

$resul_re = mysqli_fetch_assoc($cnx_consul_regi);

if($resul_re != false){
    //llevamos de vuelta a index con un alert de error
    header("Location: ../../index.php?e=2");
    exit;
}

$consul_registra = "INSERT INTO usuarios (usuario, clave, nombre, apellido, id_nivel) VALUES ('$usuario', '$clave', '$nombre', '$apellido', $id_nivel) ";

mysqli_query($cnx, $consul_registra);

        $_SESSION['id_usaurio'] = $resul_log['id_usuario'];
        $_SESSION['usuario'] = $resul_log['usuario'];
        $_SESSION['nombre'] = $resul_log['nombre'];
        $_SESSION['apellido'] = $resul_log['apellido'];
        $_SESSION['clave'] = $resul_log['clave'];
        $_SESSION['id_nivel'] = $resul_log['id_nivel'];


header("Location: ../../index.php?e=3");

mysqli_close($cnx);
?>