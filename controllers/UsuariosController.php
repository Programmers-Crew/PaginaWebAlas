<?php
    class Usuarios{
        private $db;
        private $username;
        private $nombre;
        private $apellido;
        public $tipo;
        private $correo;
        private $id;
        private $banco;
        private $numeroCuenta;
        private $nombreEmpresa;
        private $tipoCuenta;

        public function __construct(){
			$this->db = Conectar::conexion();
		}

        public function index(){

            require_once "views/login.php";

        }

        public function registrarUsuario(){
            require_once "views/registrarUser.php";
        }


        public function agregarusuario(){
            require_once "views/AgregarUsuario.php";
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
                    $this->correo = $usuarioActual['usuarioCorreo'];
                    $this->id = $usuarioActual['usuarioId'];
                    $this->nombre = $usuarioActual['usuarioNombre'];
                    $this->apellido = $usuarioActual['usuarioApellido'];
                    $this->username = $usuarioActual['userName'];
                    $this->tipo = $usuarioActual['tipoUsuarioId'];
                    $this->correo = $usuarioActual['usuarioCorreo'];
                    $this->id = $usuarioActual['usuarioId'];
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
                $this->correo = $usuarioActual['usuarioCorreo'];
                $this->id = $usuarioActual['usuarioId'];
                $this->nombreEmpresa = $usuarioActual['empresaDesc'];
                $this->numeroCuenta = $usuarioActual['empresaNumeroCuenta'];
                $this->banco = $usuarioActual['empresaBanco'];
                $this->tipoCuenta = $usuarioActual['empresaCuentaTipo'];
            }
            
        }


        public function getTipo(){
            return $this->tipo;
        }

        public function getNombre(){
            return $this->nombre;
        }
        
        public function getCorreo(){
            return $this->correo;
        }
        

        public function getUsuario(){
            return $this->username;
        }

        public function getApellido(){
            return $this->apellido;
        }

        public function getId(){
            return $this->id;
        }
        public function getBanco(){
            return $this->banco;
        }
        public function getNumeroCuenta(){
            return $this->numeroCuenta;
        }
        public function getTipoCuenta(){
            return $this->tipoCuenta;
        }
        public function getNombreEmpresa(){
            return $this->nombreEmpresa;
        }
        public function guardarUsuario(){
            $usuarioNombre = $_POST['nombre'];
            $usuarioApellido = $_POST['apellido'];
            $userName = $_POST['usuarioAgregar'];
            $usuarioContrasena = $_POST['contraseñaAgregar'];
            $tipoUsuarioId = 3;
            $correo = $_POST['correo'];
            $nombreEmpresa = $_POST['nombreEmpresa'];
            $numeroCuenta = $_POST['numeroCuenta'];
            $tipoCuenta = $_POST['tipoCuenta'];
            $banco = $_POST['banco'];
            $estado = 1;
            $md5Contraseña = md5($usuarioContrasena);
            $validar = false;
            $sql = "call Sp_AgregarUsuario('$usuarioNombre','$usuarioApellido','$userName','$md5Contraseña','$correo','$tipoUsuarioId','$nombreEmpresa','$numeroCuenta','$tipoCuenta','$banco')";

            $resultado = $this->db->query($sql);
            if(!$resultado){
                $validar = false;
            }else{
                $validar = true;
                include "config/ConfirmacionEmail.php";
            }

            return $validar;
        }

        public function confirmarCorreo($correo){
            $estadoUsuario = '2';

            $sql = "call Sp_confirmarCorreo('$correo','$estadoUsuario')";
            $resultado = $this->db->query($sql);

            if(!$resultado){
                $validar = false;
            }else{
                $validar = true;
            }
            return $validar;
        }

        public function guardarUsuarioAdmin(){
            $usuarioNombre = $_POST['nombre'];
            $usuarioApellido = $_POST['apellido'];
            $userName = $_POST['usuarioAgregar'];
            $usuarioContrasena = $_POST['contraseñaAgregar'];
            $tipoUsuarioId = $_POST['tipoUsuario'];
            $correo = $_POST['correo'];
            $md5Contraseña = md5($usuarioContrasena);
            $validar = false;
            $sql = "call Sp_AgregarUsuarioAdmin('$usuarioNombre','$usuarioApellido','$userName','$md5Contraseña','$correo','$tipoUsuarioId')";
            $resultado = $this->db->query($sql);
            if(!$resultado){
                $validar = true;
                include "config/ConfirmacionEmail.php";
            }else{
                $validar = false;
            }

            return $validar;
        }

        public function editarCuenta(){
            $id = $_POST['id'];
            $usuarioNombre = $_POST['nombre'];
            $usuarioApellido = $_POST['apellido'];
            $userName = $_POST['usuarioAgregar'];
            $usuarioContrasena = $_POST['contraseñaAgregar'];
            $correo = $_POST['correo'];
            $md5Contraseña = md5($usuarioContrasena);
            $nombreEmpresa = $_POST['nombreEmpresa'];
            $numeroCuenta = $_POST['numeroCuenta'];
            $tipoCuenta = $_POST['tipoCuenta'];
            $banco = $_POST['banco'];
            $sql = "call Sp_ActualizarUsuario('$id','$usuarioNombre','$usuarioApellido','$userName','$md5Contraseña','$correo','$nombreEmpresa','$numeroCuenta','$tipoCuenta','$banco')";
            $resultado = $this->db->query($sql);
            if(!$resultado){
                $validar = false;
            }else{
                $validar = true;
            }
            
            return $validar;
        }

        public function getTiposDeCuenta(){
            $sql ="call sp_ListarTipoCuenta()";
            $resultado = $this->db->query($sql);
            
            return $resultado;
        }
        public function getbancos(){
            $sql ="call sp_ListarBanco()";
            $resultado = $this->db->query($sql);
            
            return $resultado;
        }

        public function buscarTipoCuentaUsuario($id){
            $sql = "call sp_BuscarTipoCuenta('$id')";
            $resultado = $this->db->query($sql);
            return $resultado;
        }

        public function buscarBanco($id){
            $sql = "call sp_BuscarBanco('$id')";
            $resultado = $this->db->query($sql);
            return $resultado;
        }

    }
?>