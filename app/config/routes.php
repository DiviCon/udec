<?php

return [
    '/' => ['controller' => 'auth', 'method' => 'index'],
    'auth' => ['controller' => 'auth', 'method' => 'index'],
    'auth/login' => ['controller' => 'auth', 'method' => 'login'], 
    'auth/registro' => ['controller' => 'auth', 'method' => 'registro'], 
    'auth/registrar' => ['controller' => 'auth', 'method' => 'registrar'], 
    'auth/logout' => ['controller' => 'auth', 'method' => 'logout'], 
    'dashboard' => ['controller' => 'dashboard', 'method' => 'index'],
    'dashboard/nuevo_evento' => ['controller' => 'dashboard', 'method' => 'nuevo_evento'],
    'dashboard/guardar_evento' => ['controller' => 'dashboard', 'method' => 'guardar_evento'],
    'dashboard/exportar' => ['controller' => 'dashboard', 'method' => 'exportar'],
    'dashboard/editar_evento/{id}' => ['controller' => 'dashboard', 'method' => 'editar_evento'],
    'dashboard/guardar_cambios/{id}' => ['controller' => 'dashboard', 'method' => 'guardar_cambios']
];