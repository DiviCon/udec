<?php

    // Site Name, Project Name Local, Project Name Remote y App Version
    define('SITENAME', 'UdeC');
    define('PROJECT_LOCAL', 'udec');
    define('PROJECT_REMOTE', 'udec');
    define('APPVERSION', '0.2.0');

    // App Root y URL Root
    define('APPROOT', dirname(dirname(__FILE__)));

    if ($_SERVER['SERVER_ADDR'] === '127.0.0.1' || $_SERVER['SERVER_ADDR'] === '::1' || $_SERVER['SERVER_ADDR'] === 'localhost') {
        define('URLROOT', 'http://localhost/' . PROJECT_LOCAL);
        define('ENV', 'development');
    } else {
        define('URLROOT', 'https://' . PROJECT_REMOTE);
        define('ENV', 'production');
    }

    // Controlador por defecto y Metodo por defecto
    define('DEFAULT_CONTROLLER', 'Auth');
    define('DEFAULT_METHOD', 'index');

    // Configuracion de la base de datos
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'Mario7723702');
    define('DB_NAME', 'db_udec');
    define('DB_CHARSET', 'utf8mb4');