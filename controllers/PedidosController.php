<?php

    class Pedidos{
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
            return $resultado;
        }


        public function getPedidosBuscado($id){
            $sql="call Sp_BuscarPedido($id)";
            $resultado = $this->db->query($sql);
            return $resultado;
        }
        public function agregarUsuario(){
            include_once "views/AgregarUsuario.php";
        }
    }




?>