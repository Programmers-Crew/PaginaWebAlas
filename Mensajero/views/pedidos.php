<?php
     require_once 'controllers/PedidosController.php';
     require_once 'controllers/UsuariosController.php';
     $pedidos = new Pedidos();
     if(isset($_POST['id'])){
        $result1 = $pedidos->getPedidosBuscadoMensajero($_POST['id'],$usuario->getId());
    }else{
        $result1 = $pedidos->getPedidosMensajero($usuario->getId());
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
                <div class="d-flex ancho-80">
                    <div class="ancho-40" style="display: flex;">
                        <a class="" style="padding-left: 10px;" href="#">
                            <img src="assets/images/Logotipo sin fondo.png" width="75px" height="50" alt="">
                        </a>
                        <a class="navbar-brand" style="padding-left:10px" href="#"><?php echo $usuario->getNombre() ." ".$usuario->getApellido();?></a>
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
                                <a class="nav-link " href="index.php">Inicio<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="index.php?a=chat">Dudas o Inconvenientes(Chat)</a>
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
            <?php
                if(isset($errorRegistrar)){
                    echo "
                    <p  class='centrado fuentes h-100' style='font-size:1rem; color:white;'>".$errorRegistrar."</p>";
                }else{
                    if(isset($registrarExito)){
                        echo "<p  class='centrado fuentes h-100 ' style='font-size:1rem; color:white;'>".$registrarExito."</p>";
                    }
                }
            ?>
            <div id="pedidos" style="padding:10px">
            
                <?php
                
                $result=$result1;
                if($result->fetch_row()){
                    
                    foreach($result as $resultadoActual){
                        $idUsuario = $resultadoActual['pedidoUsuarioId'];
                        $usuario1 = new Usuarios();

                        $resultado = $usuario1->usuarioBuscar($idUsuario);
                        foreach($resultado as $resuladoActualUsuario){
                            $clienteCuenta = $resuladoActualUsuario['empresaNumeroCuenta'];
                            $banco = $resuladoActualUsuario['empresaBanco'];
                            $tipoCuenta = $resuladoActualUsuario['empresaCuentaTipo'];
                        }
                        $usuario2 = new Usuarios();
                        $resultado2 = $usuario2->buscarTipoCuentaUsuario($tipoCuenta);
                        foreach($resultado2 as $resuladoActualUsuario2){
                            $tipoCuentaDesc = $resuladoActualUsuario2['tipoCuentaDesc'];
                        }
                        $usuario3 = new Usuarios();
                        $resultado3 = $usuario3->buscarBanco($banco);
                        foreach($resultado3 as $resuladoActualUsuario3){
                            $bancoDesc = $resuladoActualUsuario3['bancoDesc'];
                        }
                    echo "
                        <div class='col-xl-12 row centrado' style='padding:0px'>
                            <div  class='col-lg-5 col-md-9 col-xs-9 pedidos'>
                                <div class='row col-xl-12 col-md-12 col-xs-12'>
                                    <div class='fecha w-60'>
                                        <p class='fuentes campos'>fecha: ".$resultadoActual['pedidoFecha']."</p>
                                    </div>
                                    <div class='w-40' style='text-align: right;'>
                                        <p class='campos fuentes'>".$resultadoActual['pedidoId']."</p>
                                    </div>
                                </div>
                                <div class='row col-xl-12 col-md-12 col-xs-12 centrado-absoluto'>
                                    <div class='fecha col-xl-6' style='display:flex; align-items:center'>
                                            <div class='w-50'>
                                                <p class='campos fuentes'>Receptor:</p>
                                            </div>
                                            <div class='w-50'>
                                                <p class='campos fuentes'>".$resultadoActual['nombreReceptor']."</p>
                                            </div>
                                    </div>
                                    <div class='fecha col-xl-6' style='display:flex; align-items:center;'>
                                            <div class='w-50'>
                                                <p class='campos fuentes'>Usuario:</p>
                                            </div>
                                            <div class='w-50'>
                                                <p class='campos fuentes'>".$resultadoActual['cliente']."</p>
                                            </div>
                                    </div>
                                    <div class='fecha col-xl-6' style='display:flex; align-items:center'>
                                            <div class='w-50'>
                                                <p class='campos fuentes'>No. cuenta:</p>
                                            </div>
                                            <div class='w-50'>
                                                <p class='campos fuentes'>".$clienteCuenta."</p>
                                            </div>
                                    </div>
                                    <div class='fecha col-xl-6' style='display:flex; align-items:center'>
                                            <div class='w-50'>
                                                <p class='campos fuentes'>Tipo de Cuenta:</p>
                                            </div>
                                            <div class='w-50'>
                                                <p class='campos fuentes'>".$tipoCuentaDesc."</p>
                                            </div>
                                    </div>
                                    <div class='fecha col-xl-6' style='display:flex; align-items:center'>
                                            <div class='w-50'>
                                                <p class='campos fuentes'>Banco:</p>
                                            </div>
                                            <div class='w-50'>
                                                <p class='campos fuentes'>".$bancoDesc."</p>
                                            </div>
                                    </div>
                                </div>
                                <div class='row col-xl-12 col-md-12 col-xs-12'>
                                    <div class='fecha col-xl-2 col-md-2 col-xs-2 centrado-absoluto'>
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
                                <div class='row col-lg-12 col-md-12 col-xs-12'>
                                            <div class='fecha col-lg-2 col-md-2 col-xs-2 centrado-absoluto'>
                                                <p class='campos fuentes'>Comentario:</p>
                                            </div>
                                            <div class='col-lg-10 col-md-10 col-xs-10' style='display:flex;  align-items:center'>
                                                <p class='campos fuentes'>".$resultadoActual['pedidoDesc']."</p>
                                            </div>
                                        </div>
                                <div class='row col-xl-12 col-md-12 col-xs-12'>
                                    <div class='col-xl-6' style='display:flex'>
                                        <div class='fecha w-50'>
                                            <p class='campos fuentes'>Mensajero:</p>
                                        </div>
                                        <div class='w-50'>
                                            <p class='campos fuentes'>".$resultadoActual['mensajero']."</p>
                                        </div>
                                    </div>
                                    <div class='col-xl-6' style='display:flex'>
                                        <div class='fecha w-50'>
                                            <p class='campos fuentes'>Teléfono Receptor:</p>
                                        </div>
                                        <div class='w-50 fecha'>
                                            <p class='campos fuentes'>".$resultadoActual['pedidoTelefonoReceptor']."</p>
                                        </div>
                                    </div>
                                </div>
                                <div class='row col-xl-12 col-md-12 col-xs-12' >
                                    <div class='col-xl-6' style='display:flex;'>
                                        <div class='fecha w-50'>
                                            <p class='campos fuentes'>Estado:</p>
                                        </div>
                                        <div class='w-50'>
                                            <p id='estado' class='campos fuentes'>".$resultadoActual['estadoPedidoDesc']."</p>
                                        </div>
                                    </div>
                                    <div class='col-xl-6' style='display:flex;'>
                                    <div class='w-50'>
                                        <p class='campos fuentes'>Monto: ".$resultadoActual['pedidoMonto']."</p>
                                    </div>
                                    <div class='fecha w-50'>
                                        <p class='campos fuentes'>Precio del Envío: ".$resultadoActual['pedidoCosto']."</p>
                                    </div>
                                </div>
                                ";
                                if($resultadoActual['estadoPedidoDesc'] == "Pendiente"){
                                    ?>
                                    <div>
                                        <form  name='formEntregar' id='formEntregar'>
                                            <input type='hidden' name='id' value="<?php echo  $resultadoActual['pedidoId'] ?>">
                                            <input type='hidden' name='a' value='entregar'>
                                            <button class='custom-btn btn-3' type='submit' form='formEntregar'><span>Entregar</span></button>
                                        </form>
                                    </div>
                                    </div>
                                    </div>
                                    <?php
                                }else{
                                    ?>

                                    <div>
                                        <button class="custom-btn btn-3" disabled><span>ENTREGADO</span></button>
                                    </div>
                                    </div>
                                    </div>  
                                <?php
                                }
                    }
                }else{
                    
                    echo "
                        <div class='centrado fuentes h-100' style='font-size:2vw; color:white;'>
                            <span>No se encontraron resultados de la busqueda</span>
                        </div>
                    ";
                }

                ?>
            </div>
        </section>
        <div class="moto col-lg-2 col-md-3 col-xs-6">
                <img src="assets/images/moto.png" class="img-fluid" >
        </div>
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