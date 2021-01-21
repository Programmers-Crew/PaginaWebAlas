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
            include_once 'views/inicioAdministrador.php';
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
    }
}else{
    include_once 'views/inicioCliente.php';
}
?>