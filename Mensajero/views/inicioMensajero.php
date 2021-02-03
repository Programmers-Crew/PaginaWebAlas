<?php


?>



<!DOCTYPE html>
<html lang="es">
    <head>
        <title>AlasGT-Mensajero</title>
        
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css.map" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css.map" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.css" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.css.map" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.min.css" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.min.css.map" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css.map" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css.map" type="text/css">
        <link rel="stylesheet" href="css/inicioCliente.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    </head>
    <body>     
    <div class="imagen_derecha">
                <img src="assets/images/nube derecha.png" class="img-fluid" >
        </div> 
        <div class="imagen_izquierda">
                    <img src="assets/images/nube izquierda.png" class="img-fluid" >
        </div>
        <header style="padding: 0;">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark menu">
            <div class="ancho-40" style="display: flex;">
                        <a class="" style="padding-left: 10px;" href="#">
                            <img src="assets/images/Logotipo sin fondo.png" width="75px" height="50" alt="">
                        </a>
                        <a class="navbar-brand" style="padding-left:10px" href="#"><?php echo $usuario->getNombre() ." ".$usuario->getApellido();?></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content:flex-end;">
                    <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Inicio<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Mi Cuenta
                        </a>
                        <div class="dropdown-menu dropdown-menu-right drop-content-black" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item " style="color:white" href="index.php?a=editarCuenta">Editar Cuenta</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" style="color:white" href="config/cerrarSesion.php">Cerrar Sesión</a>
                        </div>
                    </li>
                    </ul>
                    
                </div>
            </nav>
        </header>
        <section>
            <div class=" centrado">
                <h1 style="color: white;" class="titulos">Bienvenido de nuevo</h1>
            </div>
            <?php
                if(isset($errorRegistrar)){
                    echo "
                    <p  class='centrado fuentes' style='font-size:1rem; color:white;'>".$errorRegistrar."</p>";
                }else{
                    if(isset($registrarExito)){
                        echo "<p  class='centrado fuentes ' style='font-size:1rem; color:white;'>".$registrarExito."</p>";
                    }
                }
            ?>
            <div class="col-xl-12 col-md-12 col-xs-12 row centrado" style="margin: 0;">
                <a class="col-xl-3 col-md-3 col-xs-9 panel panel1" style="text-align:center;text-decoration:none" href="index.php?a=pedidos">
                    <span class="iconoSolid inicio-cliente"></span>
                    <p class="letra">Pedidos</p>
                </a>
                <a class="col-xl-3 col-md-3 col-xs-9 panel panel2" style="text-align:center;text-decoration:none" href="index.php?a=chat">
                    <span class="icono inicio-cliente d-block"></span>
                    <p class="letra">Escribir Duda</p>
                </a>
                <a class="col-xl-3 col-md-3 col-xs-9 panel panel3" style="text-align:center; text-decoration:none" href="index.php?a=datos">
                    <span class="icono inicio-cliente d-block"></span>
                    <p class="letra">Mis Datos</p>
                </a>
            </div>
        </section>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>