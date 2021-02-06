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
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark menu">
                <div class="ancho-50 d-flex">
                    <div class="ancho-40" style="display: flex;">
                        <div class="col-lg-6 col-md-6 col-xs-6">
                            <a  href="#">
                                <img class="imagen img-fluid" src="assets/images/Logotipo sin fondo.png"  alt="AlasGT">
                            </a>
                        </div>
                        <div class="centrado col-lg-6 col-md-6 col-xs-6">
                            <a class="navbar-brand tamaño" href="#"><?php echo $usuario->getNombre() ." ".$usuario->getApellido();?></a>
                        </div>
                    </div>
                    <div class="ancho-60" style="display: flex;">
                        <div style="display: flex; align-items:center">
                            <button class="navbar-toggler" style="margin: 0 !important;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                        <div class="w-100">
                            <form class="form-inline navbar w-100" style="display: flex;" id="formBuscar" action="" method="POST">
                                <input name="id" class="form-texto-buscar form-control   mr-sm-2" type="number" placeholder="Buscar Pedido">
                                <button class="boton-search tamaño" type="submit"></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="ancho-50 d-flex justify-content-flex-end">
                    <div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Inicio<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?a=chat">Dudas o Inconvenientes(Chat)</a>
                            </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <section style="min-height: 100%;">
            <div class="titulos centrado">
                <h1 class="titulos" style="color: white;">Mis Pedidos</h1>
            </div>
            <div id="pedidos" style="padding:10px">
            
                <?php
                
                $result=$result1;
                if($result->fetch_row()){
                    
                    foreach($result as $resultadoActual){
                        
                    echo "
                        <div class='col-lg-12 row centrado' style='padding:0px'>
                            <div  class='col-lg-5 col-md-9 col-xs-9 pedidos'>
                                <div class='row col-lg-12 col-md-12 col-xs-12'>
                                    <div class='fecha w-60'>
                                        <p class='fuentes campos'>fecha: ".$resultadoActual['pedidoFecha']."</p>
                                    </div>
                                    <div class='w-40' style='text-align: right;'>
                                        <p class='campos fuentes'>".$resultadoActual['pedidoId']."</p>
                                    </div>
                                </div>
                                <div class='row col-lg-12 col-md-12 col-xs-12 centrado-absoluto'>
                                    <div class='fecha col-lg-6' style='display:flex; align-items:center'>
                                            <div class='w-50'>
                                                <p class='campos fuentes'>Receptor:</p>
                                            </div>
                                            <div class='w-50'>
                                                <p class='campos fuentes'>".$resultadoActual['nombreReceptor']."</p>
                                            </div>
                                    </div>
                                    <div class='fecha col-lg-6' style='display:flex; align-items:center;'>
                                            <div class='w-50'>
                                                <p class='campos fuentes'>Usuario:</p>
                                            </div>
                                            <div class='w-50'>
                                                <p class='campos fuentes'>".$resultadoActual['cliente']."</p>
                                            </div>
                                    </div>
                                </div>
                                <div class='row col-lg-12 col-md-12 col-xs-12'>
                                    <div class='fecha col-lg-2 col-md-2 col-xs-2 centrado-absoluto'>
                                        <p class='campos fuentes'>Dirección Recolección:</p>
                                    </div>
                                    <div class='col-lg-10 col-md-10 col-xs-10' style='display:flex;  align-items:center'>
                                        <p class='campos fuentes'>".$resultadoActual['pedidoDireccionInicio']." ".$resultadoActual['puntoInicioDesc']."</p>
                                    </div>
                                </div>
                                <div class='row col-lg-12 col-md-12 col-xs-12'>
                                    <div class='fecha col-lg-2 col-md-2 col-xs-2 centrado-absoluto'>
                                        <p class='campos fuentes'>Dirección Final:</p>
                                    </div>
                                    <div class='col-lg-10 col-md-10 col-xs-10' style='display:flex;  align-items:center'>
                                        <p class='campos fuentes'>".$resultadoActual['pedidoDireccionFinal']." ".$resultadoActual['puntoFinalDesc']." ".$resultadoActual['nombreLugarDesc']."</p>
                                    </div>
                                </div>
                                <div class='row col-lg-12 col-md-12 col-xs-12'>
                                    <div class='fecha col-lg-2 col-md-2 col-xs-2 centrado-absoluto'>
                                        <p class='campos fuentes'>Comentario:</p>
                                    </div>
                                    <div class='col-lg-10 col-md-10 col-xs-10' style='display:flex;  align-items:center'>
                                        <p class='campos fuentes'>".$resultadoActual['pedidoDesc']."</p>
                                    </div>
                                </div>
                                <div class='row col-lg-12 col-md-12 col-xs-12'>
                                    <div class='col-lg-6' style='display:flex'>
                                        <div class='fecha w-50'>
                                            <p class='campos fuentes'>Mensajero:</p>
                                        </div>
                                        <div class='w-50'>
                                            <p class='campos fuentes'>".$resultadoActual['mensajero']."</p>
                                        </div>
                                    </div>
                                    <div class='col-lg-6' style='display:flex'>
                                        <div class='fecha w-50'>
                                            <p class='campos fuentes'>Teléfono:</p>
                                        </div>
                                        <div class='w-50 fecha'>
                                            <p class='campos fuentes'>".$resultadoActual['pedidoTelefonoReceptor']."</p>
                                        </div>
                                    </div>
                                </div>
                                <div class='row col-lg-12 col-md-12 col-xs-12' >
                                    <div class='col-lg-6' style='display:flex;'>
                                        <div class='fecha w-50'>
                                            <p class='campos fuentes'>Estado:</p>
                                        </div>
                                        <div class='w-50'>
                                            <p id='estado' class='campos fuentes'>".$resultadoActual['estadoPedidoDesc']."</p>
                                        </div>
                                    </div>
                                    <div class='col-lg-6' style='display:flex;'>
                                    <div class='w-50'>
                                        <p class='campos fuentes'>Monto: ".$resultadoActual['pedidoMonto']."</p>
                                    </div>
                                    <div class='fecha w-50'>
                                        <p class='campos fuentes'>Precio del Envío: ".$resultadoActual['pedidoCosto']."</p>
                                    </div>
                                </div>
                                ";
                                if($resultadoActual['estadoPedidoDesc']=='En Revisión'|| $resultadoActual['estadoPedidoDesc']=='Pendiente'){
                                    $idPedido = $resultadoActual['pedidoId'];
                                    echo "
                                    <a class='custom-btn btn-3' style='text-decoration:none; text-align:center' href='index.php?a=EditarPedidoCliente&idPedido=".$idPedido."'><span>Editar</span></a>
                                    </div>
                                    </div>
                                ";
                                    }else{
                                        if($resultadoActual['estadoPedidoDesc']='Entregado'){
                                            echo "<button class='custom-btn btn-3' disabled><span>Entregado</span></button>
                                            </div> </div>
                                            ";
                                        }
                                    }   
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