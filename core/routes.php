<?php

    function cargarControlador($controlador){
        $nombreControlador = ucwords($controlador)."Controller".'.php';
        $archivoControlador = 'controllers/'.ucwords($controlador).'php';
        if(!is_file($archivoControlador)){
            $archivoControlador = 'controllers/'.CONTROLADOR_PRINCIPAL.'Controller.php';

        }
        require_once $archivoControlador;
        $control = new $controlador();
        return $control;
    }


    function cargarAccion($controller, $accion){

        
        if(isset($accion) && method_exists($controller, $accion)){
            $controller -> $accion();
        }else{
            $controller -> ACCION_PRINCIPAL();
        }
    }
?>