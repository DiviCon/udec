<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="login-block">
    <?php echo flash('error'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 login-sec">
                <img class="d-block img-fluid" style="height:100%" src="<?php echo URLROOT ?>/images/logo-u.jpg" alt="First slide">
            </div>
            
            <div class="col-md-8 login-sec">
                <h2 class="text-center"><?= $data['title'] ?></h2>
                    <form action="<?php echo URLROOT; ?>/auth/registrar" method="POST" class="login-form pt-3">
                        <input type="hidden" name="csrf_token" value="<?php echo $data['csrf_token']; ?>">
                        <div class="row">
                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="inputNombre" class="">Nombre</label>
                                <input type="text" class="form-control" name="inputNombre" required />     
                                <span class="invalid-feedback"><?php echo $data['nombre_err']; ?></span>   
                            </div>
                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="inputApellidos" class="">Apellidos</label>
                                <input type="text" class="form-control" name="inputApellidos" required />     
                                <span class="invalid-feedback"><?php echo $data['apellidos_err']; ?></span>   
                            </div>
                        </div>
                        <div class="row">  
                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="inputEmail" class="">Correo electrónico</label>
                                <input type="email" class="form-control" name="inputEmail" required />     
                                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>   
                            </div>                          
                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="inputPassword" class="">Contraseña</label>
                                <input type="password" class="form-control" name="inputPassword" autocomplete="current-password" required />
                                <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                            </div>
                        </div>
                        <div class="form-group pt-3">
                            <button type="submit" class="btn btn-login col-12">Guardar</button>
                            <div class="col-12 text-center pt-3">
                                <a class="text-sm-left font-weight-light" href="<?php echo URLROOT ?>/auth">Iniciar Sesión</a>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>