<?php
    class consultas{

        public function userValidate( $contrasenia, $telefono , $correo ){
            $response  = null;
            $concat1  = ( $telefono == '' ) ? '' : "telefono = '$telefono'";
            $concat2  = ( $correo == '' ) ? '' : "correo='$correo'";

            $sql = "SELECT * FROM usuarios WHERE  ".$concat1." ". $concat2." AND contrasenia='$contrasenia'";
            try{
                $claseConexion = new database();
                $stmt = $claseConexion->obtenerConexion()->query($sql);
                $count = $stmt->rowCount();
                $response  = ( $count > 0  ) ? true : false;
            }catch(PDOEXCEPTION $e){
                $response =  '{"error":{"text":'. $e->getMessage() .'}}';
            }
            return $response;
        }   

        public function userData( $contrasenia, $telefono , $correo ){
            $response  = null;
            $concat1  = ( $telefono == '' ) ? '' : "telefono = '$telefono'";
            $concat2  = ( $correo == '' ) ? '' : "correo='$correo'";

            $sql = "SELECT id_usuario FROM usuarios WHERE  ".$concat1." ". $concat2." AND contrasenia='$contrasenia'";
            try{
                $claseConexion = new database();
                $stmt = $claseConexion->obtenerConexion()->query($sql);
                $response  = $stmt->fetch();
            }catch(PDOEXCEPTION $e){
                $response =  '{"error":{"text":'. $e->getMessage() .'}}';
            }
            return $response;
        }   

        public function getDataUser( $idUser ) {
            $sql = "SELECT nombres,avatar,portada FROM usuarios WHERE id_usuario = '$idUser'";
            $response = null;
            try{
                $claseConexion = new database();
                $stmt = $claseConexion->obtenerConexion()->query($sql);
                $response  = $stmt->fetch();
            }catch(PDOEXCEPTION $e){
                $response =  '{"error":{"text":'. $e->getMessage() .'}}';
            }
            return $response;
        }

        public function getAllUsers( $idUser ){
            $sql = "SELECT * FROM usuarios WHERE id_usuario != '$idUser' ORDER BY id_usuario DESC LIMIT 5"; 
            $response = null;
            try{
                $claseConexion = new database();
                $stmt = $claseConexion->obtenerConexion()->query($sql);
                $response  = $stmt->fetchALL();
            }catch(PDOEXCEPTION $e){
                $response =  '{"error":{"text":'. $e->getMessage() .'}}';
            }
            return $response;
        }

        
    }