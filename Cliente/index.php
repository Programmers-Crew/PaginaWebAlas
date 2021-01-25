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
    }
}else{
    include_once 'views/inicioCliente.php';
}
?>