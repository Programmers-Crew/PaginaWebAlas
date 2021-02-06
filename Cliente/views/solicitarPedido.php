<?php
    require_once 'controllers/puntosDireccionesController.php';
    $puntos = new PuntosDirecciones();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>AlasGT-Solicitar Pedido</title> 
        <link rel="shortcut icon" href="assets/images/Logotipo sin fondo.png" />       
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
        <link rel="stylesheet" href="css/solicitarPedido.css" type="text/css">
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
                    </ul>
                    
                </div>
            </nav>
        </header>
        <section style="min-height: 100%;padding-top:15px; padding-bottom:15px; margin:0" class="row">
            <div class="inicio_sesion col-xl-12">
                        <div class="caja col-lg-9 col-md-10 col-xs-10">
                            <h2 class="titulos">Solicitar Pedido</h2>
                            <form action="index.php?a=solicitarPedidoDB" id="formSolicitarPedido" class="formSolicitarPedido" method="POST">
                                <input type="hidden" name="id" value="<?php echo $usuario->getId(); ?>">
                                <input type="hidden" name="correoUsuario" value="<?php echo $usuario->getCorreo(); ?>">
                                <?php
                                    if(isset($errorRegistrar)){
                                        echo "<p  class='error'>".$errorRegistrar."</p>";
                                    }
                                    if(isset($registrarExito)){
                                        echo "<p  style='color:#0FE642; font-family: Berlin Sans FB'>".$registrarExito."</p>";
                                    }
                                ?>
                                <div class="col-lg-12 row" style="margin-top:10px; margin-right:0; margin-left:0;padding:0;">    
                                        <div class="col-lg-12 row">
                                            <div class="col-lg-3"  style="display: flex; align-items:center">
                                                <p class="fuentes" style="color: #432A90; margin:0">Nombre de Receptor:</p>
                                            </div>
                                            <div class="col-lg-9">
                                                <input class="form-control form-texto" name="nombre" id="nombre" required  type="text" placeholder="Ingrese el nombre de la persona quien recibe el paquete">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <span style="float: left;" class=" error grupo-correcto" id="alerta_nombre">El campo nombre debe de llevar un apellido</span>
                                        </div>
                                </div>
                                <div class="col-lg-12 row" style="margin-top:10px; margin-right:0; margin-left:0;padding:0;">    
                                        <div class="col-lg-12 row" >
                                            <div class="col-lg-3" style="display: flex; align-items:center">
                                                <p class="fuentes" style="color: #432A90; margin:0">Teléfono de Receptor: </p>
                                            </div>
                                            <div class="col-lg-9">
                                                <input class="form-control form-texto"  name="telefono" id="telefono" required placeholder="Ingrese el Teléfono de la persona quien recibe el paquete"  type="number">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <span style="float: left;" class=" error grupo-correcto" id="alerta_telefono">el campo Teléfono debe llevar 8 dígitos</span>
                                        </div>
                                </div>

                                <div class="col-lg-12 row" style="margin-top:10px; margin-right:0; margin-left:0;padding:0;">
                                    <div class="col-lg-12 row">
                                        <div class="col-lg-3" style="display: flex; align-items:center">
                                            <p class="fuentes" style="color:#432A90; margin:0">El Pedido Sale de:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <select onchange="cambio()" class="form-control form-texto required" form="formSolicitarPedido" name="puntoInicio" id="puntoInicio" required>
                                                <option disabled selected value="0">Eliga el lugar donde se recogerá el paquete</option>
                                                <?php
                                                    $resultado = $puntos->listarPuntoInicio();
                                                    if($resultado->fetch_row()){
                                                        foreach($resultado as $resultadoActual){
                                                            ?>
                                                            <option value="<?php echo $resultadoActual['puntoInicioCodigo']; ?>"><?php echo $resultadoActual['puntoInicioDesc']; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                            <span style="float: left;" class=" error grupo-correcto" id="alerta_puntoInicio">Debe seleccionar un Lugar</span>
                                    </div>
                                </div>

                                <div class="col-lg-12 row" style="margin-top:10px; margin-right:0; margin-left:0;padding:0;">    
                                        <div class="col-lg-12 row" >
                                            <div class="col-lg-3" style="display: flex; align-items:center">
                                                <p class="fuentes" style="color: #432A90; margin:0;text-align:initial">Descripción de Dirección Inicial:</p>
                                            </div>
                                            <div class="col-lg-9">
                                                <textarea  style="max-height: 200px;" oninput="descInicio()" id="descripcionInicial"  class="form-control form-control textarea1"  required placeholder="Breve descripción de donde se recojerá el paquete" name="descripcionInicial" form="formSolicitarPedido"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <span style="float: left;" class=" error grupo-correcto" id="alerta_descripcionInicial">Solo se permiten 150 caracteres</span>
                                        </div>
                                </div>
                                <div class="col-lg-12 row" style="margin-top:10px; margin-right:0; margin-left:0;padding:0;">
                                    <div class="col-lg-12 row">
                                        <div class="col-lg-3" style="display: flex; align-items:center">
                                            <p class="fuentes" style="color:#432A90; margin:0; text-align:initial">El Pedido se entregará en:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <select onchange="cambioFinal()" class="form-control form-texto required" form="formSolicitarPedido" name="puntoFinal" id="puntoFinal" required>
                                                <option selected value="0">Eliga el lugar donde se entregará el paquete</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                            <span style="float: left;" class=" error grupo-correcto" id="alerta_puntoFinal">Debe seleccionar un Lugar</span>
                                    </div>
                                </div>
                                <div class="col-lg-12 row" style="margin-top:10px; margin-right:0; margin-left:0;padding:0;">    
                                        <div class="col-lg-12 row" >
                                            <div class="col-lg-3" style="display: flex; align-items:center">
                                                <p class="fuentes" style="color: #432A90; margin:0; text-align:initial">Descripción de Dirección Final:</p>
                                            </div>
                                            <div class="col-lg-9">
                                                <textarea  style="max-height: 200px;" id="descripcionFinal" oninput="descFinal()" class="form-control textarea1"  required placeholder="Breve descripción de donde se entregará el paquete" name="descripcionFinal" form="formSolicitarPedido"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <span style="float: left;" class=" error grupo-correcto" id="alerta_descripcionFinal">Solo se permiten 150 caracteres</span>
                                        </div>
                                </div>
                                <div class="col-lg-12 row" style="margin-top:10px; margin-right:0; margin-left:0;padding:0;">    
                                        <div class="col-lg-12 row" >
                                            <div class="col-lg-3" style="display: flex; align-items:center">
                                                <p class="fuentes" style="color: #432A90; margin:0; text-align:initial">Comentario del paquete:</p>
                                            </div>
                                            <div class="col-lg-9">
                                                <textarea  style="max-height: 200px;" id="comentario" oninput="descComentario()" class="form-control textarea1"  required placeholder="Breve comentario, puede poner observaciones, datos extras para ayudar al mensajero etc." name="comentario" form="formSolicitarPedido"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <span style="float: left;" class=" error grupo-correcto" id="alerta_comentario">Solo se permiten 150 caracteres</span>
                                        </div>
                                </div>
                                <div class="col-lg-12 row" style="margin-top:10px; margin-right:0; margin-left:0;padding:0;">
                                        <div class="col-lg-12 row" >
                                            <div class="col-lg-3" style="display: flex; align-items:center">
                                                <p class="fuentes" style="color: #432A90; margin:0">Monto: </p>
                                            </div>
                                            <div class="col-lg-9">
                                                <input class="form-control form-texto"   name="monto" id="monto" required  type="number" step=".01" placeholder="Ingrese el monto que pagará el receptor">
                                            </div>
                                        </div>
                                    <div class="col-lg-12">
                                        <span id="alerta_monto" class="error grupo-correcto">El monto no puede llevar letras y/o signos</span>
                                    </div>
                                </div>
                                <div class="col-lg-12 row" style="margin-top:10px; margin-right:0; margin-left:0;padding:0;">
                                        <div class="col-lg-12 row" >
                                            <div class="col-lg-3" style="display: flex; align-items:center">
                                                <p class="fuentes" style="color: #432A90; margin:0">Precio de Envío: (Precio sujeto a cambios)</p>
                                            </div>
                                            <div class="col-lg-9" id="precio">
                                            </div>
                                        </div>
                                </div>                            
                                <div>
                                    <span id="errorGlobal" class="error grupo-correcto">Hay campos incorrectos</span>
                                </div>                           
                                
                                <button type="submit" form="formSolicitarPedido" class="custom-btn btn-3"><span>Solicitar</span></button>
                            </form>
                        </div>
                    </div>
            <div class="col-lg-12 col-md-12 col-xs-12" style="display: flex; align-items:flex-end">
                <img class="motoVistas col-lg-2 col-md-5 col-xs-5" src="assets/images/moto.png" class="img-fluid" >
            </div>
        </section>
        <footer class="w-100"  style="display: flex; justify-content:center">
            <div class="w-100 footer-background">
                <p class="footerText">Si necesitas más información de nuestros servicios<br>
                    nos puedes escribir en nuestras redes sociales:</p>
                <div class="w-90 dis-flex centrado">
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
            </div>
            
        </footer>      
    </body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="scripts/funciones.js"></script>
        <script src="scripts/solicitar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
