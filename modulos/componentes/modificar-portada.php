<?php if($fotoPortada==$idUser):?>
<div class="imagen-portada" id="coverPortadaImage" style="height: 19rem; background-image: url(<?php echo $raiz.$currentUser["portada"];?>);
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: cover;">
                        
                        <label class="btn btn-primary cargar-imagen-portada" >
                            <i class="fas fa-camera"></i>
                            <input type="file"  id="uploadImage" class="d-none" >
                        </label>
                        <!-- <p class="mb-0 ml-3" href="" class="btn btn-raised btn-outline-info ml-5" data-toggle="modal" data-target="#portada">Actualizar Portada</p> -->
<?php else: ?>
<div class="imagen-portada" id="coverPortadaImage" style="height: 19rem; background-image: url(<?php echo $raiz.$currentUser["portada"];?>);
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: cover;">
<?php endif;?> 
 

<script src="<?php echo $raiz;?>js/jquery.min.js"></script>
<script >
    var url = "<?php echo $raiz;?>";
    $('#uploadImage').change(function () {
        if( this.files[0] !== undefined){
            dataForm = new FormData();
            dataForm.append('imagen',this.files[0])
            fetch(url+'class/upload-image.php',{
                method : "POST",
                body : dataForm
            })
            .then((response)=>response.json())
            .then((info)=>console.log(info))
            readURL(this);
        }else{
            alert('Imgresa una imagen');
        }
        
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                console.log()
                $('#coverPortadaImage').css('background-image', 'url('+e.target.result+')');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>