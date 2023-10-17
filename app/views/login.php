<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="login-block">
    <?php echo flash('error'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 login-sec">
                <h2 class="text-center"><?= $data['title'] ?></h2>
                <form action="<?php echo URLROOT ?>/auth/login" method="POST" class="login-form pt-3">
                    <input type="hidden" name="csrf_token" value="<?php echo $data['csrf_token']; ?>">
                    <div class="form-group">
                        <label for="inputEmail" class="">Correo electrónico</label>
                        <input type="text" class="form-control" name="inputEmail" autocomplete="username" required />     
                        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>   
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="">Contraseña</label>
                        <input type="password" class="form-control" name="inputPassword" autocomplete="current-password" required />
                        <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                    </div>
                    <div class="form-group pt-3">
                        <button type="submit" class="btn btn-login col-12">Iniciar Sesión</button>
                        <div class="col-12 text-center pt-3">
                            <a class="text-sm-left font-weight-light" href="<?php echo URLROOT ?>/auth/registro">Registrarse</a>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="col-md-8 img-view">
                <img class="d-block img-fluid" style="height:100%" src="<?php echo URLROOT ?>/images/Universidad-de-Cundinamarca.jpeg" alt="First slide">
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>