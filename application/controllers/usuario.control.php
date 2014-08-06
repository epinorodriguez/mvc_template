<?php
/**
 * Class Inicio
 */
class Usuario extends Controller
{

    public $titulo_vista;
    public $js_array;
    public $css_array;

    public function __construct()
    {
        parent::__construct();

        $this->titulo_vista = 'Inicio';
        $this->css_array = $this->css_globales;
        $this->js_array = $this->js_globales;        

        $this->js_array = array_merge($this->js_array, array('usuario.js'));
    }

    public function iniciar()
    {
        if($this->ajax){

            $this->loadLib('validador');

            $validador = new Validador();

            $reglas = array(
                        'rut' => 'rut|requerido',
                        'password' => 'numero|requerido',
                        'token' => 'token|requerido'
                        );

            if ($validador->validar($_POST, $reglas)) {
                $usuario = $_POST['rut'];
                $password = $_POST['password'];

                $usuario = json_encode(array(
                    "usuario" => $usuario,
                    "password" => $password
                ));

                echo $usuario;
            }else{
                echo 'false';
            }

            
        }else{
            //redirecciona la vista por defecto
            $this->index();
        }
        
    }

    /**
     * This method handles what happens when you move to http://yourproject/home/index
     */
    public function index()
    {


        $this->loadView('_templates/header_vacio');
        $this->loadView('usuario/sesion');
        $this->loadView('_templates/footer');
    }


}