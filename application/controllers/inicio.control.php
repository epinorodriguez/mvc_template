<?php

/**
 * Class Inicio
 */
class Inicio extends Controller
{
    /**
     * This method handles what happens when you move to http://yourproject/home/index
     */
    public function index($usuario = '')
    {
        $users = $this->loadModel('User');
        $resultado= $users->latestUsers();
        
        $header_parametros = array(
            "titulo" => 'Inicio',
            "css_array" => $this->css_array
            );


        $js_vista = array('inicio.js');

        $footer_parametros = array("js_array" => array_merge($this->js_array, $js_vista));

        $this->loadView('_templates/header', $header_parametros);
        $this->loadView('inicio', ['usuarios' => $resultado]);
        $this->loadView('_templates/footer', $footer_parametros);
    }

    /**
     * otro metodo
     */
    /*public function exampleTwo()
    {
        // debug message to show where you are, just for the demo
        echo 'Message from Controller: You are in the controller home, using the method exampleTwo()';
        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require '../application/views/_templates/header.php';
        require '../application/views/home/example_two.php';
        require '../application/views/_templates/footer.php';
    }*/
}
