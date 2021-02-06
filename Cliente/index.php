<?php
if(isset($_GET['a'])){
    switch($_GET['a']){
        case 'chat':
            include_once 'views/chat.php';
            break;
        case 'editarCuenta':
            include_once 'views/editarCuenta.php';
            break;
        case 'actualizarCuenta':
            if($usuario->editarCuenta()){
                $registrarExito = "Se ha editado su Cuenta actualice la página";
            }else{
                $errorRegistrar = "No se ha podido Editar su cuenta Intente de nuevo";
            }
            include_once 'views/inicioCliente.php';
            break;
        case 'solicitarPedido':
            include_once 'views/solicitarPedido.php';
            break;
        case 'tarifas':
            include_once 'views/tarifas.php';
            break;
        case 'misPedidos':
            include_once 'views/misPedidos.php';
            break;
        case 'llenarPuntoFinal':
            include_once 'controllers/puntosDireccionesController.php';
            $puntoDireccion = new PuntosDirecciones();
            $resultado = $puntoDireccion->listarPuntoFinal();
            if($resultado->fetch_row()){
                echo "<option disabled selected value='0'>Eliga el lugar donde se entregará el paquete</option>";
                foreach($resultado as $resultadoActual){
                    echo "<option value=".$resultadoActual['puntoFinalCodigo'].">".$resultadoActual['puntoFinalDesc']." ".$resultadoActual['nombreLugarDesc']."</option>";
                }
            }

            break;
        case 'llenarPrecio':
            include_once 'controllers/puntosDireccionesController.php';
            $puntoDireccion = new PuntosDirecciones();
            $resultado = $puntoDireccion->llenarPrecio();
            if($resultado->fetch_row()){
                foreach($resultado as $resultadoActual){
                    echo "<input class='form-control form-texto' name='costo' value=".$resultadoActual['costoPedidoDesc']." readonly>";
                    break;
                }
            }
            break;
        case 'solicitarPedidoDB':
            include_once 'controllers/PedidosController.php';
            $pedidos = new Pedidos();
            $resultado = $pedidos->solicitarPedido();
            if($resultado){
                $registrarExito = "Se ha solicitado su pedido con éxito";
                include_once 'views/inicioCliente.php';
            }else{
                $errorRegistrar = "Ocurrió un error al registrar su pedido";
                include_once 'views/inicioCliente.php';
            }
            break;
        case 'EditarPedidoCliente':
            include_once 'views/editarPedido.php';
            break;
        case 'pedidoEditado':
            include_once 'controllers/PedidosController.php';
            $pedidos = new Pedidos();
            $resultado = $pedidos->pedidoEditado();
            if($resultado){
                $registrarExito = "Se ha solicitado su pedido con éxito";
                include_once 'views/inicioCliente.php';
            }else{
                $errorRegistrar = "Ocurrió un error al registrar su pedido";
                include_once 'views/inicioCliente.php';
            }
            break;
            case 'mandarCorreo':
                include_once 'config/mandarCorreo.php';
                include_once 'views/inicioCliente.php';
                break;
            case 'nuevoChat':
                include_once 'controllers/chatController.php';
                $chat = new Chat();
                $resultado = $chat->nuevoChat();
                include_once 'views/chat.php';
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
    include_once 'views/inicioCliente.php';
}
?>