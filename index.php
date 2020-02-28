<?php include 'modulos/config.php';?>
<?php $titulo = "Registro"; $mostrarMenu = false; include 'modulos/componentes/header.php'; ?>
<div class="container-fluid">
    <div class="alert alert-success mt-4" id="respuestaCorrecta" role="alert">

    </div>
    <div class="alert alert-danger" id="respuestaErronea"  role="alert">

    </div>
    <div class="row" style="margin-top: 3rem;">
        <div class="col-6 text-center p-2">
            <p class="font-weight-bold h5">Facebook te ayuda a comunicarte y compartir con las personas que forman parte
                de tu vida.</p>
            <img src="img/mapa.png" alt="">
        </div>
        <div class="col-6 pl-4 pr-4 pb-4">
            <h1 class="font-weight-bold h2">Abre una cuenta</h1>
            <h2 class=" h6">Es gratis y lo será siempre.</h2>
            <form class="needs-validation" novalidate id="registrar">
                <div class="form-row">
                    <div class="col-6">
                        <input required type="text"
                            style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                            class="form-control" name="nombre" id="nombre" placeholder="Nombre">
                        <div class="invalid-tooltip">
                            Por favor ingresa tu nombre.
                        </div>
                    </div>
                    <div class="col-6">
                        <input required type="text"
                            style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                            class="form-control " name="apellido" id="apellido" placeholder="Apellido">
                        <div class="invalid-tooltip">
                            Por favor ingresa tu apellido.
                        </div>
                    </div>
                    <div class="col-12">
                        <input required type="text" class="form-control  mt-3"
                            style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                            name="numeroOCorreo" placeholder="Número celular o correo electrónico">
                        <div class="invalid-tooltip">
                            Por favor ingresa un correo o telefono.
                        </div>
                    </div>
                    <div class="col-12">
                        <input required type="password" class="form-control  mt-3"
                            style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;" name="contrasenia"
                            placeholder="Contraseña">
                        <div class="invalid-tooltip">
                            Por favor ingresa tu contraseña.
                        </div>
                    </div>
                    <div class="col-12">
                        <h3 class="h6 mt-3">Fecha de nacimiento</h3>
                        <div class="form-row">
                            <div class="col-4">
                                <select required class="custom-select" name="dia" id="dia">
                                    <option value="">Día</option>
                                    <?php for( $i=0 ; $i < 31 ; $i++ ): ?>
                                    <option value="<?php echo ( $i + 1 ); ?>"><?php echo ( $i + 1 ); ?></option>
                                    <?php endfor; ?>
                                </select>
                                <div class="invalid-tooltip">
                                    Por favor selecciona tu dia de nacimiento.
                                </div>
                            </div>
                            <div class="col-4">
                                <?php
                                    $meses = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
                                ?>
                                <select required class="custom-select" name="mes" id="mes">
                                    <option value="">Mes</option>
                                    <?php for( $i=0 ; $i < 12 ; $i++ ): ?>
                                    <option value="<?php echo ( $i + 1 ); ?>"><?php echo strtolower($meses[$i]); ?>
                                    </option>
                                    <?php endfor; ?>
                                </select>
                                <div class="invalid-tooltip">
                                    Por favor selecciona tu mes de nacimiento.
                                </div>
                            </div>
                            <div class="col-4">
                                <?php $anioActual = date("Y"); ?>
                                <select required class="custom-select" name="anio" id="anio">
                                    <option value="">Año</option>
                                    <?php for( $i = $anioActual ; $i > 1904 ; $i-- ): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                                <div class="invalid-tooltip">
                                    Por favor selecciona tu año de nacimiento.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <select required class="custom-select mt-3" name="genero" id="genero">
                            <option value="">Elige sexo</option>
                            <option value="1">Mujer</option>
                            <option value="2">Hombre</option>
                            <option value="3">Prefiero no especificar</option>
                        </select>
                        <div class="invalid-tooltip">
                            Por favor selecciona tu genero de nacimiento.
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-raised btn-success mt-3">Registrarte</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var raiz = "<?php echo $raiz;?>";
</script>
<script src="js/login-usuario.js"></script>
<script src="js/registro-usuario.js"></script>
<?php include 'modulos/componentes/footer.php'; ?>