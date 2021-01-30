<?php
     require_once 'controllers/PedidosController.php';
     $pedidos = new Pedidos();
     if(isset($_POST['id'])){
        $result1 = $pedidos->getPedidosBuscadoCliente($_POST['id'],$usuario->getId());
    }else{
        if(isset($_GET['f'])){
            switch($_GET['f']){
                case 'enRevision':
                    $result1 = $pedidos->getPedidosEstado('En Revisión');
                    break;
                case 'pendiente':
                    $result1 = $pedidos->getPedidosEstado('Pendiente');
                    break;
                case 'entregados':
                    $result1 = $pedidos->getPedidosEstado('Entregado');
                    break;
                case 'fecha':
                    $result1 = $pedidos->getPedidosfecha($_POST['fecha']);
                    break;
            }
        }else{
            $result1 = $pedidos->getPedidosCliente($usuario->getId());
        }
        
    }
?>



<!DOCTYPE html>
<html lang="es">
    <head>
        <title>AlasGT-Mis Pedidos</title>
        
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
                <form class="form-inline navbar my-2 my-lg-0 col-xl-4 col-md-4 col-xs-4" id="formBuscar" action="" method="POST">
                    <input style="padding: 0; margin:0" name="id" class="form-texto-buscar form-control   mr-sm-2 col-xl-9 col-md-9 col-xs-9" type="number" placeholder="Buscar Pedido">
                    <button style="padding: 0; margin:0" class="boton-search col-xl-2 col-md-2 col-xs-2" type="submit"></button>
                </form>
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
        <div class="moto col-lg-2 col-md-3 col-xs-6">
                <img src="assets/images/moto.png" class="img-fluid" >
        </div>
        <section style="min-height: 100%;">
            <div class="titulos centrado">
                <h1 style="color: white; font-size:7vw"><span style="font-family: berlin sans FB; font-size:5vw">¡</span>Mis Pedidos<span style="font-family: berlin sans FB; font-size:5vw;">!</span></h1>
            </div>
            <div id="pedidos">
            
                <?php
                  
                    $result=$result1;
                    if($result->fetch_row()){
                        
                        foreach($result as $resultadoActual){
                            
                        echo "
                            <div class='col-xl-12 row centrado'>
                                <div  class='col-xl-5 col-md-9 col-xs-9 pedidos'>
                                    <div class='row col-xl-12 col-md-12 col-xs-12' style='margin-top: 10px;'>
                                        <div class='fecha col-xl-6 col-md-6 col-xs-6'>
                                            <p class='fuentes campos'>fecha: ".$resultadoActual['pedidoFecha']."</p>
                                        </div>
                                        <div class='col-xl-6 col-md-6 col-xs-6' style='text-align: right;'>
                                            <p class='campos fuentes'>".$resultadoActual['pedidoId']."</p>
                                        </div>
                                    </div>
                                    <div class='row col-xl-12 col-md-12 col-xs-12'>
                                        <div class='fecha col-xl-2 col-md-2 col-xs-2'>
                                            <p class='campos fuentes'>Receptor:</p>
                                        </div>
                                        <div class='col-xl-4 col-md-4 col-xs-4'>
                                            <p class='campos fuentes'>".$resultadoActual['nombreReceptor']."</p>
                                        </div>
                                        <div class='fecha col-xl-2 col-md-2 col-xs-2'>
                                            <p class='campos fuentes'>Usuario:</p>
                                        </div>
                                        <div class='col-xl-3 col-md-3 col-xs-3'>
                                            <p class='campos fuentes'>".$resultadoActual['cliente']."</p>
                                        </div>
                                    </div>
                                    <div class='row col-xl-12 col-md-12 col-xs-12'>
                                        <div class='fecha col-xl-2 col-md-2 col-xs-2'>
                                            <p class='campos fuentes'>Dirección Recolección:</p>
                                        </div>
                                        <div class='col-xl-10 col-md-10 col-xs-10' style='display:flex;  align-items:center'>
                                            <p class='campos fuentes'>".$resultadoActual['pedidoDireccionInicio']." ".$resultadoActual['puntoInicioDesc']."</p>
                                        </div>
                                    </div>
                                    <div class='row col-xl-12 col-md-12 col-xs-12'>
                                        <div class='fecha col-xl-2 col-md-2 col-xs-2 centrado-absoluto'>
                                            <p class='campos fuentes'>Dirección Final:</p>
                                        </div>
                                        <div class='col-xl-10 col-md-10 col-xs-10' style='display:flex;  align-items:center'>
                                            <p class='campos fuentes'>".$resultadoActual['pedidoDireccionFinal']." ".$resultadoActual['puntoFinalDesc']." ".$resultadoActual['nombreLugarDesc']."</p>
                                        </div>
                                    </div>
                                    <div class='row col-xl-12 col-md-12 col-xs-12'>
                                        <div class='fecha col-xl-2 col-md-2 col-xs-2'>
                                            <p class='campos fuentes'>Mensajero:</p>
                                        </div>
                                        <div class='col-xl-4 col-md-4 col-xs-4'>
                                            <p class='campos fuentes'>".$resultadoActual['mensajero']."</p>
                                        </div>
                                        <div class='fecha col-xl-2 col-md-2 col-xs-2'>
                                            <p class='campos fuentes'>Teléfono:</p>
                                        </div>
                                        <div class='col-xl-3 col-md-3 col-xs-3'>
                                            <p class='campos fuentes'>".$resultadoActual['pedidoTelefonoReceptor']."</p>
                                        </div>
                                    </div>
                                    <div class='row col-xl-12 col-md-12 col-xs-12' >
                                        <div class='fecha col-xl-2 col-md-2 col-xs-2'>
                                            <p class='campos fuentes'>Estado:</p>
                                        </div>
                                        <div class='col-xl-4 col-md-4 col-xs-4'>
                                            <p id='estado' class='campos fuentes'>".$resultadoActual['estadoPedidoDesc']."</p>
                                        </div>
                                        <div class='col-xl-3 col-md-3 col-xs-3'>
                                            <p class='campos fuentes'>Monto: ".$resultadoActual['pedidoMonto']."</p>
                                        </div>
                                        <div class='fecha col-xl-3 col-md-3 col-xs-3' style='float: right;'>
                                            <p class='campos fuentes'>Precio del Envío: ".$resultadoActual['pedidoCosto']."</p>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    }else{
                        
                        echo "
                        <div class='centrado fuentes h-100' style='font-size:2vw; color:white;'>
                            <span>No se encontraron resultados de la busqueda</span>
                        </div>";
                    }

                ?>
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