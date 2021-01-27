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

        public function getPedidosCliente($id){
            $sql="call Sp_ListarPedidosCliente('$id')";
            $resultado = $this->db->query($sql);
            return $resultado;
        }

        public function getPedidosBuscado($id){
            $sql="call Sp_BuscarPedido($id)";
            $resultado = $this->db->query($sql);
            return $resultado;
        }

        public function getPedidosBuscadoCliente($id,$usuario){
            $sql="call Sp_BuscarPedidoCliente($id,$usuario)";
            $resultado = $this->db->query($sql);
            return $resultado;
        }

        public function getPedidosEstado($estado){
            $sql="call Sp_ListarPedidoPorEstado('$estado')";
            $resultado = $this->db->query($sql);
            return $resultado;
        }

        public function getPedidosfecha($fecha){
            $sql="call Sp_ListarPedidoPorFecha('$fecha')";
            $resultado = $this->db->query($sql);
            return $resultado;
        }

        public function agregarUsuario(){
            include_once "views/AgregarUsuario.php";
        }

        public function Sp_ListarMensajero(){
            $sql ="call Sp_ListarMensajero()";
            $resultado = $this->db->query($sql);
            return $resultado;
        }

        public function listarTipoUsuario(){
            $sql = "call Sp_LLenarTipoUsuario()";
            $resultado = $this->db->query($sql);
            return $resultado;
        }


        public function confirmarPedido(){
            $id = $_POST['id'];
            $mensajero = $_POST['mensajero'];
            $costo = $_POST['costo'];
            $estado = 2;

            $sql = "call Sp_ConfirmarPedido('$id','$mensajero', '$costo', $estado)";
            $resultado = $this->db->query($sql);
            if(!$resultado){
                $validar = true;
            }else{
                $validar = false;
            }

            return $validar;
        }




        public function solicitarPedido(){
            $fecha = date('d/m/y');
            $puntoInicio = $_POST['puntoInicio'];
            $descInicio = $_POST['descripcionInicial'];
            $puntoFinal = $_POST['puntoFinal'];
            $descFinal = $_POST['descripcionFinal'];
            $idUsuario = $_POST['id'];
            $telefono = $_POST['telefono'];
            $costo = $_POST['costo'];
            $monto = $_POST['monto'];
            $nombreReceptor = $_POST['nombre'];
            $sql = "call Sp_AgregarPedido('$fecha',$puntoInicio,'$descInicio',$puntoFinal,'$descFinal',$idUsuario,'$telefono',$costo,$monto,'$nombreReceptor')";
            $resultado = $this->db->query($sql);
            if($resultado){
                include "config/solicitarPedidoEmail.php";
            }
            return $resultado;
        }

    }




?>