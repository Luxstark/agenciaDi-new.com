<?php
session_start();
require "ASSETS/plantillas/conexion.php";

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>inicio</title>
    <link rel="stylesheet" href="ASSETS/index.css">
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <!--------------------------ENCABEZADO -->
        <header>
            
            <div class="navegador">

                <nav>
                    <ul>
                        <img class="logo" src="ASSETS/img/logo3.png" alt="">
                        <h1 class="text_logo">TOYOTA</h1>
                        <li><a class="bot" href="index.php">Productos</a></li>
                        <li><a class="bot" href="#">Nosotros</a></li>
                        <?php
                if( !isset($_SESSION['usuario']) ){
                
                ?>
                        <li><a class="bot" href="index.php?r=1">Registrar</a></li>
                        <?php
                            }
                        ?>
                        
                    
                        <!-- solo para admin -->
                <?php
                if( isset($_SESSION['id_nivel']) && $_SESSION['id_nivel'] != 2){
                
                ?>
                        <li><a class="bot" href="panel.php?n=1">Panel de control</a></li>
                        <?php
                            }
                        ?>
                    </ul>
                </nav>
            </div>
        </header>

        
      
                    
    
                    <!--------------------------PIE PAGINA-->
                    <footer style="margin-top: 100px;">

                        <div>
                            <img class="luciano" style="width: 300px;" src="ASSETS/img/Luciano.jpg" alt="">
                        </div>

                        <div>
                            <p class="soyLuciano" style=" font-size: 35px;">Desarrollado por: <br> <span>Luciano Tagliero</span></p>
                        </div>

                    </footer>

    </div>


</body>

</html>