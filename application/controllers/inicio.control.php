<?php

/**
 * Class Inicio
 */
class Inicio extends Controller
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
