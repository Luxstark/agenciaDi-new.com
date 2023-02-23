<?php
session_start();
require "conexion.php";

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

//si los 2 me coinciden ,entrara
$consulta_usuario = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'";
    
    //pero si uno de esos 2 no coencide ,rechaza
     $cnx_log = mysqli_query($cnx, $consulta_usuario);
    
    $resul_log = mysqli_fetch_assoc($cnx_log);


    
//si el logeo falla y ademas porque no existe ,llevamos a la pagina principal con un variable (para avisar que el logeo fallo)
    if($resul_log == false){
        //agregamos una variable por GET que se llama index.php?e=1 con una "e" de "ERROR"
        header("Location: ../../index.php?e=1");
    
    } else{
        $_SESSION['id_usaurio'] = $resul_log['id_usuario'];
        $_SESSION['usuario'] = $resul_log['usuario'];
        $_SESSION['nombre'] = $resul_log['nombre'];
        $_SESSION['apellido'] = $resul_log['apellido'];
        $_SESSION['clave'] = $resul_log['clave'];
        $_SESSION['id_nivel'] = $resul_log['id_nivel'];
        //echo $_SESSION['id_usaurio'];
        header("Location: ../../index.php");
    }
    //cerrar las conexion para no consumir memoria
    mysqli_close($cnx); 
    ?>
