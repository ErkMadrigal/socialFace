<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $titulo; ?></title>
    <link rel="shortcut icon" href="<?php echo $raiz;?>img/facebook.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo $raiz;?>css/all.css">
    <link rel="stylesheet" href="<?php echo $raiz;?>css/bootstrap-material-design.css">
    <link rel="stylesheet" href="<?php echo $raiz;?>css/red-social.css">
</head>
<body>
    <main class="bg-gris">
        <?php if( $mostrarMenu ): ?>
            <ul class="nav menu-navegacion bg-azul justify-content-center fixed-top">
                <li class="busqueda">
                    <div class="input-group mt-1">
                        <div class="input-group-prepend logotipo">
                            <span class="input-group-text"><i class="fab fa-facebook-square"></i></span>
                        </div>
                        <input type="text" class="form-control input-busqueda" placeholder="Buscar">
                        <div class="input-group-append icono-busqueda">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                
                    <a class="nav-link text-white mt-1 font-family" href="<?php echo $raiz."modulos/paginas/pagina-perfil.php?idUser=".$_SESSION["uid"];?>"> <img class="avatar mr-1" src="<?php echo $raiz.$currentUser["avatar"];?>" alt="avatar-usuario"> <?php echo $currentUser["nombres"];?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white mt-1 font-family" href="<?php echo $raiz."modulos/paginas/pagina-principal.php";?>">Inicio</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle mas-opciones mas-amigos" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-friends"></i></button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="width: 28rem; max-height: 24rem;overflow: scroll; overflow-x: hidden;">
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
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle mas-opciones" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 13rem;">
                            <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i> Configuración</a>
                            <a class="dropdown-item" href=<?php echo $raiz."modulos/php/cerrar-sesion.php"; ?>><i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión</a>
                        </div>
                    </div>
                </li>
            </ul>
            <?php else: ?>
                <div class="container-fluid">
                    <div class="row bg-azul">
                        <div class="col-6 mt-2 text-center">
                            <p class="text-white h3 mb-0">Facebook</p>
                        </div>
                        <div class="col-6 mt-2">
                            <form id="loginUser" class="login-validation" novalidate class="mb-0">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" style="background: white;" name="correoTelefonoLogin" class="form-control" required placeholder="Correo electrónico o teléfono" >
                                        <div class="invalid-tooltip">
                                            Por favor ingresa tu correo o tu telefono.
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <input type="password" style="background: white;" name="paswordLogin"  class="form-control" required placeholder="Contraseña" >
                                        <div class="invalid-tooltip">
                                            Por favor ingresa tu contraseña.
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-raised btn-primary bg-azul">Entrar</button>
                                    </div>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>   
                
        <?php endif;?>