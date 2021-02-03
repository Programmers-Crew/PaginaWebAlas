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
        public function getPedidosBuscadoMensajero($id,$usuario){
            $sql="call Sp_BuscarPedidoMensajero($id,$usuario)";
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
                include "config/confirmarcionPedido.php";
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
            $comentario = $_POST['comentario'];
            $monto = $_POST['monto'];
            $nombreReceptor = $_POST['nombre'];
            $sql = "call Sp_AgregarPedido('$fecha',$puntoInicio,'$descInicio',$puntoFinal,'$descFinal','$idUsuario','$telefono',$costo,$monto,'$nombreReceptor','$comentario')";
            $resultado = $this->db->query($sql);
            if($resultado){
                include "config/solicitarPedidoEmail.php";
            }
            return $resultado;
        }
        public function getPedidosMensajero($id){
            $sql = "call Sp_ListarPedidoMensajero('$id')";
            $resultado = $this->db->query($sql);
            return $resultado;
        }
        public function entregarPedido(){
            $id = $_POST['id'];
            $estado = '3';
            $target_path = "assets/images/mensajeroEntregas/";
            $target_path = $target_path . basename( $_FILES['imagen']['name']); 
            if(move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path)) {
                $sql = "call Sp_EntregarPedido('$id','$estado','$target_path')";
                $resultado = $this->db->query($sql);
            } else{
                $resultado = null;
            }
            if($resultado){
                include_once 'config/pedidoEntregado.php';
            }
            return $resultado;
        }

        public function buscarRuta($idRuta){
            $sql = "call Sp_BuscarRuta('$idRuta')";
            $resultado = $this->db->query($sql);
            return $resultado;
        }

    }


?>