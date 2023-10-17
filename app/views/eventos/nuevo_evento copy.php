<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php echo URLROOT ?>/dashboard"><?php echo SITENAME ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-md-auto d-md-flex">
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT ?>/auth/logout">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><?php echo $title ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="col-8 mx-auto">
                            <form action="<?php echo URLROOT; ?>/auth/login" method="POST" class="login-form pt-3">
                                <div class="form-group row">
                                    <label for="inputActividad" class="col-4 text-right">Actividad: <span class="text-danger">*</span></label> 
                                    <div class="col-8">
                                        <div class="input-group"> 
                                            <textarea class="form-control" name="inputActividad" id="inputActividad" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label for="inpuPorcentaje" class="col-4 text-right">Porcentaje: <span class="text-danger">*</span></label> 
                                    <div class="col-8">
                                        <div class="input-group"> 
                                            <input id="inpuPorcentaje" name="inpuPorcentaje" type="number" class="form-control" reqeuired>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label for="inputEvidencia" class="col-4 text-right">Evidencia: <span class="text-danger">*</span></label> 
                                    <div class="col-8">
                                        <div class="input-group"> 
                                            <textarea class="form-control" name="inputEvidencia" id="inputEvidencia" cols="30" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label for="inputEstado" class="col-4 text-right">Estado: <span class="text-danger">*</span></label> 
                                    <div class="col-8">
                                        <div class="input-group"> 
                                            <select class="form-control" name="inputEstado" id="inputEstado" required>
                                                <option value="0">Seleccione un estado</option>
                                                <option value="1">Completo</option>
                                                <option value="2">Pendiente</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputResponsable" class="col-4 text-right">Evidencia: <span class="text-danger">*</span></label> 
                                    <div class="col-8">
                                        <div class="input-group"> 
                                            <select class="form-control selectpicker" name="inputResponsable" id="inputResponsable" multiple data-live-search="true" required>
                                                <option value="0">Seleccione un responsable</option>
                                                <option value="1">Dirección de Sistemas y Tecnología</option>
                                                <option value="2">Oficina Desarrollo Académico</option>
                                                <option value="3">Unidad de Apoyo Académico</option>
                                                <option value="4">Coordinadores áreas transversales</option>
                                                <option value="5">Líderes CAI</option>
                                                <option value="6">Directores y Coordinadores programas académicos pregrado y posgrado</option>
                                                <option value="7">Interacción Social Universitaria</option>
                                                <option value="8">Direcciones y Coordinaciones de programas académicos</option>
                                                <option value="9">Dirección Instituto de Posgrados</option>
                                                <option value="10">Decanaturas de Facultad</option>
                                                <option value="11">Oficina de Admisiones y Registro</option>
                                                <option value="12">Oficina de Educación Virtual y a Distancia</option>
                                                <option value="13">Rutas de aprendizaje en despliegue y proyectadas 2023-2</option>
                                                <option value="14">Vicerrectoría Académica</option>
                                                <option value="15">Dirección de Talento Humano</option>
                                                <option value="16">Comité del Profesor</option>
                                                <option value="17">Comité Interno de Asignación de Puntaje</option>
                                                <option value="18">Vicerrectoría Administrativa y Financiera</option>
                                                <option value="19">Presupuesto</option>
                                                <option value="20">Líder Dialogando con el Mundo</option>
                                                <option value="21">Tesorería</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>