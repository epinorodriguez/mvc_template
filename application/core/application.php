<?php

class Application
{
    private $controller = 'inicio';
    private $method = 'index';
    private $parameters  = [];

    /**
     * initializes the application, its controller and method is verified
     */
    public function __construct()
    {
        $url = $this->parseUrl();

        if (file_exists('application/controllers/' . $url[0] . '.control.php')) 
        {
            $this->controller = $url[0];
            unset($url[0]);            
        } 

        require_once 'application/controllers/' . $this->controller . '.control.php';
        $this->controller = new $this->controller;

        if(isset($url[1]))
        {
            if (method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->parameters = $url ? array_values($url) : []; 

        call_user_func_array([$this->controller, $this->method], $this->parameters);
    }

    /**
     * Get and split the URL
     */
    private function parseUrl()
    {
        if (isset($_GET['url'])) {

            // split URL
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}