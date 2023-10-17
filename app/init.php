<?php
    setlocale(LC_TIME, 'es_ES.utf8');
    
    if (session_status() !== PHP_SESSION_ACTIVE) {
        // Inicio de la sesión
        session_start();
    }
    
    // Cargar Configuración
    require_once 'config/config.php';
    
    ini_set('display_errors', ENV == 'development' ? 1 : 0);
    error_reporting(E_ALL);

    // Cargar Helpers
    require_once 'helpers/url_helper.php';
    require_once 'helpers/session_helper.php';
    require_once 'helpers/funciones_helper.php';

    // Autocargar Bibliotecas Principales
    // El nombre de la clase y el nombre del archivo son iguales, por lo que se buscará 
    // el archivo correspondiente en Libraries según el nombre de la clase.
    spl_autoload_register(function($className) {
        require_once 'libraries/' . $className . '.php';
    });