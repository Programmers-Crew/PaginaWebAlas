<?php

    include_once 'controllers/chatController.php';
?>



<!DOCTYPE html>
<html lang="es">
    <head>
        <title>AlasGT-Chat</title>   
        <link rel="shortcut icon" href="assets/images/Logotipo sin fondo.png" />     
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
                    <div style="display: flex;">
                        <input name="username" id="userNameBuscar" class="form-texto-buscar form-control   mr-sm-2" type="text" placeholder="Buscar Usuario (userName)">
                        <button class="boton-search tamaño" type="button" href="javascript:;" onclick="buscarUserName()"></button> 
                    </div>
                    </div>
                    <div class="chatsSalas">
                        <h5 class="titulos" style="color: white; text-align:center">Chats:</h5>
                        <?php 
                            $chatObtenerChat = new Chat();
                            $resultadoObtenerChat = $chatObtenerChat->listarUsuarioChat($usuario->getId());
                            if($resultadoObtenerChat->fetch_row()){
                                foreach($resultadoObtenerChat as $resultadoActual2){
                                    ?>
                                        <div class="salas">
                                               <?php
                                                    $chatObtenerSala = new Chat();
                                                    $receiver = $resultadoActual2['UsuarioReceiverId'];
                                                    $receptorname1 = $resultadoActual2["receptorUser"];
                                                    $sala = $chatObtenerSala->buscarSala($usuario->getId(),$receiver);
                                               ?>
                                               
                                               <input type="hidden" id="receptorName" value="<?php echo $resultadoActual2['receptorUser'] ?>">
                                                <input type="button"  onclick="nuevoUsuario(<?php echo $receiver ?>,<?php echo $usuario->getId()?>,'<?php echo $receptorname1 ?>','<?php echo $usuario->getUsuario() ?>')" class="botonChat" value="<?php echo $resultadoActual2['receptorUser'] ?>">
                                        </div>
                                    <?php
                                }
                            }else{
                                ?>
                                    <h5 style="color: white; text-align:center" id="valido">No tienes Chats por el momento</h5>
                                <?php
                            }

                        ?>
                    </div>
                    <div class="posiblesChats" id="contenedorPosiblesChat">
                        <h5 class="titulos" style="color: white; text-align:center">Usuarios</h5>
                        <div id="contentDefect">
                        <?php 
                            $chatObtenerUsuario = new Chat();
                            $resultadoObtenerUsurio = $chatObtenerUsuario->listarUsuario();
                            if($resultadoObtenerUsurio->fetch_row()){
                                foreach($resultadoObtenerUsurio as $resultadoActual){
                                    ?>
                                        <div class="salas">
                                            <form action="index.php?a=nuevoChat" style="width: 100%;" id="formSalas" method="POST">
                                                <input type="hidden"  id="idUsuarioReceiver" value="<?php echo $chatObtenerUsuario->getReceptorId()?>">
                                                <input type="hidden" name="idUsuarioReceiver" value="<?php echo $resultadoActual['usuarioId'] ?>">
                                                <input type="hidden" name="idUsuarioSend" id="idSend" value="<?php echo $usuario->getId() ?>">
                                                <input type="hidden" id="nombre" value="<?php $receptorname1?>">
                                                <input type="submit" class="botonChat" id="botonChat"  value="<?php echo $resultadoActual['userName'] ?>">
                                            </form>
                                        </div>
                                    <?php
                                }
                            }else{
                                ?>
                                    <h5 id="valido" style="color: white; text-align:center">No hay Usuarios Registrados</h5>
                                <?php
                            }
                           

                        ?>
                        </div>
                    </div>
                   
                </div>
                <div>
                    
                </div>
                <div class="contenedorMensajes">
                    <div class="cajasTexto" id="contenedorMensaje1"> 
                        <h5 id="validoMensaje" style="color: white; text-align:center">Selecciona un chat</h5>
                    </div>
                    <div class="contenedorForm">
                        <div style="display:flex; align-items:center" class="block">
                                <div style="width: 75%; margin-left: 10px; margin-right:10px">
                                    <input type="hidden" id="receiver" value="<?php echo $receiver ?>">
                                    <input type="hidden" id="idUsuario" value="<?php echo $usuario->getId() ?>">
                                    <input type="text" name="mensaje" id="mensaje" class="form-control" placeholder="Ingrese su mensaje">
                                </div>
                                <div style="width: 20%;">
                                    <button  style="width: 100%;" onclick="nuevoMensaje($('#mensaje').val(),<?php echo $sala ?>,<?php echo $usuario->getId(); ?>,<?php echo $receiver ?>)"  class="btn-3 custom-btn"><span style="font-family: fa-solid-900;"></span></button>
                                </div>
                        </div>
                    </div>

                </div>
                    
            </div>
           
        </section>
    </body>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="scripts/chat.js"></script>
</html>