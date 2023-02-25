 <?php 
    //pedir permiso al cuarto para luego romper todo /destruir
    session_start();

    //destruir
    session_destroy();

    //llevar la pagina maestro sin logeado
    header("Location: ../../index.php")
    ?>