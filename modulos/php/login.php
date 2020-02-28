<?php
    include '../../class/database.php';
    include '../../class/consultas.php';
    session_start();

    $claseConsultas = new consultas();
    $claseValidar = new validar();

    $numeroOCorreo = ( $_POST['correoTelefonoLogin'] !== "") ? $_POST['correoTelefonoLogin'] : null;
    $contrasenia = ( $_POST['paswordLogin'] !== "") ? $_POST['paswordLogin'] : null;

    $errores = [];

    if ( $claseValidar->isMail( $numeroOCorreo ) === 0  && $claseValidar->isPhone( $numeroOCorreo ) === 0) {
        $errores[] = "ingresa un correo o un numero valido";
    }

    if(count($errores) === 0){
        $correo = ( $claseValidar->isMail( $numeroOCorreo ) === 1 ) ? $numeroOCorreo : '';
        $telefono = ( $claseValidar->isPhone( $numeroOCorreo ) === 1 ) ? $numeroOCorreo : '';
        $validarUsuario = $claseConsultas->userValidate($contrasenia , $telefono , $correo);
        $respuesta = null;
        if($validarUsuario){
            $respuesta["estatus"]="ok";
            $_SESSION["uid"] = $claseConsultas->userData($contrasenia , $telefono , $correo)['id_usuario'];
        }else{
            $respuesta["estatus"]="error";
            $respuesta["mensaje"]= "Tu cuenta no existe";
        }
        echo json_encode($respuesta);
    }else{
        echo json_encode($errores);
    }


class validar {

    public function isMail( $mail ){
        $regex = "/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+$/";
        $mail = strtolower( $mail );
        return preg_match( $regex , $mail );
    }

    public function isPhone( $phone ){
        $regex = "/^[0-9-]*$/";
        return preg_match( $regex , $phone );
    }

}