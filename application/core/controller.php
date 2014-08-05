<?php

/**
 * Esta es la clase controlador base de la que todos los controladores extienden.
 */
class Controller
{
    // arrays con los archivos para cargar por las vistas
    public $css_array = array('style.css');
    public $js_array = array('jquery.js');

    // var conexion con la db
    public $db = null;

    /**
     * siempre que se instancia de crea una conexion con la db
     */
    function __construct()
    {
        $this->openDatabaseConnection();
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
}
