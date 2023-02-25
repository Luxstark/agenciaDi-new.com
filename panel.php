<?php
session_start();
require "ASSETS/plantillas/conexion.php";

if(!isset($_SESSION['id_nivel']) || $_SESSION['id_nivel'] !=1){
    header("Location:index.php");
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>inicio</title>
    <link rel="stylesheet" href="ASSETS/index.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
</head>
<style>
    .aviso{
        padding: 20px;
        background-color: rgba(0, 0, 0, 0.77);
    }
    .cancelar , .aceptar{
        padding: 20px;
    }
    </style>
<body>
    <div class="container">

        <!-- ENCABEZADO -->
        <header>


            <div class="navegador">

                <nav>
                    <ul>
                        <img class="logo" src="ASSETS/img/logo3.png" alt="">
                        <h1 class="text_logo">TOYOTA <span style="font-size:30px; ">Panel de control</span></h1>
                        <li><a class="bot" href="index.php">Inicio</a></li>
                        <li><a class="bot" href="panel.php">Lista de usuarios</a></li>
                        <li><a class="bot" href="panel.php?a=1">Lista de autos</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        
          
          <!----------------------------------------------------------ALERT------------->
           <?php   
   if( isset($_GET['e']) && $_GET['e']==1){//------------------------------------------------avisos USUARIOS
    ?>
        <div class="aviso">
                        <h2 style="color: white">Modificacion existosa</h2>
                        <a class="aceptar" href="panel.php">Ok!</a>
                    </div>
        
    <?php   
       }else if ( isset($_GET['e']) && $_GET['e']==3){  
       $u = $_GET['u'];
       ?>
       
                      <div class="aviso">
                        <h2 style="color: white">Desea eliminar este usuario?</h2>
                        <a class="cancelar" href="panel.php">Cancelar</a>
                        <a class="aceptar" href="ASSETS/plantillas/eliminar_usu.php?u=<?php echo $u ?>">Aceptar</a>
                    </div>
        
        <?php 
        }else if ( isset($_GET['e']) && $_GET['e']==4){
       
       ?>
       
                        <div class="aviso">
                           <h2 style="color: white">Usuario eliminado</h2>
                           <a class="aceptar" href="panel.php">Ok!</a>
                       </div>
   
    <?php
    }else if ( isset($_GET['a']) && $_GET['a']==3){ //---------------------------------------avisos PRODUCTOS
       $p = $_GET['p'];
       ?>
       
                 <div class="aviso">
                   <h2 style="color: white">Desea Eliminar este Producto?</h2>
                   <a class="cancelar" href="panel.php?a=1">Cancelar</a>
                   <a class="aceptar" href="ASSETS/plantillas/Eliminar_prod.php?p=<?php echo $p ?>">Aceptar</a>
               </div>
        
        <?php 
        }else if ( isset($_GET['a']) && $_GET['a']==4){
       
       ?>
       
                <div class="aviso">
                   <h2 style="color: white">Producto eliminado</h2>
                   <a class="aceptar" href="panel.php?a=1">Ok!</a>
               </div>
   
    <?php
    }
    ?>
     
   
        
        
        
       
       
       
       
       
       
    <?php   
   if( isset($_GET['a']) && $_GET['a']==1){
    ?>
        
        
        <!-----------------------LISTAS DE PRODUCTOS-->
        <section class="registros">
            <h1 style="color: black; font-size: 3rem; margin-bottom: 70px; margin-top: 70px;">Lista de Autos</h1>

            <article class="cen_tabla">
                <table>
                    <thead>
                        <tr>
                            <!-- titulos de tablas -->
                            <td>ID</td>
                            <td>Nombre Producto</td>
                            <td>Modelo</td>
                            <td>Precio</td>
                            <td>Foto</td>
                            <input style="background-color: red; color: white; width: 350px; margin-bottom: 20px; font-family: TruenoSBd; border-radius: 15px;" type="submit" value="añadir autos">
                        </tr>
                    </thead>
 <?php
    $consul_pro= "SELECT * FROM productos";
    $cnx_consul_pro = mysqli_query($cnx, $consul_pro);
    while($result_pro = mysqli_fetch_assoc($cnx_consul_pro)){
  ?><!------------------------------------------------------------------------------------------------------PADRE-->
     <tr>    
        <td><?php echo $result_pro['id_producto']; ?></td>
        <td><?php echo $result_pro['nombre_producto']; ?></td>
        <td><?php echo $result_pro['modelo']; ?></td>
        <td>$ <?php echo $result_pro['precio']; ?></td>
        <td><img style="width: 120px; border-radius: 20px;"  src="ASSETS/img_coches/<?php echo $result_pro['foto']; ?>" alt=""></td>
            
    <td>    
      
          
                         <input type="hidden" name="id_usuario" value="<?php echo $result_usu['id_usuario']; ?>">
                         <input style="width: 150px; border-radius: 15px; " type="submit" value="modificar">
               
             </td>
             
              <td><a href="panel.php?a=3&p=<?php echo $result_pro['id_producto']?>" >
               <input style="background-color: red; color: white; width: 150px; border-radius: 15px;" type="submit" value="eliminar"></a></td> 
               
            </tr>
          <?php 
                }//------------------------------------------------------------------------------------------------------PADRE-->
                ?>
                


                </table>
            </article>
        </section>
        
        <?php 
       }else{ //--------------------------------CIERRE DE ELSE
        ?>
        
        <!-----------------------LISTAS DE REGISTROS/USUARIOS-->
        <section class="registros">
            <h1 style="color: black; font-size: 3rem; margin-bottom: 70px; margin-top: 70px;">Lista de usuarios</h1>
              <article class="cen_tabla">
                <table>
                    <thead>
                        <tr>
                            <!-- titulos de tablas -->
                            <td>ID</td>
                            <td>usuarios</td>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Nivel</td>
                        </tr>
                    </thead>

   <?php
    $consul_usu= "SELECT * FROM usuarios";
    $cnx_consul_usu = mysqli_query($cnx, $consul_usu);
    while($result_usu = mysqli_fetch_assoc($cnx_consul_usu)){
  ?><!------------------------------------------------------------------------------------------------------PADRE-->
     <tr>    
        <td><?php echo $result_usu['id_usuario']; ?></td>
        <td><?php echo $result_usu['usuario']; ?></td>
        <td><?php echo $result_usu['nombre']; ?></td>
        <td><?php echo $result_usu['apellido']; ?></td>
            
    <td>    
       <form action="ASSETS/plantillas/modificar_usu.php" method="post">
           <select name="id_nivel" >
              
                    
              <?php
                $consul_nivel = "SELECT * FROM niveles";
                $cnx_consul_nivel = mysqli_query($cnx, $consul_nivel);
                while($resul_nivel = mysqli_fetch_assoc($cnx_consul_nivel)){
              ?>  <!----------------------------------------------------------------------------------------------HIJO-->
               
                   <option class="admi_usuario" value="<?php echo $resul_nivel['id_nivel']; ?>"
                 
                       <?php if($resul_nivel['id_nivel'] == $result_usu['id_nivel']){
                             echo "selected";
                        }?>>
                        <?php echo $resul_nivel['nivel'];?>
                  </option>
             
            <?php
            }//----------------------------------------------------------------------------------------------HIJO-->
            ?>
                    </select>
          
                         <input type="hidden" name="id_usuario" value="<?php echo $result_usu['id_usuario']; ?>">
                         <input style="width: 150px; border-radius: 15px; " type="submit" value="modificar">
                </form>
             </td>
             
              <td><a href="panel.php?e=3&u=<?php echo $result_usu['id_usuario']?>" >
               <input style="background-color: red; color: white; width: 150px; border-radius: 15px;" type="submit" value="eliminar"></a></td> 
               
            </tr>
          <?php 
                }//------------------------------------------------------------------------------------------------------PADRE-->
                ?>
                
         </table>
            </article>
        </section>
        
                
        
         <?php 
        }//--------------------------------------------------CIERRE DE ELSE IF
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