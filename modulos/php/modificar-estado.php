<?php
    session_start();
    $idUsr = $_SESSION['uid'];
    //importamos clases
    include '../../class/database.php';
    include '../../class/modificaciones.php';

    //creamos objetos de las clases
    $claseModificaciones = new modificaciones();

    $modificar = ( $_POST['descripcion'] !== "" ) ? $_POST['descripcion'] : null ;
   

    $errores = [];

    if(count($errores) === 0){
        
            $respuesta = $claseModificaciones->actualizarEstado($modificar, $idUsr);
        }else{
            $respuesta["estatus"] = "error";
            $respuesta["mensaje"] = "error al modificar";
        }
        echo json_encode($respuesta);
    
    