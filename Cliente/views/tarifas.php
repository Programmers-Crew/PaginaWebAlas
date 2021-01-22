<?php


?>



<!DOCTYPE html>
<html lang="es">
    <head>
        <title>AlasGT-Tarifas</title>
        
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
        <link rel="stylesheet" href="css/inicio.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    </head>
    <body>     
    <div class="imagen_derecha-inicio">
                <img src="assets/images/nube derecha.png" class="img-fluid" >
        </div> 
        <div class="imagen_izquierda-inicio">
                    <img src="assets/images/nube izquierda.png" class="img-fluid" >
        </div>
        <header style="padding: 0;">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark menu">
                <a class="" style="padding-left: 10px;" href="#">
                    <img src="assets/images/Logotipo sin fondo.png" width="75px" height="50" alt="">
                </a>
                <a class="navbar-brand" style="padding-left:10px" href="#"><?php echo $usuario->getNombre() ." ".$usuario->getApellido();?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content:flex-end;">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?a=chat">Dudas o Inconvenientes(Chat)</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Mi Cuenta
                        </a>
                        <div class="dropdown-menu dropdown-menu-right drop-content-black" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" style=" color:white !important;" href="index.php?a=editarCuenta">Editar Cuenta</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" style=" color:white !important;" href="config/cerrarSesion.php">Cerrar Sesión</a>
                        </div>
                    </li>
                    </ul>
                    
                </div>
            </nav>
        </header>
        <section style="min-height: 100%;">
            <div class="titulos centrado">
                <h1 style="color: white; font-size:7vw"><span style="font-family: berlin sans FB; font-size:5vw">¡</span>Conoce Nuestras Tarifas<span style="font-family: berlin sans FB; font-size:5vw;">!</span></h1>
            </div>
            <div class="col-xl-12 col-md-12 col-xs-12 row centrado" style="margin-right: 0;">
                <div class="col-xl-9 col-md-9 col-xs-9 galeria row">
                    <?php
                        $folder_path = 'assets/images/tarifas/'; 

                        $num_files = glob($folder_path . "*.{JPG,jpg,gif,png,bmp,jpeg}", GLOB_BRACE);

                        $folder = opendir($folder_path);
                        
                        if($num_files > 0){
                            while(false !== ($file = readdir($folder))) {

                                $file_path = $folder_path.$file;
                                $extension = strtolower(pathinfo($file ,PATHINFO_EXTENSION));
                                $nombre = basename($file_path,'.'.$extension);
                                if($extension=='jpg' || $extension =='png' || $extension == 'gif' || $extension == 'bmp' || $extension == 'jpeg') {
                                    ?>  
                                        <div class="columna col-xl-4 col-md-12 col-xs-12 centrado" id="columna" onclick="galeria('<?php echo $nombre.'.'.$extension; ?>');">
                                            <div class="contenedor">
                                                
                                                <img class="img-fluid imagen-activado" id="imagenTarifa" name="imagenTarifa" src="<?php echo $file_path; ?>">
                                                <div class="texto-imagen-activado">
                                                    <span class="fuentes text">¡Toca para Ver!</span>
                                                </div>
                                                <div style="text-align: center;">
                                                    <span class="fuentes texto"><?php  echo $nombre;  ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                        }else{
                            echo "the folder was empty !";
                        }
                        closedir($folder);
                    ?>
                    
                    
                </div>
            </div>
        </section>
    </body>
    <footer class="w-100"  style="display: flex; justify-content:center;align-items:flex-end; ">
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
        <div onclick="preview();" class="desactivado" id="preview">

        </div>
    <script>
       function galeria(url){
            console.log(url);
            document.getElementById('preview').classList.remove('desactivado');
            document.getElementById('preview').classList.add('activado');
            document.getElementById('preview').innerHTML = '<img class="img-fluid" style="height:100%;margin: auto; display:flex" src="assets/images/tarifas/'+url+'">';
        }

        function preview(){
            document.getElementById('preview').classList.remove('activado');
            document.getElementById('preview').classList.add('desactivado');
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>