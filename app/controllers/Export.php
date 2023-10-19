<?php

class Export extends Controller 
{
    private $dashboard_model;
    
    public function __construct()
    {
        $this->dashboard_model = $this->model('Exportar');
    }

    /*
    |--------------------------------------------------------------------------
    | Función Construct
    |--------------------------------------------------------------------------
    | 
    | 
    */
    public function index()
    {
        $data = $this->dashboard_model->obtenerDatos();
        
        if ($data) {
            // Antes de codificar a JSON, asegúrate de que los caracteres especiales se codifiquen correctamente.
            $formattedData = array();

            foreach ($data as $item) {
                $formattedItem = array(
                    'id' => $item->id,
                    'actividad' => mb_convert_encoding($item->actividad, 'UTF-8', 'auto'),
                    'porcentaje' => $item->porcentaje,
                    'fecha' => array(),
                    'responsable' => mb_convert_encoding($item->responsable, 'UTF-8', 'auto'),
                    'evidencia' => $item->evidencia,
                    'estado' => $item->estado
                );
                
                if ($item->tipo == 'unico') {
                    $formattedItem['fecha']['tipo'] = 'unico';
                    $formattedItem['fecha']['valor'] = date("d-m-Y", strtotime($item->valor));
                } elseif ($item->tipo == 'rango') {
                    $formattedItem['fecha']['tipo'] = 'rango';
                    $formattedItem['fecha']['inicio'] = date("d-m-Y", strtotime($item->inicio));
                    $formattedItem['fecha']['fin'] = date("d-m-Y", strtotime($item->fin));
                } elseif ($item->tipo == 'varios') {
                    $formattedItem['fecha']['tipo'] = 'varios';
                    $fechas_array = explode(", ", $item->valores);

                    // Inicializa un array para almacenar las fechas formateadas
                    $fechas_formateadas = array();

                    // Itera a través de las fechas y las formatea
                    foreach ($fechas_array as $fecha) {
                        $fecha_formateada = date("d-m-Y", strtotime($fecha));
                        $fechas_formateadas[] = $fecha_formateada;
                    }

                    // Convierte el array de fechas formateadas nuevamente a una cadena
                    $formattedItem['fecha']['valores'] = implode(", ", $fechas_formateadas);
                    // $formattedItem['fecha']['valores'] = date("d-m-Y", strtotime($item->valores));
                }

                $formattedData[] = $formattedItem;
            }
            
            $json_data = json_encode($formattedData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
            
            echo $json_data;

        } else {
            echo "Error al consultar la base de datos.";
        }
    }
}