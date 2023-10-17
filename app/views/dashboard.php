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
                <?php echo flash('error'); ?>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Actividades Registradas</h5>
                    </div>
                    <div class="card-body">                        
                        <div class="text-center mb-3">
                            <a href="<?= URLROOT ?>/dashboard/nuevo_evento" class="btn btn-primary btn-sm">Registrar Nueva Actividad</a>
                            <a href="<?= URLROOT ?>/dashboard/exportar" class="btn btn-info btn-sm" download>Exportar Actividades en JSON</a>
                        </div>

                        <table class="table table-inbox table-hover table-bordered responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Actividad</th>
                                    <th class="text-center" width="13%">Estado</th>
                                    <th class="text-right" width="13%">Creado el</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($data['eventos'] as $evento) : ?>
                                    <tr class="unread">
                                        <td class="inbox-small-cells"><?php echo $no++ ?></td>
                                        <td class=""><a href="#" class="text-sm text-dark"><?php echo $evento->actividad ?></a></td>
                                        <td class="text-center"><?php echo $evento->estado == 'completo' ? '<span class="badge badge-success p-2">Completo</span>' : ($evento->estado == 'pendiente' ? '<span class="badge badge-danger p-2">Pendiente</span>' : '<span class="badge badge-warning p-3">Urgente</span>') ?></td>
                                        <td class="text-sm text-dark text-right"><?php echo date('d-m-Y', strtotime($evento->fecha_registro)) ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm rounded" href="<?php echo URLROOT . '/dashboard/editar_evento/' . $evento->id ?>">Modificar</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>