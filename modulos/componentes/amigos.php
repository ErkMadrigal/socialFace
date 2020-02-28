<div class="card mt-3">
        <div class="card-header">
            <label class="mb-0"> <label class="mb-0"><i class="fas fa-user-friends"></i></label> Amigos</label>
            <a class="float-right" href="">Buscar Amigos</a>
        </div>
        <div class="card-body p-1">
            <div class="container-fluid">
            
                <!-- query -->
                    <?php
                        $sql = "SELECT * FROM usuarios 
                        WHERE id_usuario != '$idUser' 
                        ORDER BY id_usuario DESC LIMIT 9"; 
                        $response = null;
                            $claseConexion = new database();
                            $stmt = $claseConexion->obtenerConexion()->query($sql);
                            $usuarios  = $stmt->fetchALL();
                    ?>
                <!-- endquery-->
                <div class="row">
                    <?php foreach($usuarios as $usuario ): ?>
                        <div class="col-4 p-1">
                            <a href="<?php echo $raiz."modulos/paginas/pagina-perfil.php?idUser=".$usuario['id_usuario'];?>">
                                <img class="img-fluid" style="height: 91px;" src="<?php echo $raiz.$usuario['avatar']?>" alt="">
                                </a>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>
