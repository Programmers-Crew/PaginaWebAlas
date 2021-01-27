<?php


      class PuntosDirecciones{
            private $db;
            public function __construct(){
                  $this->db= Conectar::conexion();
            } 

            public function listarPuntoInicio(){
                  $sql = "call Sp_ListarPuntoInicio()";
                  $resultado = $this->db->query($sql);
                  return $resultado;
            }


            public function listarPuntoFinal(){
                  $punto = $_POST['puntoInicio_id'];
                  $sql = "call Sp_ListarPuntoFinal($punto)";
                  $resultado = $this->db->query($sql);
                  return $resultado;
            }

            public function llenarPrecio(){
                  $puntoInicio = $_POST['puntoInicio_id'];
                  $puntoFinal = $_POST['puntoFinal_id'];
                  $sql = "call SP_BuscarCostoPedido($puntoInicio, $puntoFinal)";
                  $resultado = $this->db->query($sql);
                  return $resultado;
            }
      }


?>