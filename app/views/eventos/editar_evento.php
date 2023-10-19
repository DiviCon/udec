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
                        <div class="row">
                            <h5 class="card-title col-6"><?php echo $title ?></h5>
                            <p class="font-weight-bold text-right col-6">Útlima edición: <?= fecha_con_hora($data['evento']->fecha_actualizacion) ?></p>
                        </div>
                    </div>
                    <form action="<?php echo URLROOT .'/dashboard/guardar_cambios/' . $data['id_evento'] ?>" method="POST" class="login-form pt-3" autocomplete="off">
                        <div class="card-body">
                            <div class="row px-5">         
                                <div >
                                    <p class="text-sm-left text-muted"><span class="text-danger">*</span> Para realizar cambios en una fecha específica, primero selecciona el tipo de fecha que deseas para activar el calendario.</p>
                                </div>                         
                                <div class="form-group col-sm-12 col-md-6">
                                    <input type="hidden" name="inputTipo" value="<?= $data['evento']->tipo ?>">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="opcion1" name="opcion" value="opcion1" >
                                        <label class="form-check-label col-form-label-md" for="opcion1">Fecha Única</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="opcion2" name="opcion" value="opcion2" >
                                        <label class="form-check-label col-form-label-md" for="opcion2">Rango de Fechas</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="opcion3" name="opcion" value="opcion3" >
                                        <label class="form-check-label col-form-label-md" for="opcion3">Multiples Fechas</label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-6" id="calendarios">
                                    <!-- Input para la Fecha -->
                                    <div class="" id="fechaInput" style="display: <?= ($data['evento']->tipo == 'unico') ? 'block' : 'none' ?>;">
                                        <label class="col-form-label-sm">Fecha única seleccionada </label>
                                        <input type="text" id="inputFecha" class="form-control form-control-sm" name="inputFecha" value="<?= $data['evento']->valor ?>" >
                                    </div>
                                    <!-- Inputs para el Rango de Fechas -->
                                    <div class="" id="rangoFechaInicio" style="display: <?= ($data['evento']->tipo == 'rango') ? 'block' : 'none' ?>;">
                                        <label class="col-form-label-sm">Fecha de inicio seleccionada </label>
                                        <input type="text" id="inputRangoFechaInicio" class="form-control form-control-sm" name="inputRangoFechaInicio" value="<?= $data['evento']->inicio ?>" >
                                    </div>
                                    <div class="mt-2" id="rangoFechaFin" style="display: <?= ($data['evento']->tipo == 'rango') ? 'block' : 'none' ?>;">
                                        <label class="col-form-label-sm">Fecha de fin seleccionada </label>
                                        <input type="text" id="inputRangoFechaFin" class="form-control form-control-sm" name="inputRangoFechaFin" value="<?= $data['evento']->fin ?>" >
                                    </div>
                                    <!-- Select para Fechas Múltiples -->
                                    <div class="" id="multipleFechas" style="display: <?= ($data['evento']->tipo == 'varios') ? 'block' : 'none' ?>;">
                                        <label class="col-form-label-sm">Fechas seleccionadas </label>
                                        <input type="text" id="inputMultiplesFechas" class="form-control form-control-sm" name="inputMultiplesFechas" value="<?php echo $data['evento']->valores; ?>" multiple>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-12">       
                                        <label for="inputActividad" class="col-form-label-sm">Actividad </label> 
                                        <textarea class="form-control form-control-sm" name="inputActividad" id="inputActividad" cols="30" rows="3"  value=""><?php echo $data['evento']->actividad ?></textarea>
                                </div> 
                                <div class="form-group col-sm-12 col-md-12">
                                        <label for="inputPorcentaje" class="col-form-label-sm">Porcentaje </label>            
                                        <input id="inputPorcentaje" name="inputPorcentaje" type="text" class="form-control form-control-sm" value="<?php echo number_format($data['evento']->porcentaje, 2, '.', ' ') ?>" >
                                </div>                                
                                <div class="form-group col-sm-12 col-md-12">
                                    <label for="inputEvidencia" class="col-form-label-sm">Evidencia </label> 
                                    <textarea class="form-control form-control-sm" name="inputEvidencia" id="inputEvidencia" cols="30" rows="3" ><?php echo $data['evento']->evidencia ?></textarea>
                                    <small> <a href="<?php echo $data['evento']->evidencia ?>" target="_blank">-> Ir a la evidencia</a></small>
                                </div> 
                                <div class="form-group col-sm-12 col-md-12">
                                        <label for="inputResponsable" class="col-form-label-sm">Responsable(s) </label>                                       
                                        <textarea class="form-control form-control-sm" name="inputResponsable" id="inputResponsable" cols="30" rows="3" ><?= $data['evento']->responsable ?></textarea>
                                </div>  
                                <div class="form-group col-sm-12 col-md-12">
                                    <label for="inputEstado" class="col-form-label-sm">Estado </label> 
                                    <select class="form-control form-control-sm" name="inputEstado" id="inputEstado" >
                                        <option value="1" <?= $data['evento']->estado == 1 ?? 'selected' ?>>Completo</option>
                                        <option value="2" <?= $data['evento']->estado == 2 ?? 'selected' ?>>Pendiente</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group pt-3">
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
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