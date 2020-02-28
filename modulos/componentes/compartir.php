<div class="card mt-3">
    <form action="../php/crear-publicacion.php" method="post" enctype="multipart/form-data">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            <label class="btn btn-primary btn-file" style="text-transform: inherit;">
                                <i class="fas fa-images mr-2"></i> Foto 
                                <input  type="file" accept="image/*,video/*" name="cover" class="d-none"  required>
                            </label> 
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-primary" style="text-transform: initial;">Compartir</button>
                        </li>
                    </ul>
                </div>
                <div class="col-4">
                    <p class="mb-0 mt-2 float-right font-weight-bold">Crear publicación</p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="media">
            <img class="mr-3 rounded-circle" src="<?php echo $raiz.$currentUser["avatar"];?>" style="height: 3rem;width: 3rem;"  alt="Generic placeholder image">
                <div class="media-body">
                    <textarea name="descripcion" required class="form-control" placeholder="<?php 
                        if(isset($idUser)){
                            if($_SESSION['uid'] != $idUser){
                                $mensaje =  "Escribe algo a ".$currentUser["nombres"];
                            }else{
                                $mensaje =  "¿Qué estás pensando, ".$currentUser["nombres"]."?";
                            }
                        }else{
                            $mensaje =  "¿Qué estás pensando, ".$currentUser["nombres"]."?";
                        }
                        echo $mensaje;?>"></textarea>
                </div>
            </div>
        </div>
    </form>
</div>