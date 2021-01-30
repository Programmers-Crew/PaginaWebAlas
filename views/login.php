<?php?>



<!DOCTYPE html>
<html lang="es">
    <head>
        <title>AlasGT</title>
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
        <link rel="stylesheet" href="css/Login.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    </head>
    <body>     
        <div class="imagen_derecha">
            <img src="assets/images/nube derecha.png" class="img-fluid" >
        </div>
        <div class="imagen_izquierda">
            <img src="assets/images/nube izquierda.png" class="img-fluid" >
        </div>
        <section>
            <div class="contenedor">
                <div class="inicio_sesion">
                    <div class="caja d-flex">
                        <div class="ancho-50 centrado">
                            <img class="img-fluid imagen" src="assets/images/login.jpg">
                        </div>
                        <div class="ancho-50 centrado contenedorform">
                            <div class="w-100">
                                <div>
                                    <h1 class="titulos">Iniciar Sesión</h1>
                                </div>
                                <div class="formInput">
                                    <form class="formInput" action="index.php" method="POST" id="formLogin" name="formLogin">
                                        <?php
                                            if(isset($registrarExito)){
                                                echo "<p style='color:#0FE642; font-family: Berlin Sans FB'>".$registrarExito."</p>";
                                            }
                                        ?>
                                        <div style="display: flex;">
                                            <p class="icono tamaño"> </p> <input class="form-control form-texto" placeholder="Ingrese su usuario" name="usuario" required  type="text">
                                        </div>
                                        <div style="display: flex;">
                                        <p  class="iconoSolid tamaño"> </p><input class="form-control form-texto" placeholder="Ingrese su Contraseña" name="contraseña" required  type="password">
                                        </div>
                                        <button type="submit"  form="formLogin" class="custom-btn btn-3"><span>Ingresar</span></button>
                                        <?php
                                            if(isset($errorLogin)){
                                                echo "<p class='error'>".$errorLogin."</p>";
                                            }
                                        ?>
                                    </form>
                                </div>
                                <br>
                                <div style="text-align:right">
                                    <a class="registrar"  href="index.php?c=Usuarios&a=registrarUsuario">Registrar Usuario</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
    <script src="scripts/funciones.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</html>