<?php if($fotoPerfil==$idUser):?>
<label class="btn btn-primary btn-file rounded-circle" style="height: 8rem;width: 8rem;background-image: url(<?php echo $raiz.$currentUser["avatar"];?>);
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: cover;
                        border: 4px solid white;
                        position: relative;
                        top: 10rem;
                        left: 1rem;
                        padding: 0;">
                       <div class="text-white p-2" style="background: rgba(0,0,0,0.6);
                            border-radius: 0 0 8rem 8rem;
                            height: 4rem;
                            width: 7.5rem;
                            position: absolute;
                            bottom: -1px;
                            left: 0px;
                            text-transform: initial;
                            ">
                            <i class="fas fa-camera"></i>
                        <p class="mb-0" href="" class="btn btn-raised btn-outline-info ml-5" data-toggle="modal" data-target="#example">Actualizar</p>
                        </div>
                        <div class="nombre text-white h1" style="font-family: unset; margin-left: 9rem; margin-top: 4rem;">
                                ejemplo
                        </div>
                        </label>
                        
<?php else: ?>
<label class="btn btn-primary btn-file rounded-circle" style="height: 8rem;width: 8rem;background-image: url(<?php echo $raiz.$currentUser["avatar"];?>);
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: cover;
                        border: 4px solid white;
                        position: relative;
                        top: 10rem;
                        left: 1rem;
                        padding: 0;">
                        </label>
                        
<?php endif;?>

                        
                        
 <!-- Modal -->
 <div class="modal fade" id="example"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLongTitle">Modifica tu Foto de Perfil</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
             </div>
            <div class="modal-body">
                <!--form-->
                <form action="../php/cambiar-foto-perfil.php" method="post" enctype="multipart/form-data">
                                                   
                    <div class="col-12 mt-3">
                        <label class="btn btn-raised btn-warning" style="text-transform: inherit;">
                            Actualiza tu Foto de Perfil 
                            <input  type="file" accept="image/*" name="cover" class="d-none" required>
                        </label> 
                    </div>
                    <div class="col-12">
                        <button class="btn btn-raised btn-success mt-3">Guardar</button>
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
