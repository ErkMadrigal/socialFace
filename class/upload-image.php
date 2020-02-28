<?php
    session_start();
    include 'database.php';
    include 'modificaciones.php';
    $claseDataBase = new database();
    $idUsuario = $_SESSION['uid'];
    $imagen = $_FILES['imagen'];
    $path = "../img/users/";
    $mensaje = "";
    if(!file_exists($path)){
        mkdir($path);
    }
    $targetImg = $path.basename($imagen["name"]);
    if(move_uploaded_file($imagen["tmp_name"],$targetImg)){
        $url = "img/users/".basename($imagen["name"]);
        $sql = "UPDATE usuarios SET  portada='$url' WHERE id_usuario = '$idUsuario'";
        try{
            $claseDataBase->obtenerConexion()->query($sql);
            $mensaje = "se actualizo correctamente";
        }catch(PDOEXCEPTION $e){
            echo $e->getMessage();
        }
    }else{
        $mensaje = "no se pudo subir tu imagen";
    }
    echo json_encode( $mensaje );