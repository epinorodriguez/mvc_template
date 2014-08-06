<?php

/**
 * Esta es la clase controlador base de la que todos los controladores extienden.
 */
class Controller
{
    // arrays con los archivos para cargar por las vistas
    public $css_globales = array('global.css', 'bootstrap.min.css', 'bootstrap-theme.min.css', 
        'bootstrapValidator.css', 'select2.css', 'select2-bootstrap.css');
    
    public $js_globales = array('jquery.js', 'bootstrap.min.js', 'moment.min.js',  
        'bootstrap-datetimepicker.min.js', 'bootstrapValidator.min.js',
        'jquery.bootstrap-growl.min.js');

    public $titulo_vista = 'Inicio';

    // var conexion con la db
    public $db = null;

    protected $ajax;

    /**
     * siempre que se instancia de crea una conexion con la db
     */
    function __construct()
    {
        $this->openDatabaseConnection();


        $this->ajax = $this->isXmlHttpRequest();


    }

    /**
     * establece una conexion con las credenciales en application/config/config.php
     */
    private function openDatabaseConnection()
    {   
        // mas info aqui: http://code.tutsplus.com/tutorials/why-you-should-be-using-phps-pdo-for-database-access--net-12059

        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
        try{
            $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options);
        }catch(PDOException $e){
            echo $e->getMessage();
            die("Error al conectar con la base de datos");            
        }
    }

    /**
     * carga un modelo
     * @param string $model_name el nombre del modelo
     * @return object modelo
     */
    protected function loadModel($model_name)
    {
        require 'application/models/' . strtolower($model_name) . '.model.php';
        return new $model_name($this->db);
    }

    protected function loadView($view_name, $data = [])
    {
        require 'application/views/' . $view_name . '.view.php';         
    }



    /**
     * verifica si la peticion es por ajax
     * @return boolean returna true si es ajax
     */
    function isXmlHttpRequest()
    {
        $header = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? $_SERVER['HTTP_X_REQUESTED_WITH'] : null;
        return ($header === 'XMLHttpRequest');
    }
}
