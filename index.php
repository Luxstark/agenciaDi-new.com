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
                        <li><a class="bot" href="nosotros.php">Nosotros</a></li>
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

        
      
                    
                    
   <?php   
   if( isset($_GET['r']) && $_GET['r']==1){
    ?>

       <!-----------------------------------------------------------FORMULARIO REGISTRAR -->
       <section class="registrar">
            <h1 style="color: black; font-size: 3rem; margin-bottom: 70px; margin-top: 70px;">Registrar</h1>

            <form class="form_registrar" method="post" action="ASSETS/plantillas/registrate.php">


                <article>


                    <div class="cam_re">
                        <label for="">Usuario o correo electrónico</label>
                    </div>
                    <div class="cam_re">
                        <input class="campos_re" type="text" name="usuario">
                    </div>

                    <div class="cam_re">
                        <label for="">Nombre</label>
                    </div>
                    <div class="cam_re">
                        <input class="campos_re" type="text" name="nombre">
                    </div>
                    <div class="cam_re">
                        <label for="">Apellido</label>
                    </div>
                    <div class="cam_re">
                        <input class="campos_re" type="text" name="apellido">
                    </div>

                    <div class="cam_re">
                        <label for="">Clave</label>
                    </div>
                    <div class="cam_re">
                        <input class="campos_re" type="text" name="clave">
                    </div>

                    <div>
                        <input type="submit" class="btn_Registrar" value="Registrar">
                        <a href="index.php" class="btn_volver" >Volver</a>
                    </div>

                </article>
            </form>
             
        </section>
        
        
    <?php
    }else{
    ?>   
           <!-- Si existe la variable nombre del usuario muestra la bienvenida sino lleva a formulario -->
            <?php 
         /*$_SESSION['usuario'] = "pepe";*/
            //sin signo de exclamacion (estas preguntando "si existe")
            // con signo de exclamacion (estas preguntando "si no existe")
            if( isset($_SESSION['usuario']) ){
         ?>

            <!--------------------------------------------------------------------------------BIENVENIDO -->
        <section class="fondo_bienvenido">
            <div class="bienvenido">
                <div class="tex_bien">
                    <h1>Bienvenido <span class="feme">/a,</span></h1>
                    <h2 class="fulano"><?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido']?></h2>
                    
                    <a href="ASSETS/plantillas/cerrar.php" class="cerrar_sesion">Cerrar Sesión</a>
                
            
                </div>
            </div>
        </section>

            <?php  
                }else{ 
                
            ?>
            
       
       
        <!-----------------------------------------------------------------------------------------FORMULARIO -->
        <div class="header2">

                <div class="campos">
                    
                    <form action="ASSETS/plantillas/login.php" method="post" enctype="application/x-www-form-urlencoded">
                        
                        
                        <input placeholder="Usuario" type="text" name="usuario">
                    
                        <input placeholder="Clave" type="password" name="clave">
                        
                        
                        <input  type="submit" class="botones" value="iniciar">
                       

                    </form>
                </div>
                <!--<div class="perfil">
                <img style="display: inline-block;border: 5px solid rgb(235, 10, 30);border-radius: 50px;" src="ASSETS/img/perfil.png" width="70px" alt="">-->
                </div>
            </div>

            <?php
                }
            ?> 
        
        
        
        <!---------------------------------------------------------------------------------ERROR LOGUEO-->
    <?php
        if( isset($_GET['e']) && $_GET['e']==1){ //para cualquier persona no juega con los numero de la URL
    ?>
    <script>
        // un aviso de que el logueo fallo o no existe
        alert("Este Usuario no existe")
        //Para no seguir generando el mismo numero cada ves que cierro el alert entonces llevamos directamente a index.php
        window.location = "index.php"
    </script>
    <?php
    }else if( isset($_GET['e']) && $_GET['e']==2){
    ?>

       <script>
        alert("Este Usuario ya existe")
        </script>
    <?php
    }else if( isset($_GET['e']) && $_GET['e']==3){
    ?>

       <script>
        alert("Registro existoso mmmmm")
        </script>
        <?php
        }
        ?>
    

        <?php
        if( !isset($_GET['p'])) {
        ?>

            <!--------------------------------------------------------------------------PAGINA MAESTRO -->
            <section class="pagina_maestro">
                <h1 style="color: black; font-size: 3rem; margin-top: 30px;">Lista de autos</h1>

        <?php
             
            $consul_prod = "SELECT * FROM productos";
            
            $cnx_consult_prod = mysqli_query($cnx, $consul_prod);
                 
            while($producto = mysqli_fetch_assoc($cnx_consult_prod)){
        ?>
                   
                    <article class="productos">
                        <a href="index.php?p=<?php echo $producto['id_producto']?>">
                <img class="foto_prod" src="ASSETS/img_coches/<?php echo $producto['foto'];?>" width="500px" alt="">
                </a>
                        <h1 class="titulo_producto">
                            <?php echo $producto['nombre_producto']?>
                        </h1>
                        <h2>$
                            <?php echo $producto['precio']?>
                        </h2>
                    </article>
            <?php
            }
            ?>
            </section>

           
           
    <?php
        }else{
    ?>
                <!----------------------------------------------------------------PAGINA DETALLES -->
                <section class="pagina_detalle">

            <?php
             
            $p= $_GET['p'];
            
            $consul_det = "SELECT * FROM productos WHERE productos.id_producto = $p";
           
            $cnx_consult_det = mysqli_query($cnx, $consul_det);
              
            $detalle = mysqli_fetch_assoc($cnx_consult_det);
            
            if($detalle == false ){//empieza el resultado de bases de datos
                    
                    header("Location: index.php");// primero nos lleva a un sitio
                    exit; //para no seguir leyendo mas los codigos php despues llevado a la pagina maestro
    
            }
        ?>
                        <article class="detalle">



                            <h1 class="titulo_detalle"><?php echo $detalle['nombre_producto'];?></h1>
                            <img class="foto_prod" src="ASSETS/img_coches/<?php echo $detalle['foto'];?>" width="500px" alt="<?php echo $detalle['foto'];?>">
                        </article>

                        <article class="detalle">
                           
                            <h2><?php echo $detalle['modelo'];?></h2>
                            <h2 class="precio">$<?php echo $detalle['precio'];?></h2>
                            <p class="descripcion">Modelo entregado con su equipamiento completo.Lista de accesorios opcionales a disposicion del usuario</p>

                            <a href="index.php?=0">
                                <buttom>VOLVER</buttom>
                            </a>


                        </article>
                        
                        
                       
                        <div class="comentarios">
                           <h1 class="titulo_comentario">Comentarios</h1>

                        <?php
                        $consul_comentario = "SELECT * FROM comentarios
                        INNER JOIN productos ON comentarios.id_producto = productos.id_producto 
                        INNER JOIN usuarios ON comentarios.id_usuario = usuarios.id_usuario 
                        WHERE productos.id_producto = $p
                        ";
                            
                        $cnx_consul_comentario = mysqli_query($cnx, $consul_comentario);
                            
                        while($resul_comentario = mysqli_fetch_assoc($cnx_consul_comentario)){
                            $fecha = $resul_comentario['fecha'];
                            $fecha_nueva = explode("-", $fecha);
                            $fecha = $fecha_nueva[2] . "-" . $fecha_nueva[1] . "-" . $fecha_nueva[0];
                        ?>
                           
                            
                            <h2 class="fulano-es"><?php echo $resul_comentario['nombre']. " " . $resul_comentario['apellido'];?> 
                            <span class="fecha"><?php echo $resul_comentario['fecha'];?></span></h2>
                            <h2 class="comento"><?php echo $resul_comentario['comentario'];?></h2>
                    
                      
                       <?php
                        }    
                        ?>
                         
                         
                         
                          <?php
                          if(isset($_SESSION['usuario'])){
                        ?>
                            <form action="ASSETS/plantillas/Guardarcomentar.php" method="post">
                                <textarea name="comentario" cols="30" rows="10"></textarea>
                                <input type="hidden" name="producto" value="<?php echo $p; ?>">
                                <a href=""><input type="submit" class="botones" value="enviar"></a>
                            </form>
                     <?php
                        }    
                        ?>
                            
                        </div> 
                        </section>
                <?php
                    }
                ?>
                    
           
     <?php        
   }   //cierre de primer else       
     ?>         
                    <!--------------------------PIE PAGINA-->
                    <footer>

                        <div>
                            <img class="luciano" src="ASSETS/img/Luciano.jpg" alt="">
                        </div>

                        <div>
                            <p class="soyLuciano" style="color: gray">Desarrollado por: <span>Luciano Tagliero</span></p>
                        </div>

                    </footer>

    </div>


</body>

</html>