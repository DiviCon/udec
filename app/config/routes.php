<?php

return [
    '/' => ['controller' => 'Auth', 'method' => 'index'],
    'auth' => ['controller' => 'Auth', 'method' => 'index'],
    'auth/login' => ['controller' => 'Auth', 'method' => 'login'], 
    'auth/registro' => ['controller' => 'Auth', 'method' => 'registro'], 
    'auth/registrar' => ['controller' => 'Auth', 'method' => 'registrar'], 
    'auth/logout' => ['controller' => 'Auth', 'method' => 'logout'], 
    'dashboard' => ['controller' => 'Dashboard', 'method' => 'index'],
    'dashboard/nuevo_evento' => ['controller' => 'Dashboard', 'method' => 'nuevo_evento'],
    'dashboard/guardar_evento' => ['controller' => 'Dashboard', 'method' => 'guardar_evento'],
    'dashboard/exportar' => ['controller' => 'Dashboard', 'method' => 'exportar'],
    'dashboard/editar_evento/{id}' => ['controller' => 'Dashboard', 'method' => 'editar_evento'],
    'dashboard/guardar_cambios/{id}' => ['controller' => 'Dashboard', 'method' => 'guardar_cambios'],
    'export' => ['controller' => 'Export', 'method' => 'index']
];