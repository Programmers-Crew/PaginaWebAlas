<?php
    require_once 'controllers/PedidosController.php';
    $pedidos = new Pedidos();
    

    if(isset($_POST['id'])){
        $result1 = $pedidos->getPedidosBuscado($_POST['id']);
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
            $result1 = $pedidos->getPedidos();
        }
        
    }



?>



<!DOCTYPE html>
<html lang="es">
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>AlasGT-Administrador</title>        
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
       
       
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark menu">
                <div class="ancho-50 d-flex">
                    <div class="ancho-40" style="display: flex;">
                        <div class="col-xl-6 col-md-6 col-xs-6">
                            <a  href="#">
                                <img class="imagen img-fluid" src="assets/images/Logotipo sin fondo.png"  alt="AlasGT">
                            </a>
                        </div>
                        <div class="centrado col-xl-6 col-md-6 col-xs-6">
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
                    <div class="ancho-77">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link tamaño1" href="index.php">Inicio<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link tamaño1" href="index.php?a=agregarUsuario">Agregar Usuario</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link tamaño1" href="index.php?a=chat">Dudas o Inconvenientes(Chat)</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link tamaño1 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Mi Cuenta
                                </a>
                                <div class="dropdown-menu dropdown-menu-right drop-content-black" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item tamaño1" style="color:white" href="index.php?a=editarCuenta">Editar Cuenta</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item tamaño1" style="color:white" href="config/cerrarSesion.php">Cerrar Sesión</a>
                                </div>
                            </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <section style="min-height: 100%;">
            <div class="imagen_izquierda-inicio">
                <img src="assets/images/nube izquierda.png" class="img-fluid" >
            </div>
            <div class="col-xl-12 col-md-12 col-xs-12 row" style="padding: 0; margin:0">
                <div class="col-xl-4 col-md-4 col-xs-4">
                </div>
                <div class="centrado col-xl-4 col-md-12 col-xs-12">
                    <h1 class="titulos" style="color: white;">Pedidos</h1>
                </div>
                <div class="col-xl-4 col-md-12 col-xs-12 centrado-1">
                    <div class="dropdown col-xl-5 col-md-5 col-xs-5">
                        <button style="margin: 0;" class=" drop btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            FILTRO
                        </button>
                        <div class="dropdown-content dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color: #432A90;">
                            <a class="dropdown-item" style=" color:white !important;" href="index.php">TODOS</a>
                            <a class="dropdown-item" style=" color:white !important;" href="javascript:fecha()">FECHA</a>
                            <a class="dropdown-item" style=" color:white !important;" href="index.php?f=pendiente">PENDIENTES</a>
                            <a class="dropdown-item" style=" color:white !important;" href="index.php?f=enRevision">EN REVISIÓN</a>
                            <a class="dropdown-item" style=" color:white !important;" href="index.php?f=entregados">ENTREGADOS</a>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-5 col-xs-5 centrado-absoluto" id="fecha" style="display: none;">
                        <div class="pedidos">
                            <form action="index.php?f=fecha" method="POST" name="formFecha" id="formFecha" class="text-align-center" >
                                <input type="date" required name="fecha" class="form-control">
                                <button type="submit" form="formFecha" class="btn-3 custom-btn"><span>Buscar</span></button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="imagen_derecha-inicio">
                    <img src="assets/images/nube derecha.png" class="img-fluid" >
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
                          
                      echo "
                          <div class='col-xl-12 row centrado' style='padding:0px'>
                              <div  class='col-xl-5 col-md-9 col-xs-9 pedidos'>
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
                                            <p class='campos fuentes'>Teléfono:</p>
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
                                    if($resultadoActual['estadoPedidoDesc']=='En Revisión'){
                                        echo "<div class ='row col-xl-12 col-md-12 col-xs-12'>
                                        <form  name='formConfirmar' id='formConfirmar'>
                                            <input type='hidden' name='id' value=".$resultadoActual['pedidoId'].">
                                            <input type='hidden' name='a' value='confirmar'>
                                            <button class='custom-btn btn-3' type='submit' form='formConfirmar'><span>Confirmar</span></button>
                                        </form>
                                    </div>
                              </div>
                            </div>
                          ";
                                    }else{
                                        if($resultadoActual['estadoPedidoDesc']=='Pendiente'){
                                            echo "<button class='btn btn-success' type='submit' disabled><span>Confirmado</span></button> </div>
                                            </div>";
                                        }else{
                                            echo "<button class='btn btn-success' type='submit' disabled><span>Entregado</span></button> </div>
                                            </div>";
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
    <script>
        function fecha(){
            const filtroFecha = document.getElementById("fecha");
            filtroFecha.style.display = "flex";
        }
        
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>