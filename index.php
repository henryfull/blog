<?php 
/*
$url = explode("/",$_GET["url"]);
$controller = (empty($url[0])? "Default" : $url[1]);
$function = (empty($url[1])? "Default" : $url[1]);
$parametro = (empty($url[2])? null : $url[2]);
print_r($controller . "-". $function . "-" . $parametro);
*/
		// cuando entramos la primera comprobamos si hemos iniciado sesion o no
		$url = addslashes($_SERVER['QUERY_STRING']);
		$caracters = array("?", "&");
		$url = str_replace("?", '', $url);
		$url = explode("/", $url);
		$url = array_slice($url, 1);

		if(empty($_SESSION["user"])){
			//Sino hemos iniciado sesion no llevara a un apartado a donde podemos seleccionar la accion deseada, login o register	
			$controller = 'common';

			// Todo esta lógica hara el papel de un FrontController

			if(!isset($url[1])) {

				require_once "controller/$controller.controller.php";
				$controller = ucwords($controller) . 'Controller';
				$controller = new $controller;
				$controller->Index(); 

			}

			else {

				// Obtenemos el controlador que queremos cargar

				$controller = strtolower($url[0]);
				$accion = isset($url[1]) ? $url[1] : 'Index';

				// Instanciamos el controlador
				require_once "controller/$controller.controller.php";
				$controller = ucwords($controller) . 'Controller';
				$controller = new $controller;
				
				// Llama la accion
				if (count($url)>2) {
					$_REQUEST["id_noticia"] = $url[2];
				}

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
