<?php
    session_start();
    include '../config.php';
    include '../../class/database.php';
    include '../../class/inserciones.php';
    $claseInserciones = new inserciones();
    $claseDataBase = new database();
    $descripcion = $_POST['descripcion'];
    $cover = $_FILES['cover'];
    if($descripcion !== "" && $cover['name'] !== ""){
        $idUsuario  = $_SESSION['uid'];
        $path = "../../img/covers-posts/";
        if(!file_exists($path)){
            mkdir($path,777);
        }
        $targetImg = $path.basename($cover["name"]);
        if(move_uploaded_file($cover["tmp_name"],$targetImg)){
            date_default_timezone_set('UTC');
            date_default_timezone_set("America/Mexico_City");
            $datepost = date("Y-m-d H:i:s");
            $url = "img/covers-posts/".basename($cover["name"]);
            $sql = "INSERT INTO publicaciones (id_usuario, fecha_de_publicacion, descipcion, url_imagen, me_gusta, total_me_gusta) VALUES('$idUsuario','$datepost','$descripcion','$url',0,0)";
            try{
                $claseDataBase->obtenerConexion()->query($sql);
                header('location:'.$raiz.'modulos/paginas/pagina-principal.php');
            }catch(PDOEXCEPTION $e){
                echo $sql;
                echo $e->getMessage();
            }
        }else{
            echo "no se pudo subir tu imagen";
        }
    }else{
        echo "los campos son necesarios";
    }