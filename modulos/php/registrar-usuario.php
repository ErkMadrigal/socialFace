<?php
    //importamos clases
    include '../../class/database.php';
    include '../../class/inserciones.php';
    include '../../class/consultas.php';
    
    //creamos objetos de las clases
    $claseInserciones = new inserciones();
    $claseConsultas = new consultas();

    $nombreUsuario = ( $_POST['nombre'] !== "" ) ? $_POST['nombre'] : null ;
    $apellido = ( $_POST['apellido'] !== "" ) ? $_POST['apellido'] : null ;
    $numeroOCorreo = ( $_POST['numeroOCorreo'] !== "") ? $_POST['numeroOCorreo'] : null;
    $contrasenia = ( $_POST['contrasenia'] !== "") ? $_POST['contrasenia'] : null;
    $fecha = $_POST['anio']."-".( ( $_POST['mes'] < 10 ) ? "0".$_POST['mes'] : $_POST['mes'] )."-".( ( $_POST['dia'] < 10 ) ? "0".$_POST['dia'] : $_POST['dia'] );
    $genero = $_POST['genero'];
    $claseValidar = new validar();

    $errores = [];

    // if(!$claseValidar->isEmpty($nombreUsuario)){
    //     $errores[] = "por favor ingresa tu nombre";
    // }
    // if(!$claseValidar->isEmpty($apellido)){
    //     $errores[] = "por favor ingresa tu apellido";
    // }
    // if(!$claseValidar->isEmpty($numeroOCorreo)){
    //     $errores[] = "por favor ingresa tu numero o correo";
    // }
    // if(!$claseValidar->isEmpty($contrasenia)){
    //     $errores[] = "por favor ingresa tu contraseña";
    // }

    if($claseValidar->isName($nombreUsuario) === 0 ){
        $errores[] = "por favor ingresa un nombre valido";
    }
    if($claseValidar->isName($apellido) === 0 ){
        $errores[] = "por favor ingresa un apellido valido";
    }
    if ( $claseValidar->isMail( $numeroOCorreo ) === 0  && $claseValidar->isPhone( $numeroOCorreo ) === 0) {
        $errores[] = "ingresa un correo o un numero valido";
    }
    if($claseValidar->diffDate($fecha) === 0){
        $errores[] = "no puede ser la misma fecha"; 
    }
    if($claseValidar->diffDate($fecha) < 4680){
        $errores[] = "no puedes crear tu cuenta, debes ser mayor de edad"; 
    }
    if(count($errores) === 0){
        $correo = ( $claseValidar->isMail( $numeroOCorreo ) === 1 ) ? $numeroOCorreo : '';
        $telefono = ( $claseValidar->isPhone( $numeroOCorreo ) === 1 ) ? $numeroOCorreo : '';
        $validarUsuario = $claseConsultas->userValidate($contrasenia , $telefono , $correo);
        $respuesta = null;
        if(!$validarUsuario){
            $respuesta = $claseInserciones->registrarUsuario($nombreUsuario,$apellido,'',$contrasenia , $fecha, $correo,$genero, $telefono,0,1,'img/default-profile.png','');
        }else{
            $respuesta["estatus"] = "error";
            $respuesta["mensaje"] = "el usuario ya existe";
        }
        echo json_encode($respuesta);           
    }
    else{
        echo json_encode($errores);
    }

    class validar{
        
        public function isEmpty( $string ) {
            return isset($string);
        }

        public function isName( $string ) {
            $regex = "/^[a-z-A-Z\D]+$/";
            return preg_match( $regex , $string );
        }

        public function isMail( $mail ) {
            $regex = "/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+$/";
            $mail = strtolower( $mail );
            return preg_match( $regex , $mail );
        }

        public function isPhone( $phone ) {
            $regex = "/^[0-9-]*$/";
            return preg_match( $regex , $phone );
        }

        public function diffDate( $getDate ) {
            date_default_timezone_set('America/Monterrey');
            $currentDay = date("Y-m-d");
            $date1 =  new DateTime($currentDay);  
            $date2 = new DateTime($getDate);
            $diff = $date1->diff($date2);                         
            return $diff->days;
        }
    }