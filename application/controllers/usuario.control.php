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

        $this->js_array = array_merge($this->js_array, array('inicio.js'));
    }

    public function agregar()
    {
        if($this->ajax){

            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            $usuario = json_encode(array(
            "usuario" => $usuario,
            "password" => $password
            ));
            echo $usuario;
        }else{
            //redirecciona la vista por defecto
            $this->index();
        }
        
    }

    /**
     * This method handles what happens when you move to http://yourproject/home/index
     */
    public function index($usuario = '')
    {
        $users = $this->loadModel('User');
        $resultado= $users->latestUsers();


        $this->loadView('_templates/header');
        $this->loadView('inicio', ['usuarios' => $resultado]);
        $this->loadView('_templates/footer');
    }


}