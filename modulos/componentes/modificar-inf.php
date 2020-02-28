<div class="card mt-3">
    <div class="card-header">
            <label class="mb-0"> <label class="mb-0"><i class="fas fa-globe-asia"></i></label> Presentación</label>
            <a class="float-right" href="" class="btn btn-raised btn-outline-info ml-5" data-toggle="modal" data-target="#modalUpdateUser">modificar</a>
        </div>
        <div class="card-body">
        <!--query-->
        <?php 
            $sql = "SELECT apellido_materno FROM usuarios WHERE id_usuario= '$idUser'";
                    $response  = null;
                    $claseConexion = new database();
                    $stmt = $claseConexion->obtenerConexion()->query($sql);
                    $datos = $stmt->fetchAll();
            ?>
        <!-- end query-->
            <p class="card-text mb-0">
                <?php foreach($datos as $dato):?>
                    <?php echo $dato["apellido_materno"];?>
                <?php endforeach;?>
            </p>
        </div>
    </div>
</div>
 
 <!-- Modal -->
 <div class="modal fade" id="modalUpdateUser"  tabindex="-1" role="dialog" aria-labelledby="modalUpdateUserTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                 <h5 class="modal-title" id="modalUpdateUserTitle">modificar</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
             </div>
            <div class="modal-body">
                <div class="alert alert-success mt-4" id="respuestaCorrecta" role="alert">

                </div>
                <div class="alert alert-danger" id="respuestaErronea"  role="alert">

                </div>
                <!--form-->
                <form class="needs-validation" novalidate id="modificar">
                                                   
                    <div class="col-12 mt-3">
                        <input type="text"
                            class="form-control" name="descripcion"
                            id="descripcion" placeholder="describete">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-raised btn-success mt-3">Guardar cambios</button>
                    </div>                 
                </form>                   
               <!--end -->                                            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                    </div>
            </div>
         </div>
    </div>
</div>
<script>
    var raiz = "<?php echo $raiz;?>";
</script>
<script src="<?php echo $raiz;?>js/modificar-estado.js"></script>
<script src="<?php echo $raiz;?>js/jquery.min.js"></script>