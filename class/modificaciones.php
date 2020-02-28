<?php
    class modificaciones{
        public function actualizarEstado($modificar, $idUser){
            
            $sql = "UPDATE usuarios SET apellido_materno=:apellido_materno WHERE id_usuario='$idUser'";
            $respuesta = null;

            try{
            $claseConexion = new database();
            $db = $claseConexion->obtenerConexion();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":apellido_materno", $modificar);
            $stmt->execute();
            $respuesta['estado'] = "ok";
            $respuesta['mensaje'] = "Se modifico exitosamente tu estado";
        } 
        catch (PDOEXCEPTION $e) {
            $respuesta['estado'] = "error";
            $respuesta['mensaje']  = $e->getMessage();
        }
        return $respuesta;
    }
}
    