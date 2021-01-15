<?php
    class Usuarios{
        private $db;
        private $username;
        private $nombre;
        private $apellido;
        public $tipo;



        public function __construct(){
			$this->db = Conectar::conexion();
		}

        public function index(){

            require_once "views/login.php";

        }

        public function registrarUsuario(){
            require_once "views/registrarUser.php";
        }

        public function validarLogin($usuario,$contraseña){
            $validar = false;
            $md5Contraseña1 =  md5($contraseña);
            $sql = "call Sp_ValidarLogin('$usuario','$md5Contraseña1');";
            $resultado1 = $this->db->query($sql);
            if($resultado1->fetch_row()){
                $validar=true;
                foreach($resultado1 as $usuarioActual){

                    $this->nombre = $usuarioActual['usuarioNombre'];
                    $this->apellido = $usuarioActual['usuarioApellido'];
                    $this->username = $usuarioActual['userName'];
                    $this->tipo = $usuarioActual['tipoUsuarioId'];
                }
            }
            return $validar;

        }


        public function setUsuario($usuario){
            $sql = "select * from usuario where userName = '$usuario'";
            $resultado = $this->db->query($sql);
            foreach($resultado as $usuarioActual){
                $this->nombre = $usuarioActual['usuarioNombre'];
                $this->apellido = $usuarioActual['usuarioApellido'];
                $this->username = $usuarioActual['userName'];
                $this->tipo = $usuarioActual['tipoUsuarioId'];
            }
            
        }


        public function getTipo(){
            return $this->tipo;
        }

        public function getNombre(){
            return $this->nombre;
        }
        
        public function getUsuario(){
            return $this->username;
        }

        public function getApellido(){
            return $this->apellido;
        }


        public function guardarUsuario(){
            $usuarioNombre = $_POST['nombre'];
            $usuarioApellido = $_POST['apellido'];
            $userName = $_POST['usuarioAgregar'];
            $usuarioContrasena = $_POST['contraseñaAgregar'];
            $tipoUsuarioId = 3;
            $md5Contraseña = md5($usuarioContrasena);
            $validar = false;
            $sql = "call Sp_AgregarUsuario('$usuarioNombre','$usuarioApellido','$userName','$md5Contraseña',$tipoUsuarioId)";
            $resultado = $this->db->query($sql);

            if(!$resultado){
                $validar = false;
            }else{
                $validar = true;
                
            }

            return $validar;
        }
    }
?>