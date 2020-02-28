<div class="card mt-3">
        <div class="card-header">
            <label class="mb-0"> <label class="mb-0"><i class="fas fa-image"></i></label> Fotos</label>
            <a class="float-right" href="">Agregar foto</a>
        </div>
        <div class="card-body p-1">
            <div class="container-fluid">
            <!--query-->
            <?php 
                $sql= "SELECT * FROM publicaciones
                INNER JOIN usuarios ON usuarios.id_usuario = publicaciones.id_usuario
                WHERE publicaciones.id_usuario = '$idUser'
                ORDER BY fecha_de_publicacion DESC LIMIT 9";
                $claseDataBase = new database();
                $publicaciones = $claseDataBase->obtenerConexion()->query($sql);
                $publicaciones = $publicaciones->fetchAll();
            ?>
        <!-- end query-->
                <div class="row">
                <?php foreach($publicaciones as $publicacion):?>
                        <div class="col-4 p-1"><img class="img-fluid" style="height: 91px;" src="<?php echo $raiz.$publicacion["url_imagen"];?>" alt=""></div>
                <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>


                        