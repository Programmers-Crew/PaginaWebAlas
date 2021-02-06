<?php


?>



<!DOCTYPE html>
<html lang="es">
    <head>
        <title>AlasGT-cliente</title>
        <link rel="shortcut icon" href="assets/images/Logotipo sin fondo.png" />
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
    <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark menu">
                <div class="ancho-50 d-flex">
                    <div class="ancho-40" style="display: flex;">
                        <div class="ancho-60" style="display: flex;">
                            <div style="display: flex; align-items:center">
                                <button class="navbar-toggler" style="margin: 0 !important;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
                        </div>
                        <div>
                            <a  href="#">
                                <img class="imagen img-fluid" src="assets/images/Logotipo sin fondo.png"  alt="AlasGT">
                            </a>
                        </div>
                        <div class="centrado">
                            <a class="navbar-brand tamaño" href="#"><?php echo $usuario->getNombre() ." ".$usuario->getApellido();?></a>
                        </div>
                    </div>
                </div>
                <div class="ancho-50 d-flex justify-content-flex-end">
                    <div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link " href="index.php">Inicio<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="index.php?a=chat">Dudas o Inconvenientes(Chat)</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Mi Cuenta
                                </a>
                                <div class="dropdown-menu dropdown-menu-right drop-content-black" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item " style="color:white" href="index.php?a=editarCuenta">Editar Cuenta</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item " style="color:white" href="config/cerrarSesion.php">Cerrar Sesión</a>
                                </div>
                            </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <div class="imagen_derecha">
                <img src="assets/images/nube derecha.png" class="img-fluid" >
        </div> 
        <div class="imagen_izquierda">
                    <img src="assets/images/nube izquierda.png" class="img-fluid" >
        </div>
        <section>
            <div class="titulos centrado">
                <?php
                    if(isset($errorRegistrar)){
                        echo "<p  class='centrado fuentes h-100' style='font-size:2vw; color:white;'>".$errorRegistrar."</p>";
                    }else{
                        if(isset($registrarExito)){
                            echo "<p  class='centrado fuentes h-100' style='font-size:2vw; color:white;'>".$registrarExito."</p>";
                        }else{
                            ?>  <h1 style="color: white;text-align:center" class="titulos">Bienvenido de nuevo</h1>      <?php
                        }
                    }
                ?>
            </div>
            <div class="col-xl-12 col-md-12 col-xs-12 row centrado" style="margin: 0;">
                <a class="col-xl-3 col-md-3 col-xs-9 panel panel1" style="text-align:center;text-decoration:none" href="index.php?a=solicitarPedido">
                    <span class="icono inicio-cliente"></span>
                    <p class="letra">Solicitar Pedido</p>
                </a>
                <a class="col-xl-3 col-md-3 col-xs-9 panel panel2" style="text-align:center;text-decoration:none" href="index.php?a=tarifas">
                    <span class="iconoSolid inicio-cliente"></span>
                    <p class="letra">Tarifas</p>
                </a>
                <a class="col-xl-3 col-md-3 col-xs-9 panel panel3" style="text-align:center; text-decoration:none" href="index.php?a=misPedidos">
                    <span class="iconoSolid inicio-cliente"></span>
                    <p class="letra">Mis Pedidos</p>
                </a>
            </div>
        </section>
    </body>
    <div class="moto col-lg-2 col-md-3 col-xs-6">
        <img src="assets/images/moto.png" class="img-fluid" >
    </div>
    <footer class="w-100"  style="display: flex; justify-content:center">
            <div class="w-100 footer-background">
                <p class="footerText">Si necesitas más información de nuestros servicios<br>
                    nos puedes escribir en nuestras redes sociales:</p>
                <div class="w-90 d-flex centrado">
                    <div class="ancho-40 text-align-center">
                        <p class="iconoBrands facebook"> +502 4860 7638 <br> +502 3596 2610</p>
                    </div>
                    <div class="ancho-40 text-align-center">
                        <a href="https://www.facebook.com/Alasgt-693341821107003" class="iconoBrands facebook h-100 w-100 centrado"> AlasGT</a>
                    </div>
                    <div class="ancho-40 text-align-center">
                        <p class="icono facebook centrado h-100 w-100"> alasentregas@gmail.com</p>
                    </div>
                </div>
                <div class="w-100 centrado">
                    <div class="form-footer">
                        <form action="index.php?a=mandarCorreo" id="correo" method="POST">
                            <div class="d-flex">
                                <input type="text" class="form-control form-correo" style="margin-top:7px; margin-bottom:7px; margin-right:7px" required placeholder="Nombre completo" name="nombre">
                                <input type="email" class="form-control form-correo" style="margin-top:7px; margin-bottom:7px;" required placeholder="Email" name="email">
                            </div>
                            <div class="d-flex">
                                <input type="number" class="form-control form-correo" style="margin-top:7px; margin-bottom:7px;" required placeholder="Teléfono" name="telefono">
                            </div>
                            <div class="d-flex">
                                <textarea  class="form-control form-correo textarea1" style="margin-top:7px; margin-bottom:7px;" required placeholder="Escribe tu mensaje" name="mensaje" form="correo"></textarea>
                            </div>
                            <div class="centrado">
                                <button type="submit"  form="correo" class="custom-btn btn-3"><span>Enviar</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </footer>      
    <script src="scripts/funciones.js"></script>          
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>