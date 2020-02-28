<?php
    class inserciones{

        public function registrarUsuario($nombre , $apellidoPaterno , $apellidoMaterno , $contrasenia , 
                                        $fechaDeNacimiento , $correo , $sexo , $telefono , $activo , $estatus , $avatar, $portada ){
            $respuesta = null;
            $sql = "INSERT INTO  usuarios (nombres,apellido_paterno,apellido_materno,contrasenia,
                                            fecha_de_nacimiento,correo,sexo,telefono,activo,estatus,avatar,portada) 
                                           values (:nombres,:apellido_paterno,:apellido_materno,:contrasenia,
                                            :fecha_de_nacimiento,:correo,:sexo,:telefono,:activo,:estatus,:avatar,:portada)";
            try {
                $claseConexion = new database();
                $db = $claseConexion->obtenerConexion();
                $stmt = $db->prepare($sql);
                $stmt->bindParam("nombres", $nombre);
                $stmt->bindParam("apellido_paterno", $apellidoPaterno);
                $stmt->bindParam("apellido_materno", $apellidoMaterno);
                $stmt->bindParam("contrasenia", $contrasenia);
                $stmt->bindParam("fecha_de_nacimiento", $fechaDeNacimiento);
                $stmt->bindParam("correo", $correo);
                $stmt->bindParam("sexo", $sexo);
                $stmt->bindParam("telefono", $telefono);
                $stmt->bindParam("activo", $activo);
                $stmt->bindParam("estatus", $estatus);
                $stmt->bindParam("avatar", $avatar);
                $stmt->bindParam(":portada", $portada);
                $stmt->execute();
                $respuesta['estado'] = "ok";
                $respuesta['mensaje'] = "Se creo correctamente el usuario";
            } 
            catch (PDOEXCEPTION $e) {
                $respuesta['estado'] = "error";
                $respuesta['mensaje']  = $e->getMessage();
            }
            return $respuesta;
        }

    }