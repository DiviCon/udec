<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-primary bg-primary">
        <a class="navbar-brand text-white" href="<?php echo URLROOT ?>/dashboard"><?php echo SITENAME ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-md-auto d-md-flex">
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= URLROOT ?>/auth/logout">Cerrar Sesión</a>
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
                    <form action="<?php echo URLROOT; ?>/dashboard/guardar_evento" method="POST" class="login-form pt-3" autocomplete="off">
                        <div class="card-body">
                            <div class="row px-5">                                  
                                <div class="form-group col-sm-12 col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="opcion1" name="opcion" value="opcion1">
                                        <label class="form-check-label col-form-label-md" for="opcion1">Fecha Única</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="opcion2" name="opcion" value="opcion2">
                                        <label class="form-check-label col-form-label-md" for="opcion2">Rango de Fechas</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="opcion3" name="opcion" value="opcion3">
                                        <label class="form-check-label col-form-label-md" for="opcion3">Multiples Fechas</label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <!-- Input para la Fecha -->
                                    <div class="" id="fechaInput" style="display: none;">
                                        <label class="col-form-label-sm">Seleccione la fecha <span class="text-danger">*</span></label>
                                        <input type="text" id="inputFecha" class="form-control form-control-sm" name="inputFecha" >
                                    </div>
                                    <!-- Inputs para el Rango de Fechas -->
                                    <div class="" id="rangoFechaInicio" style="display: none;">
                                        <label class="col-form-label-sm">Seleccione la fecha de inicio <span class="text-danger">*</span></label>
                                        <input type="text" id="inputRangoFechaInicio" class="form-control form-control-sm" name="inputRangoFechaInicio" >
                                    </div>
                                    <div class="mt-2" id="rangoFechaFin" style="display: none;">
                                        <label class="col-form-label-sm">Seleccione la fecha de fin <span class="text-danger">*</span></label>
                                        <input type="text" id="inputRangoFechaFin" class="form-control form-control-sm" name="inputRangoFechaFin" >
                                    </div>
                                    <!-- Select para Fechas Múltiples -->
                                    <div class="" id="multipleFechas" style="display: none;">
                                        <label class="col-form-label-sm">Seleccione las fechas <span class="text-danger">*</span></label>
                                        <input type="text" id="inputMultiplesFechas" class="form-control form-control-sm" name="inputMultiplesFechas" >
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-12">       
                                        <label for="inputActividad" class="col-form-label-sm">Actividad <span class="text-danger">*</span></label> 
                                        <textarea class="form-control form-control-sm" name="inputActividad" id="inputActividad" cols="30" rows="3" required></textarea>
                                </div> 
                                <div class="form-group col-sm-12 col-md-12">
                                        <label for="inputPorcentaje" class="col-form-label-sm">Porcentaje <span class="text-danger">*</span></label>                                       
                                        <input id="inputPorcentaje" name="inputPorcentaje" type="text" class="form-control form-control-sm" >
                                </div>                                
                                <div class="form-group col-sm-12 col-md-12">
                                    <label for="inputEvidencia" class="col-form-label-sm">Evidencia <span class="text-danger">*</span></label> 
                                    <textarea class="form-control form-control-sm" name="inputEvidencia" id="inputEvidencia" cols="30" rows="3" ></textarea>
                                </div> 
                                <div class="form-group col-sm-12 col-md-12">
                                        <label for="inputResponsable" class="col-form-label-sm">Responsable(s) <span class="text-danger">*</span></label>                                       
                                        <textarea class="form-control form-control-sm" name="inputResponsable" id="inputResponsable" cols="30" rows="3" required></textarea>
                                </div>  
                                <div class="form-group col-sm-12 col-md-12">
                                    <label for="inputEstado" class="col-form-label-sm">Estado <span class="text-danger">*</span></label> 
                                    <select class="form-control form-control-sm" name="inputEstado" id="inputEstado" required>
                                        <option value="0">Seleccione un estado</option>
                                        <option value="1">Completo</option>
                                        <option value="2">Pendiente</option>
                                        <option value="3">Urgente</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group pt-3">
                                <button type="submit" class="btn btn-primary">Guardar Evento</button>
                                <a type="button" href="<?php echo URLROOT ?>/dashboard" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>