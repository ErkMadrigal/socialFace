<?php 
    include "../config.php";
    include '../../class/database.php';
    include '../../class/consultas.php';
?>
<?php session_start(); ?>
    <?php if(isset($_SESSION["uid"])): ?>
        <?php
            $idUser = $_GET["idUser"];
            $claseConsultas = new consultas();
            $currentUser = $claseConsultas->getDataUser($idUser);
            $allUsers = $claseConsultas->getAllUsers($_SESSION["uid"]);
        ?>
       
        <?php $titulo = $currentUser['nombres']; $mostrarMenu = true; include "../componentes/header.php"; ?>
        <div class="container-fluid">
            <div class="row" style="margin-top: 3rem; ">
                <div class="col-9 offset-lg-1">
                <?php $fotoPortada=$_SESSION["uid"]; include "../componentes/modificar-portada.php";?>
                        <?php $fotoPerfil=$_SESSION["uid"]; include "../componentes/modificar-foto-perfil.php";?>
                        
                    </div>
<!-- menu perfil-->
                    <nav class="nav " style="float: left; margin-left: 9rem; text-decoration: none; text-decoration-color: black !important;">
                        <a class="nav-link active text-dark"  href="#">Biografia </a>
                        <a class="nav-link text-dark" href="#">informacion</a>
                        <a class="nav-link text-dark" href="#">amigos </a>
                        <a class="nav-link text-dark" href="#">fotos</a>
                        <a class="nav-link text-dark" href="#">archivos</a>
                        <a class="nav-link text-dark" href="#">mas</a>
                        <a href="" class="h3"><?php echo $idUser;?></a>
                    </nav>
<!-- fin menu perfil-->
                    <div class="row mt-5">
                        <div class="col-4">
                            <div class="card mt-3">
                                <?php include "../componentes/modificar-inf.php"; ?>
                                <?php include "../componentes/fotos.php";?>
                                <?php include "../componentes/amigos.php";?>
                        <div class="col-8">
                            <?php include "../componentes/compartir.php";?>
                            <?php 
                                        $sql= "SELECT * FROM publicaciones
                                        INNER JOIN usuarios ON usuarios.id_usuario = publicaciones.id_usuario
                                        WHERE publicaciones.id_usuario = '$idUser'
                                        ORDER BY fecha_de_publicacion DESC";
                                        $claseDataBase = new database();
                                        $publicaciones = $claseDataBase->obtenerConexion()->query($sql);
                                        $publicaciones = $publicaciones->fetchAll();
                                        ?>
                            <?php foreach($publicaciones as $publicacion):?>
                            <div class="card mt-3 ">
                                <div class="card-header">
                                    <div class="media">
                                        <img class="mr-3 rounded-circle"  style="    height: 4rem; width: 4rem;" src="<?php echo $raiz.$publicacion['avatar'];?>" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-0 h6"><?php echo $publicacion['nombres'];?></h5>
                                            <p class="card-text"><small class="text-muted">Last updated <?php echo $publicacion['fecha_de_publicacion']?> ago</small></p>
                                        </div>
                                    </div>
                                </div>
                                <img src="<?php echo $raiz.$publicacion['url_imagen'];?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text"><?php echo $publicacion['descipcion'];?></p>
                                    <div class="row">
                                        <div class="col-7">
                                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Comentario">
                                        </div>
                                        <div class="col-5">
                                            <div class="btn-group float-right" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-secondary font-family"><i class="far fa-thumbs-up"></i> Me gusta</button>
                                               <!-- <button type="button" class="btn btn-secondary font-family"><i class="far fa-comments"></i> Comentar</button>-->
                                                <button type="button" class="btn btn-secondary font-family"  data-toggle="modal" data-target="#exampleModal<?php echo $publicacion['id_publicacion'];?>"><i class="fas fa-share"></i> Compartir</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?php echo $publicacion['id_publicacion'];;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <img src="<?php echo $raiz.$publicacion['url_imagen'];?>" class="img-fluid" >
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" 
                                        style="position: absolute; 
                                                right:2rem;
                                                font-size:2rem;
                                                top:1rem;">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <p class="mb-0" style="whord-break: break-word;"></p>
                                    <?php echo $publicacion['descipcion'];?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary">Publicar</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "../componentes/footer.php";?>
        <?php else:?>
            <p>error 404</p>
    <?php endif;?>