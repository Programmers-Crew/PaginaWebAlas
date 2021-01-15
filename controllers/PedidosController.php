<?php

    class PedidosController{
        private $db;
        private $fecha;
        private $id;
        private $nombreReceptor;
        private $nombreUsuario;
        private $descripcionUsuario;
        private $direccionInicio;
        private $direccionfinal;
        private $mensajero;
        private $telefono;
        private $estado;

        public function __construct(){
            $this->db= Conectar::conexion();
        }   

        public function getPedidos(){
            $sql="call Sp_ListarPedido()";
            $resultado = $this->db->query($sql);

        }


    }

?>