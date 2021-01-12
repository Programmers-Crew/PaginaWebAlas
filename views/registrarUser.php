<?php
?>


<!DOCTYPE html>

<html lang="es">
    <head>
        <title>AlasGT - Registrar Usuario</title>
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
    <div style="display: flex;justify-content: center;" id="data" class="w-100 h-100">
            <section class="col-lg-12   col-xs-12  todo h-100">
                <div class="imagen_derecha">
                    <img src="assets/images/nube derecha.png" class="img-fluid" >
                </div>
                <div class="logo">
                   <a href="index.php"><img style="position: absolute;" src="assets/images/Logotipo sin fondo.png" class="img-fluid" ></a>
                </div>

                <div class="imagen_izquierda">
                    <img src="assets/images/nube izquierda.png" class="img-fluid" >
                </div>
                <div class="moto col-lg-2 col-md-3 col-xs-6">
                    <img src="assets/images/moto.png" class="img-fluid" >
                </div>
                    <div class="inicio_sesion">
                        <div class="caja col-lg-4 col-md-6 col-xs-6">
                            <h2 class="titulos">Registrar Usuario</h2>
                            <form action="#">
                                <div style="display: flex;">
                                    <p class="iconoSolid" style="color: #432A90;"> </p> <input class="form-control form-texto" style="margin-right: 2.5px;" placeholder="Ingrese su nombre" name="nombre" required  type="text">
                                    <input class="form-control form-texto" placeholder="Ingrese su Apellido" name="apellido"  type="text" style="margin-left: 2.5px;" required>
                                </div>
                                <div style="display: flex;">
                                <p class="icono" style="color: #432A90;"></p><input class="form-control form-texto" placeholder="Ingrese Un Usuario" name="usuario"  type="text" required>
                                </div>
                                <div style="display: flex;">
                                <p class="iconoSolid"> </p><input class="form-control form-texto" placeholder="Ingrese su Contraseña" name="contraseña"  type="password" required>
                                </div>
                                <div style="display: flex;">
                                <p class="iconoSolid"> </p><input class="form-control form-texto" placeholder="Confirme su Contraseña" name="contraseña1"  type="password" required>
                                </div>
                                <input class="boton btn-lg" type="submit" value="¡Registrarme!">
                            </form>
                        </div>
                    </div>
                
            </section>
            
        </div>
        <footer class="w-100"  style="display: flex; justify-content:center">
            <div class="col-lg-12   col-xs-12 footer-background">
                <p class="footerText">Si necesitas más información de nuestros servicios<br>
                    nos puedes escribir en nuestras redes sociales:</p>
                <div>
                    <div  style="display:flex; justify-content:center">
                        <div style="padding-right: 5px;">
                            <p class="iconoBrands facebook"> +502 4860 7638  +502 3596 2610</p>
                        </div>
                        <div style="padding-right: 5px; padding-left:5px;">
                            <a href="https://www.facebook.com/Alasgt-693341821107003" class="iconoBrands facebook"> AlasGT</a>
                        </div>
                        <div style="padding-right: 5px; padding-left:5px;">
                            <p class="icono facebook"> alasentregas@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content:center">
                    <form action="#" id="correo">
                        
                        <div style="display: flex;">
                            <input type="text" class="form-control" style="margin:7px;" required placeholder="Nombre completo" name="nombre">
                            <input type="email" class="form-control" style="margin:7px;" required placeholder="Email" name="email">
                        </div>
                        <div style="display: flex;">
                            <input type="number" class="form-control" style="margin:7px;" required placeholder="Teléfono" name="nombre">
                        </div>
                        <div style="display: flex;">
                            <textarea  class="form-control form-correo textarea1" style="margin:7px;" required placeholder="Escribe tu mensaje" name="mensaje" form="correo"></textarea>
                        </div>
                        <div style="display: flex; justify-content:center">
                            <input type="submit" class="boton-black  btn-lg" style="margin:7px;" required value="ENVIAR">
                        </div>
                    </form>
                </div>
            </div>
            
        </footer>
    </body>
    <script>
       $(".moto").bind("webkitAnimationEnd mozAnimationEnd animationEnd", function(){
            $(this).removeClass("animationx")  
            
            
        })

        $(".moto").hover(function(){
            $(this).addClass("animationx");        
            
        })
        
    </script>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>