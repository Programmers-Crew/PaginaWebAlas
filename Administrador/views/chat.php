<?php


?>



<!DOCTYPE html>
<html lang="es">
    <head>
        <title>AlasGT-Chat</title>        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <link rel="stylesheet" href="css/chat.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    </head>
    <body>    
            <header style="padding: 0;">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark menu">
                    <div class="w-100 d-flex">
                        <div class="w-20 h-100">
                            <a onclick="botonMenuChat()" class="iconoSolid botonChats"></a>
                        </div>
                        <div  class="w-80 opciones1">
                            <a class="" style="padding-left: 10px;" href="#">
                                <img src="assets/images/Logotipo sin fondo.png" width="75px" height="50" alt="">
                            </a>
                            <a class="navbar-brand" style="padding-left:10px" href="#"><?php echo $usuario->getNombre() ." ".$usuario->getApellido();?></a>
                            <div  >
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">Inicio<span class="sr-only">(current)</span></a>
                                    </li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
        <section>
            <div class="h-100 w-100 d-flex">
                <div class="sidebar col-lg-3" id="sidebar">
                    <div>
                        <form class=" w-100" style="display: flex;" id="formBuscar" action="" method="POST">
                            <input name="username" class="form-texto-buscar form-control   mr-sm-2" type="text" placeholder="Buscar Usuario">
                            <button class="boton-search tamaño" type="submit"></button>
                        </form>
                    </div>
                    <div style="margin-top: 10px;">
                        <h5 class="titulos" style="color: white; text-align:center">Mis Chats</h5>
                        <div class="salas">
                            <a>Administrador</a>
                        </div>
                    </div>
                   
                </div>
                <div>
                    
                </div>
                <div class="contenedorMensajes">
                    <div class="cajasTexto">
                        <div class="contenedor1">
                            <div class="cajaChatReceptor col-lg-6">
                                <div>
                                    <span>Davis Roldán</span>
                                </div>
                                <div>
                                    <span>
                                        Hola esto es un mensaje, tengo una duda
                                    </span>
                                </div>
                                <div>
                                    <span>
                                        9.00 PM
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="contenedor2">
                            <div class="cajaChatUsuario col-lg-6">
                                <div>
                                    <span>Davis Roldán</span>
                                </div>
                                <div>
                                    <span>
                                        Hola esto es un mensaje, tengo una duda
                                    </span>
                                </div>
                                <div>
                                    <span>
                                        9.00 PM
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contenedorForm">
                        <div>
                            <form style="display: flex; align-items:center">
                                <div style="width: 80%; margin-left: 10px;">
                                    <input type="text" class="form-control" placeholder="Ingrese su mensaje">
                                </div>
                                <div>
                                    <button type="submit" form="formFecha" class="btn-3 custom-btn"><span style="font-family: fa-solid-900;"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                    
            </div>
           
        </section>
    </body>
    <script src="scripts/chat.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>