<?php 
    include '../config.php'; 
    include '../../class/database.php';
    include '../../class/consultas.php';
?>
<?php session_start(); ?>
    <?php if(isset($_SESSION["uid"])): ?>
        <?php
            $claseConsultas = new consultas();
            $currentUser = $claseConsultas->getDataUser($_SESSION["uid"]);
            $allUsers = $claseConsultas->getAllUsers($_SESSION["uid"]);
        ?>
        <?php $titulo  = "Bienvenido ".$currentUser["nombres"] ; $mostrarMenu = true; include '../componentes/header.php';?>
           
    <div class="container-fluid">
        <div class="row" style="margin-top: 4rem; ">
            <div class="col-7 offset-lg-1">
                <div class="card">
                    <div class="card-header ">
                        <p class="mb-0 font-weight-bold">Personas que quizá conozcas</p>
                    </div>
                    <div class="card-body">
                    <?php foreach($allUsers as $user ): ?>
                                    <div class="media border-bottom mb-3">
                                        <img class="mr-3 rounded-circle" src="<?php echo $raiz.$user['avatar'];?>" style="height: 3rem;width: 3rem;"  alt="Generic placeholder image">
                                        <div class="media-body">
                                            <a class="ml-3" href="<?php echo $raiz."modulos/paginas/pagina-perfil.php?idUser=".$user['id_usuario'];?>"><?php echo $user['nombres']?></a>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-secondary"><i class="fas fa-user-plus"></i> Agregar a Amigos</button>
                                                <button type="button" class="btn btn-secondary"><i class="fas fa-trash-alt"></i> Eliminar</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
<?php include '../componentes/footer.php'; ?>
<?php else:?>
            <p>error 404</p>
    <?php endif;?>