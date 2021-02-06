<?php
    if(isset($_GET['a'])){
        switch($_GET['a']){
            case 'pedidos':
                include_once 'views/pedidos.php';
                break;
            case 'chat':
                include_once 'views/chat.php';
                break;
            case 'datos':
                include_once 'views/MisDatos.php';
                break;
            case 'editarCuenta':
                include_once 'views/editarCuenta.php';
                break;
            case 'entregar':
                include_once 'views/pedidoEntregar.php';
                break;
            case 'entregarPedido':
                include_once 'controllers/PedidosController.php';
                $pedidos = new Pedidos();
                $resultado = $pedidos->entregarPedido();
                if($resultado){
                    $registrarExito = "¡Se ha entregado con exito!";
                }else{
                    $errorRegistrar = "Ha ocurrido un error, intenta de nuevo";
                }
                include_once 'views/pedidos.php';
                break;
            case 'actualizarCuentaMensajero':
                if($usuario->editarCuentaAdmin()){
                    $registrarExito = "Se ha editado su Cuenta actualice la página";
                }else{
                    $errorRegistrar = "No se ha podido Editar su cuenta Intente de nuevo";
                }
                include_once 'views/inicioMensajero.php';
                break;
            case 'cerrarSesion':
                include_once 'config/cerrarSesion.php';
                break;
            case 'agregarDatos':
                include_once 'controllers/mensajeroController.php';
                $mensajero = new Mensajero();
                $resultado = $mensajero->agregarDatos();
                if($resultado){
                    $registrarExito = "Se Han guardado tus datos correctamente.";
                    include_once 'views/inicioMensajero.php'; 
                }else{
                    $errorRegistrar = "Ha ocurrido un error, intentelo de nuevo (Posibles datos Duplicados)";
                    include_once 'views/MisDatos.php';
                }
                break;
            case 'editarDatos':
                include_once 'controllers/mensajeroController.php';
                $mensajero = new Mensajero();
                $resultado = $mensajero->editarDatos();
                if($resultado){
                    $registrarExito = "Se Han guardado tus datos correctamente.";
                    include_once 'views/inicioMensajero.php';
                }else{
                    $errorRegistrar = "Ha ocurrido un error, intentelo de nuevo";
                    include_once 'views/MisDatos.php';                    
                }
                break;
                case 'buscarUserChat':
                    include_once 'controllers/chatController.php';
                    $chat = new Chat();
                    $resultado = $chat->buscarUsuarioChat();

                    if($resultado->fetch_row()){
                        echo "<span style='color:white;'>Resultado de busqueda:</span>";
                       foreach($resultado as $resultadoActual){
                            $chatObtenerUsuario = new Chat();
                            $resultadoObtenerUsurio = $chatObtenerUsuario->listarUsuario();
                            if($resultadoObtenerUsurio->fetch_row()){
                                

                                foreach($resultadoObtenerUsurio as $resultadoActual2){
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
                                    break;
                                }
                            }else{
                                ?>
                                    <h5 id="valido" style="color: white; text-align:center">No hay Usuarios Registrados</h5>
                                <?php
                            }
                       }
                    }else{
                        echo "<span style='color:white;'>no hay resultados<span>";
                    }

                    break;
                case 'nuevoChat':
                    include_once 'controllers/chatController.php';
                    $chat = new Chat();
                    $resultado = $chat->nuevoChat();
                    include_once 'views/chat.php';
                    break;
                case 'listarMensaje':
                    include_once 'controllers/chatController.php';
                    $chat = new Chat();
                    $resultado = $chat->listarMensajes();
                    $chatheader = new Chat();
                    $resultado3 = $chatheader->listarMensajes();
                    $send = $_POST['send'];
                    foreach($resultado3 as $resultadoActual2){
                        echo "
                        <div class='headerMenu'>
                            <h5>".$_POST['receptorName']."</h5>
                        </div>
                        ";
                        break;
                    }
                    echo "<div class='totalMensajes' id='totalMensajes' onscroll ='setScroll()'>";
                    if($resultado->fetch_row()){
                        foreach($resultado as $resultadoActual){
                            if($send == $resultadoActual['UsuarioSendMessageId']){
                                echo "
                                    <div class='contenedor2'>
                                        <div class='cajaChatUsuario col-lg-6'>
                                            <div class='usuario'>
                                                <span>".$_POST['sendNombre']."</span>
                                            </div>
                                            <div>
                                                <span>
                                                    ".$resultadoActual['mensajeDesc']."
                                                </span>
                                            </div>
                                            <div class='fecha'>
                                                <span>
                                                    ".$resultadoActual['mensajeFecha']."
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                ";
                            }else{
                                echo "
                                    <div class='contenedor1'>
                                        <div class='cajaChatReceptor col-lg-6'>
                                            <div class='usuario'>
                                                <span>".$_POST['receptorName']."</span>
                                            </div>
                                            <div>
                                                <span>
                                                    ".$resultadoActual['mensajeDesc']."
                                                </span>
                                            </div>
                                            <div class='fecha'>
                                                <span>
                                                    ".$resultadoActual['mensajeFecha']."
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                ";
                            }
                        }
                    }else{
                        echo "
                            <div class='headerMenu'>
                                <h5>".$_POST['receptorName']."</h5>
                            </div>
                            <h5 style='color: white; text-align:center' id='validoMensaje'>escribe algo</h5>
                        ";
                    }
                    
                    echo "</div>";
                    break;
                case 'nuevoMensaje':
                    include_once 'controllers/chatController.php';
                    $chat = new Chat();
                    $resultado = $chat->agregarMensaje();
                    $chat1 = new Chat();
                    $resultado1 = $chat1->listarMensajes();
                    $send = $_POST['send'];
                    foreach($resultado1 as $resultadoActual){
                        echo "
                            <div class='headerMenu'>
                                <h5>".$_POST['receptorName']."</h5>
                            </div>
                        ";
                        break;
                    }
                    echo "<div class='totalMensajes' id='totalMensajes' onscroll ='setScroll()'>";
                    foreach($resultado1 as $resultadoActual){
                        if($send == $resultadoActual['UsuarioSendMessageId']){
                            echo "
                                <div class='contenedor2'>
                                    <div class='cajaChatUsuario col-lg-6'>
                                        <div class='usuario'>
                                            <span>".$_POST['sendNombre']."</span>
                                        </div>
                                        <div>
                                            <span>
                                                ".$resultadoActual['mensajeDesc']."
                                            </span>
                                        </div>
                                        <div class='fecha'>
                                            <span>
                                                ".$resultadoActual['mensajeFecha']."
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }else{
                            echo "
                                <div class='contenedor1'>
                                    <div class='cajaChatReceptor col-lg-6'>
                                        <div class='usuario'>
                                            <span>".$_POST['receptorName']."</span>
                                        </div>
                                        <div>
                                            <span>
                                                ".$resultadoActual['mensajeDesc']."
                                            </span>
                                        </div>
                                        <div class='fecha'>
                                            <span>
                                                ".$resultadoActual['mensajeFecha']."
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    }
                    echo "</div>";
                    break;
        }
    }else{
        include_once 'views/inicioMensajero.php';
    }




?>