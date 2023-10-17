<?php
/*
 * Controlador Base
 * Carga los modelos y vistas
 */
class Controller 
{
    // Cargar modelo
    public function model($model)
    {
        // Cargar archivo del modelo
        require_once '../app/models/' . $model . '.php';

        // Instanciar el modelo
        return new $model();
    }

    // Cargar vista
    public function view($view, $data = [])
    {
        // Verificar si existe el archivo de la vista
        if (file_exists('../app/views/' . $view . '.php'))
        {
            // Extraer los datos para que estén disponibles en la vista
            extract($data);
            require_once '../app/views/' . $view . '.php';
        } else {
            // La vista no existe
            die('La vista no existe');
        }
    }
}
