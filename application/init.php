<?php

	// se define la ruta donde estan los recursos publicos, como css, js, etc.
	define('ASSET_ROOT', 
		'http://' . $_SERVER['HTTP_HOST'] . 
		str_replace($_SERVER['DOCUMENT_ROOT'], 
			'', str_replace('\\', '/', dirname(__DIR__) . '/public/')
		)
	);
	
	// se cargan las configuraciones basicas
	require 'config/config.php';

	// se carga la aplicacion
	require 'core/application.php';
	require 'core/controller.php';

?>