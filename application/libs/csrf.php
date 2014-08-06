<?php

/**
* Clase para controlar la generacion de tokens, para evitar ataques CSRF
*/
class CSRF
{	
	public function get_token() 
	{
        if(isset($_SESSION['token'])) 
        { 
                return $_SESSION['token'];
        }
        else 
        {
                $token = hash("sha512", substr(str_shuffle(MD5(microtime())), 0, 10));
                $_SESSION['token'] = $token;
        }
	}
}