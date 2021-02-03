<?php
?>


<!DOCTYPE html>

<html lang="es">
    <head>
        <title>AlasGT - Confirmar Usuario</title>
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
        <header style="padding: 0;">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark menu">
                <a class="" style="padding-left: 10px;" href="#">
                    <img src="assets/images/Logotipo sin fondo.png" width="75px" height="50" alt="AlasGT">
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
                        <a class="nav-link" href="index.php?a=agregarUsuario">Agregar Usuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?a=chat">Dudas o Inconvenientes(Chat)</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Mi Cuenta
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="index.php?a=editarCuenta">Editar Cuenta</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="config/cerrarSesion.php">Cerrar Sesión</a>
                        </div>
                    </li>
                    </ul>
                    
                </div>
            </nav>
        </header>
            <section class="col-lg-12   col-xs-12  todo" style="min-height: 100%;">
                <div class="imagen_derecha">
                    <img src="assets/images/nube derecha.png" class="img-fluid" >
                </div>

                <div class="imagen_izquierda">
                    <img src="assets/images/nube izquierda.png" class="img-fluid" >
                </div>
             
                    <div class="inicio_sesion">
                        
                        <?php
                            require_once 'controllers/PedidosController.php';
                            $pedidos = new Pedidos();
                            $result1 = $pedidos->getPedidosBuscado($_GET['id']);
                            $result=$result1;
                                if($result->fetch_row()){
                                    
                                foreach($result as $resultadoActual){   
                                    $costoPedido = $resultadoActual['costoPedidoDesc'];
                                    $clienteId = $resultadoActual['clienteId'];
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
                                                    <p class='campos fuentes'>Precio del Envío: ".$resultadoActual['costoPedidoDesc']."</p>
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
                   
                <div class="col-xl-12 col-md-12 col-xs-12 centrado">
                    <div  class='col-xl-5 col-md-9 col-xs-9 pedidos'>
                        <form class="col-xl-12 col-md-12 col-xs-12 fuentes" id="formConfirmar" method="POST" action="index.php?a=confirmarPedido">
                        
                            <?php 
                                
                                $usuarios2= new Usuarios();
                                $resultado2 = $usuarios2->usuarioBuscar($clienteId);
                                foreach($resultado2 as $resultadoActual){
                                    echo "<input type='hidden' name='correo' value=".$resultadoActual['usuarioCorreo'].">";
                                    echo "<input type='hidden' name='nombre' value=".$resultadoActual['usuarioNombre']." ".$resultadoActual['usuarioApellido']."";
                                }
                                
                            
                            ?>  
                            
                                <span>Costo: </span><input class="form-control" type="number" name="costo" value="<?php echo $costoPedido; ?>" required>
                            
                            
                                Mensajero:
                                <select class="form-control" name="mensajero">
                                    <?php
                                    $pedidos2 = new Pedidos();
                                        $resultadoMensajero = $pedidos2->Sp_ListarMensajero();
                                        if($resultadoMensajero->fetch_row()){
                                            foreach($resultadoMensajero as $result){
                                                echo "<option value=".$result['usuarioId'].">".$result['userName']."</option>";
                                            }    
                                        
                                        }else{
                                            echo "<option>No hay mensajeros</option>";
                                        }
                                    ?>
                                </select>       
                            
                                        
                                <input value="<?php echo $_GET['id']?>" name="id" type="hidden">
                            
                            <div class="col-xl-12 centrado" style="margin-bottom: 15px;">
                                <button class='custom-btn btn-3' type='submit' form='formConfirmar'><span>Confirmar</span></button>
                            </div>
                            
                        </form>
                    </div>
                </div>
                <div class="moto col-lg-2 col-md-3 col-xs-6">
                    <img src="assets/images/moto.png" class="img-fluid" >
                </div>
            </section>
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