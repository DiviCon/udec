<?php

class Auth extends Controller 
{
    private $user_model;

    /*
    |-------------------------------------------
    | Función Construct
    |-------------------------------------------
    | 
    | 
    */
    public function __construct()
    {
        $this->user_model = $this->model('Usuario');
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
            'title' => 'Entrar al sistema'
        ];
        
        $this->view('login', $data);
    }

    /*
    |--------------------------------------------------------------------------
    | Función Login
    |--------------------------------------------------------------------------
    | 
    | 
    */
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $dataForm = $this->_validateLoginForm();
            
            if (empty($dataForm['email_err']) && empty($dataForm['password_err'])) {
                $userData = $this->user_model->findUserByEmail($dataForm['email_usuario']);

                if ($userData) {
                    if (password_verify($dataForm['password_usuario'], $userData->password_usuario)) {
                        $this->_createUserSession($userData);                        
                        flash('success', 'Bienvenido!');
                        redirect('dashboard');
                    } else {
                        flash('danger', 'Email o Contraseña son invalidos.');
                        $dataForm['password_err'] = 'Contraseña incorrecta';
                    }
                } else {
                    flash('danger', 'Email o Contraseña son invalidos.');
                    $dataForm['email_err'] = 'Usuario no encontrado';
                }
                
            } else {
                flash('danger', 'Email o Contraseña son invalidos.');
            }

        } else {
            flash('danger', 'Ocurrió un problema en el sistema, contactese con el administrador.');
        }
        redirect('auth');
    }  

    /*
    |--------------------------------------------------------------------------
    | Function Logout
    |--------------------------------------------------------------------------
    | 
    | 
    */
    public function logout()
    {
        $this->_destroyUserSession();
        flash('success', 'Se ha cerrado la sesión con exito!!');
        redirect('auth');
    }

    public function registro()
    {
        $data = [
            'title' => 'Registro Nuevo Usuario'
        ];
        
        $this->view('registro', $data);
    }

    public function registrar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $dataForm = $this->_validateLoginForm();
            
            if (empty($dataForm['email_err']) && empty($dataForm['password_err']) && empty($dataForm['nombre_err']) && empty($dataForm['apellidos_err'])) {
                $dataForm = array_map('htmlspecialchars', $_POST);
                $userData = $this->user_model->saveUser($dataForm);

                if ($userData) {                       
                    flash('success', 'Su registro fue exitoso, inicie sesión por favor.!');
                    redirect('auth');
                } else {
                    flash('danger', 'Algo salió mal, revise e intente nuevamente');
                    redirect('auth/registro');

                }
                
            } else {
                flash('danger', 'Los campos no pueden estar vacíos.');
            }

        } else {
            flash('danger', 'Ocurrió un problema en el sistema, contactese con el administrador.');
        }
        redirect('auth/registro');
    }

    /*
    |--------------------------------------------------------------------------
    | Private Function _validateLoginForm()
    |--------------------------------------------------------------------------
    | 
    | 
    */
    private function _validateLoginForm()
    {
        $_POST = array_map('htmlspecialchars', $_POST);

        $data = [
            'email_usuario'     => trim($_POST['inputEmail']),
            'password_usuario'  => trim($_POST['inputPassword']),
            'nombre_usuario'  => trim($_POST['inputNombre']),
            'apellidos_usuario'  => trim($_POST['inputApellidos'])
        ];
        
        if (empty($data['email_usuario'])) {
            $data['email_err'] = 'Por favor ingrese su correo electrónico';
        }
        
        if (empty($data['password_usuario'])) {
            $data['password_err'] = 'Por favor ingrese su contraseña';
        }
        
        if (empty($data['nombre_usuario'])) {
            $data['nombre_err'] = 'Por favor ingrese su nombre';
        }
        
        if (empty($data['apellidos_usuario'])) {
            $data['apellidos_err'] = 'Por favor ingrese su apellido';
        }

        return $data;
    } 

    /*
    |--------------------------------------------------------------------------
    | Private Function _createUserSession()
    |--------------------------------------------------------------------------
    | 
    | 
    */
    private function _createUserSession($userData)
    {
        $_SESSION['user_id'] = $userData->id_usuario;
        $_SESSION['name'] = $userData->nombre_usuario . $userData->apellido_usuario;
        $_SESSION['email'] = $userData->email_usuario;
        $_SESSION['logged_in'] = true;
    }

    private function _destroyUserSession()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        unset($_SESSION['logged_in']);
    }
}