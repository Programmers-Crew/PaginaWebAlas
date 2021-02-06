<?php
    include_once 'controllers/mensajeroController.php';
    $mensajero = new Mensajero();

    $resultado = $mensajero->consultarDatosMensajero($usuario->getId());
    $primerNombre="";
    $segundoNombre="";
    $primerApellido="";
    $segundoApellido="";
    $dpiMensajero="";
    $placasMensajero="";
    $telefonoMensajero="";
    $direccionMensajero="";
    if($resultado->fetch_row()){
        foreach($resultado as $resultadoActual){
            $primerNombre= $resultadoActual['primerNombreMensajero'];
            $segundoNombre= $resultadoActual['segundoNombreMensajero'];
            $primerApellido=$resultadoActual['primerApellidoMensajero'];
            $segundoApellido=$resultadoActual['segundoApellidoMensajero'];
            $dpiMensajero=$resultadoActual['dpiMensajero'];
            $placasMensajero=$resultadoActual['placasMensajero'];
            $telefonoMensajero=$resultadoActual['telefonoMensajero'];
            $direccionMensajero=$resultadoActual['direccionMensajero'];
        }
        $validar = true;
        $accion = "editarDatos";
    }else{
        $validar = false;
        $accion = "agregarDatos";
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>AlasGT-Mis Datos</title>        
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
        <link rel="stylesheet" href="css/AgregarUsuario.css" type="text/css">
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
            <div class="ancho-40" style="display: flex;">
                  <a class="" style="padding-left: 10px;" href="#">
                        <img src="assets/images/Logotipo sin fondo.png" width="75px" height="50" alt="">
                  </a>
                  <a class="navbar-brand" style="padding-left:10px" href="#"><?php echo $usuario->getNombre() ." ".$usuario->getApellido();?></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content:flex-end;">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio<span class="sr-only">(current)</span></a>
                    </li>
                    
                    </ul>
                    
                </div>
            </nav>
        </header>
        <section>
                <div class="inicio_sesion">
                    <div class="caja caja1 col-lg-7 col-md-9 col-xs-9">
                        <h2 class="titulos">Mis Datos</h2>
                        <form action="index.php?a=<?php echo $accion?>" id="formMisDatos" class="formMisDatos" method="POST">
                            <input type="hidden" name="idUsuario" value="<?php echo $usuario->getId()?>">
                            <?php
                                if(isset($errorRegistrar)){
                                    echo "<p  class='error'>".$errorRegistrar."</p>";
                                }
                            ?>
                            <div class="col-lg-12 row m-0" style="margin:0">    
                                <div class="col-lg-6 col-md-6 col-xs-12 row"  style="margin:0; margin:0 !important;">
                                    <div class="col-lg-12" style="display: flex; padding:0">
                                        <p class="iconoSolid tamaño" style="color: #432A90;"> </p> 
                                        <input class="form-control form-texto col-lg-9" placeholder="Ingrese su primer nombre" value="<?php echo $primerNombre?>" name="nombre1" id="nombre1" required  type="text">
                                    </div>
                                    <div class="col-lg-12">
                                        <span style="float: left;" class=" error grupo-correcto" id="alerta_nombre1">El campo nombre no puede llevar signos ni espacios</span>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-6 col-md-6 col-xs-12 row" style="margin:0; ">
                                    <div class="col-lg-12 " style=" display:flex;padding:0">
                                        <p class="iconoSolid tamaño" style="color: #432A90;"> </p> 
                                        <input class="form-control form-texto" placeholder="Ingrese su segundo Nombre" id="nombre2" value="<?php echo $segundoNombre?>" name="nombre2"  type="text"  required>
                                    </div>
                                    <div class="col-lg-12" style="margin:0;">
                                        <span  class=" error grupo-correcto" id="alerta_nombre2">El campo nombre no puede llevar signos ni espacios</span>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-12 row m-0" style="margin:0">    
                                <div class="col-lg-6 col-md-6 col-xs-12 row"  style="margin:0; margin:0 !important;">
                                    <div class="col-lg-12" style="display: flex; padding:0">
                                        <p class="iconoSolid tamaño" style="color: #432A90;"> </p> 
                                        <input class="form-control form-texto col-lg-9" placeholder="Ingrese su Primer Apellido" value="<?php echo $primerApellido?>" name="apellido" id="apellido" required  type="text">
                                    </div>
                                    <div class="col-lg-12">
                                        <span style="float: left;" class=" error grupo-correcto" id="alerta_apellido">El campo apellido no puede llevar signos ni espacios</span>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-6 col-md-6 col-xs-12 row" style="margin:0; ">
                                    <div class="col-lg-12 " style=" display:flex;padding:0">
                                        <p class="iconoSolid tamaño" style="color: #432A90;"> </p> 
                                        <input class="form-control form-texto" placeholder="Ingrese su segundo Apellido" value="<?php echo $segundoApellido?>" id="apellido2" name="apellido2"  type="text"  required>
                                    </div>
                                    <div class="col-lg-12" style="margin:0;">
                                        <span  class=" error grupo-correcto" id="alerta_apellido2">El campo apellido no puede llevar signos ni espacios</span>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-12  col-xs-12 row m-0">
                                <div class="col-lg-12" style="display: flex; margin:0">
                                    <p class="iconoSolid tamaño" style="color: #432A90;"></p><input class="form-control form-texto" placeholder="Ingrese su DPI" value="<?php echo $dpiMensajero?>" name="dpi"  id="dpi" type="number" required>
                                </div>
                                <div class="col-lg-12">
                                    <span id="alerta_dpi" class="error grupo-correcto">El campo DPI no puede llevar espacios y/o signos<br>debe llevar 13 dígitos</span>
                                </div>
                            </div>
                            <div class="col-lg-12 m-0 row">
                                <div class="col-lg-12" style="display: flex; margin:0">
                                    <p class="iconoSolid tamaño" style="color: #432A90;"></p><input class="form-control form-texto" placeholder="Ingrese la placa de su vehiculo" name="placa"  value="<?php echo $placasMensajero?>"  id="placa" type="text" required>
                                </div>
                                <div class="col-lg-12">
                                    <span id="alerta_placa" class="error grupo-correcto">La placa debe llevar 7 caracteres</span>
                                </div>
                            </div>
                            <div class="col-lg-12 m-0 row">
                                <div class="col-lg-12" style="display: flex; margin:0">
                                    <p class="iconoSolid tamaño" style="color: #432A90;"></p><input class="form-control form-texto" placeholder="Ingrese su número de teléfono" name="telefono"  value="<?php echo $telefonoMensajero?>"  id="telefono" type="number" required>
                                </div>
                                <div class="col-lg-12">
                                    <span id="alerta_telefono" class="error grupo-correcto">El campo teléfono debe llevar 8 dígitos</span>
                                </div>
                            </div>
                            <div class="col-lg-12 m-0 row">
                                <div class="col-lg-12" style="display: flex; margin:0">
                                    <p class="iconoSolid tamaño" style="color: #432A90;"></p><input class="form-control form-texto" placeholder="Ingrese su dirección actual" name="direccion" value="<?php echo $direccionMensajero?>"  id="direccion" type="text" required>
                                </div>
                                <div class="col-lg-12">
                                    <span id="alerta_direccion" class="error grupo-correcto">El campo dirección debe llevar de 4 a 150 caracteres.</span>
                                </div>
                            </div>
                            <div class="col-lg-12 m-0 row">
                                <div class="col-lg-12" style="display: flex; margin:0">
                                    <p class="iconoSolid tamaño" style="color: #432A90;"></p> 
                                    <select class="form-control form-texto" form="formMisDatos" placeholder="Ingrese su estado civil" name="estadoCivil" onchange="cambioEstadoCivil()"   id="estadoCivil" required>
                                        <option disabled selected value="0">Seleccione una opción</option>
                                        <?php 
                                            $mensajero2 = new Mensajero();
                                            $resultado2 = $mensajero2->listarEstadoCivil();
                                            foreach($resultado2 as $resultadoActual2){
                                                ?>
                                                <option value="<?php echo $resultadoActual2['estadoCivilId']?>"><?php echo $resultadoActual2['estadoCivilDesc']?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <span id="alerta_estadoCivil" class="error grupo-correcto">Seleccione un valor</span>
                                </div>
                            </div>
                            <div>
                                <span id="errorGlobal" class="error grupo-correcto">Hay campos incorrectos</span>
                            </div>                            
                            <?php
                                if($validar == true){
                                    ?>
                                    <button type="submit" form="formMisDatos" class="custom-btn btn-3"><span>Editar</span></button>
                                    <?php
                                }else{
                                    ?>
                                    <button type="submit" form="formMisDatos" class="custom-btn btn-3"><span>Guardar</span></button>
                                    <?php
                                }
                            ?>
                        </form>
                    </div>

                </div>
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
            </div>
            
        </footer> 
    </body>
    <script src="scripts/misDatos.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>