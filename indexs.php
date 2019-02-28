<?php 
/*
$url = explode("/",$_GET["url"]);
$controller = (empty($url[0])? "Default" : $url[1]);
$function = (empty($url[1])? "Default" : $url[1]);
$parametro = (empty($url[2])? null : $url[2]);
print_r($controller . "-". $function . "-" . $parametro);
*/
	// cuando entramos la primera comprobamos si hemos iniciado sesion o no

	if(empty($_SESSION["user"])){
		//Sino hemos iniciado sesion no llevara a un apartado a donde podemos seleccionar la accion deseada, login o register	
		$controller = 'common';

		// Todo esta lógica hara el papel de un FrontController

		if(!isset($_REQUEST['c'])) {
			require_once "controller/$controller.controller.php";
			$controller = ucwords($controller) . 'Controller';
			$controller = new $controller;
			$controller->Index(); 
		}

		else {

			// Obtenemos el controlador que queremos cargar

			$controller = strtolower($_REQUEST['c']);
			$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

			// Instanciamos el controlador

			require_once "controller/$controller.controller.php";
			$controller = ucwords($controller) . 'Controller';
			$controller = new $controller;

			// Llama la accion

			call_user_func( array( $controller, $accion ) );

		}

	}

	else{
							
		?>
		<form action="controller/loginRegisterController.php" method="POST" class="block-logout" >
			<input type="submit" value="LOGOUT" class="enviar" name="logout" /> 
		</form>
		<?php
		
	}


?>
