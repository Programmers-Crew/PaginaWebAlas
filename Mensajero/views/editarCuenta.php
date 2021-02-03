<?php?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>AlasGT-Editar Cuenta</title>        
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
        <link rel="stylesheet" href="css/AgregarUsuario.css" type="text/css">
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
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio<span class="sr-only">(current)</span></a>
                    </li>
                    
                    </ul>
                    
                </div>
            </nav>
        </header>
        <section>
                <div class="inicio_sesion">
                    <div class="caja caja1 col-lg-7 col-md-9 col-xs-9">
                        <h2 class="titulos">Editar Cuenta</h2>
                        <form action="index.php?a=actualizarCuentaMensajero" id="formEditarCuenta" class="formEditarCuenta" method="POST">
                            <input type="hidden" name="idUsuario" value="<?php echo $usuario->getId()?>">
                            <?php
                                if(isset($errorRegistrar)){
                                    echo "<p  class='error'>".$errorRegistrar."</p>";
                                }
                            ?>
                            <div class="col-lg-12 row m-0" style="margin:0">    
                                <div class="col-lg-6 col-md-6 col-xs-12 row"  style="margin:0; margin:0 !important;">
                                    <div class="col-lg-12" style="display: flex; padding:0">
                                        <p class="iconoSolid tamaño" style="color: #432A90;"> </p> 
                                        <input class="form-control form-texto col-lg-9" placeholder="Ingrese su nombre" name="nombre" id="nombre" required value="<?php echo $usuario->getNombre()?>" type="text">
                                    </div>
                                    <div class="col-lg-12">
                                        <span style="float: left;" class=" error grupo-correcto" id="alerta_nombre">El campo nombre no puede llevar signos ni espacios</span>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-6 col-md-6 col-xs-12 row" style="margin:0; ">
                                    <div class="col-lg-12 " style=" display:flex;padding:0">
                                        <p class="iconoSolid tamaño" style="color: #432A90;"> </p> 
                                        <input class="form-control form-texto" placeholder="Ingrese su Apellido" id="apellido" name="apellido" value="<?php echo $usuario->getApellido()?>" type="text"  required>
                                    </div>
                                    <div class="col-lg-12" style="margin:0;">
                                        <span  class=" error grupo-correcto" id="alerta_apellido">El campo apellido no puede llevar signos ni espacios</span>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-12  col-xs-12 row m-0">
                                <div class="col-lg-12" style="display: flex; margin:0">
                                    <p class="icono tamaño" style="color: #432A90;"></p><input class="form-control form-texto" placeholder="Ingrese Un Usuario" name="usuarioAgregar" value="<?php echo $usuario->getUsuario()?>" id="usuarioAgregar" type="text" required>
                                </div>
                                <div class="col-lg-12">
                                    <span id="alerta_usuarioAgregar" class="error grupo-correcto">El Usuario no puede llevar espacios y/o signos<br>debe llevar por lo menos 4 caracteres</span>
                                </div>
                            </div>
                            <div class="col-lg-12 m-0 row">
                                <div class="col-lg-12" style="display: flex; margin:0">
                                    <p class="icono tamaño" style="color: #432A90;"></p><input class="form-control form-texto" placeholder="Ingrese su correo" name="correo" value="<?php echo $usuario->getCorreo()?>"  id="correo" type="email" required>
                                </div>
                                <div class="col-lg-12">
                                    <span id="alerta_correo" class="error grupo-correcto">El Email debe de llevar: '@','.'</span>
                                </div>
                            </div>
                            <div class="col-lg-12 row m-0">
                                <div class="col-lg-12" style="display: flex; margin:0">
                                    <p class="iconoSolid tamaño"> </p><input class="form-control form-texto" placeholder="Ingrese su Contraseña" name="contraseñaAgregar"  id="contraseñaAgregar" type="password" required>
                                </div>
                                <div class="col-lg-12">
                                    <span id="alerta_mayusculas" class="error grupo-correcto">Debe de tener por lo menos una mayuscula</span>    
                                    <span id="alerta_minuscula" class="error grupo-correcto">Debe de tener por lo menos una minuscula</span>
                                    <span id="alerta_rango" class="error grupo-correcto">Debe de tener de 5 a 15 caracteres.</span>
                                    <span id="alerta_numero" class="error grupo-correcto">Debe de tener por lo menos un número</span>
                                    <span id="alerta_signos" class="error grupo-correcto">La contraseña no puede llevar espacios ni signos</span>
                                </div>
                            </div>
                            <div class="col-lg-12 row m-0">
                                <div class="col-lg-12" style="display: flex;margin:0;">
                                    <p class="iconoSolid tamaño"> </p><input class="form-control form-texto" placeholder="Confirme su Contraseña" name="contraseña1" id="contraseña1" type="password" required>
                                </div>
                                <div class="col-lg-12">
                                    <span id="alerta_contraseña1" class="error grupo-correcto">Las contraseñas deben de ser iguales</span>
                                </div>
                            </div>    
                            
                            <div>
                                <span id="errorGlobal" class="error grupo-correcto">Hay campos incorrectos</span>
                            </div>                            
                            
                            <button type="submit" form="formEditarCuenta" class="custom-btn btn-3"><span>Editar</span></button>
                        </form>
                    </div>

                </div>
            </div>
        </section>
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
                        <form action="#" id="correo">
                            <div class="d-flex">
                                <input type="text" class="form-control form-correo" style="margin-top:7px; margin-bottom:7px; margin-right:7px" required placeholder="Nombre completo" name="nombre">
                                <input type="email" class="form-control form-correo" style="margin-top:7px; margin-bottom:7px;" required placeholder="Email" name="email">
                            </div>
                            <div class="d-flex">
                                <input type="number" class="form-control form-correo" style="margin-top:7px; margin-bottom:7px;" required placeholder="Teléfono" name="nombre">
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
    </body>
    <script src="scripts/editarCuentaAdmin.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>