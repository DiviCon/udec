<?php

class Dashboard extends Controller 
{
    private $evento_model, $dashboard_model;

    /*
    |--------------------------------------------------------------------------
    | Función Construct
    |--------------------------------------------------------------------------
    | 
    | 
    */
    public function __construct()
    {
        if (!$_SESSION['logged_in']) {
            redirect('');
        }

        $this->evento_model = $this->model('Evento');
        $this->dashboard_model = $this->model('Exportar');
    }

    /*
    |--------------------------------------------------------------------------
    | Función Index
    |--------------------------------------------------------------------------
    | 
    | 
    */
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'eventos' => $this->evento_model->getAll()
        ];
        
        $this->view('dashboard', $data);
    }

    /*
    |--------------------------------------------------------------------------
    | Función Nuevo Evento
    |--------------------------------------------------------------------------
    | 
    | 
    */
    public function nuevo_evento()
    {
        $data = [
            'title' => 'Registrar Nueva Actividad',
        ];
        
        $this->view('eventos/nuevo_evento', $data);
    }

    /*
    |--------------------------------------------------------------------------
    | Función Guardar Evento
    |--------------------------------------------------------------------------
    | 
    | 
    */
    public function guardar_evento()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // show(trim($_POST['inputFecha']);
            
            $data_form = $this->_validateForm();
            
            if (isset($data_form['validation']) || $data_form['validation'] != false) {
                $data_event = [
                    'tipo' => $data_form['opcion'] == 'opcion1' ? 'unico' : ($data_form['opcion'] == 'opcion2' ? 'rango' : 'varios'),
                    'valor' => $data_form['opcion'] == 'opcion1' ? $_POST['inputFecha'] : NULL,
                    'inicio' => $data_form['opcion'] == 'opcion2' ? $_POST['inputRangoFechaInicio'] : NULL,
                    'fin' => $data_form['opcion'] == 'opcion2' ? $_POST['inputRangoFechaFin'] : NULL,
                    'valores' => $data_form['opcion'] == 'opcion3' ? $_POST['inputMultiplesFechas'] : NULL,
                    'actividad' => $data_form['inputActividad'],
                    'porcentaje' => $data_form['inputPorcentaje'],
                    'evidencia' => $data_form['inputEvidencia'],
                    'responsable' => $data_form['inputResponsable'],
                    'estado' => $data_form['inputEstado'] == 1 ? 'completo' : ($data_form['inputEstado'] == 2 ? 'pendiente' : 'urgente'),
                    'id_usuario' => $_SESSION['user_id'],
                    'fecha_registro' => date('Y-m-d H:i:s')
                ];

                if ($this->evento_model->register($data_event)) {
                    flash('Evento Aagregado existosamente', 'success');
                    redirect('dashboard');
                } else {
                    flash('Ocurrió un problema en el sistema, contactese con el administrador.', 'error');
                    redirect('dashboard/nuevo_evento');
                }
                
            } else {
                redirect('dashboard/nuevo_evento');
            }

        } else {
            flash('Ocurrió un problema en el sistema, contactese con el administrador.', 'error');
            redirect('dashboard/nuevo_evento');
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Función Editar Evento
    |--------------------------------------------------------------------------
    | 
    | 
    */
    public function editar_evento($id_evento)
    {
        $data = [
            'title' => 'Editar Actividad Registrada',
            'id_evento' => $id_evento,
            'evento' => $this->evento_model->getEventoById($id_evento)
        ];
        
        $this->view('eventos/editar_evento', $data);
    }

    /*
    |--------------------------------------------------------------------------
    | Función Editar Evento
    |--------------------------------------------------------------------------
    | 
    | 
    */
    public function guardar_cambios($id_evento)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $data_form = $this->_validateForm();

            $inputsData = array_map('htmlspecialchars', $_POST);
            
            if (isset($data_form['validation']) || $data_form['validation'] != false) {
                $data_event = [
                    'tipo' => !isset($inputsData['opcion']) ? $inputsData['inputTipo'] : ($inputsData['opcion'] == 'opcion1' ? 'unico' : ($inputsData['opcion'] == 'opcion2' ? 'rango' : 'varios')),
                    'valor' => $inputsData['inputFecha'] == null ? null : $inputsData['inputFecha'],
                    'inicio' => $inputsData['inputRangoFechaInicio'] == null ? null : $inputsData['inputRangoFechaInicio'],
                    'fin' => $inputsData['inputRangoFechaFin'] == null ? null : $inputsData['inputRangoFechaFin'],
                    'valores' => $inputsData['inputMultiplesFechas'] == null ? null : $inputsData['inputMultiplesFechas'],
                    'actividad' => $inputsData['inputActividad'],
                    'porcentaje' => $inputsData['inputPorcentaje'],
                    'evidencia' => $inputsData['inputEvidencia'],
                    'responsable' => $inputsData['inputResponsable'],
                    'estado' => $inputsData['inputEstado'] == 1 ? 'completo' : ($inputsData['inputEstado'] == 2 ? 'pendiente' : 'urgente'),
                    'id_usuario' => $_SESSION['user_id']
                ];
                // show($data_event);

                if ($this->evento_model->update($data_event, $id_evento)) {
                    flash('Edición guardada existosamente', 'success');
                    redirect('dashboard');
                } else {
                    flash('Ocurrió un problema en el sistema, contactese con el administrador.', 'error');
                    redirect('dashboard/editar_evento/' . $id_evento);
                }
                
            } else {
                redirect('dashboard/editar_evento/' . $id_evento);
            }

        } else {
            flash('Ocurrió un problema en el sistema, contactese con el administrador.', 'error');
            redirect('dashboard/editar_evento/' . $id_evento);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Private Function _validateForm()
    |--------------------------------------------------------------------------
    | 
    | 
    */
    private function _validateForm()
    {
        $_POST = array_map('htmlspecialchars', $_POST);    
        
        $data = [];    

        $fields_to_check = [
            'inputActividad', 
            'inputPorcentaje', 
            'inputEvidencia', 
            'inputResponsable', 
            'inputEstado'
        ];
    
        foreach ($fields_to_check as $field) {
            $trimmed_value = trim($_POST[$field]);    
            if (empty($trimmed_value)) {
                $data[$field . '_err'] = 'Este campo es obligatorio';
                $data['validation'] = true;
            } else {
                $data[$field] = $trimmed_value;
                $data['validation'] = true;
            }
        }
    
        return $data;
    }
    
}