<?php
    session_start();
    include '../config.php';
    include '../../class/database.php';
    include '../../class/inserciones.php';
    $claseInserciones = new inserciones();
    $claseDataBase = new database();
    $cover = $_FILES['cover'];
    if($cover['name'] !== ""){
        $idUsuario  = $_SESSION['uid'];
        $path = "../../img/covers-posts/";
        if(!file_exists($path)){
            mkdir($path,777);
        }
        $targetImg = $path.basename($cover["name"]);
        if(move_uploaded_file($cover["tmp_name"],$targetImg)){
            $url = "img/covers-posts/".basename($cover["name"]);
            $sql= "UPDATE usuarios SET portada='$url' WHERE id_usuario='$idUsuario'";
            try{
                $claseDataBase->obtenerConexion()->query($sql);
                header('location:'.$raiz.'modulos/paginas/pagina-principal.php');
            }catch(PDOEXCEPTION $e){
                echo $e->getMessage();
            }
        }else{
            echo "no se pudo subir tu imagen";
        }
    }else{
        echo "los campos son necesarios";
    }