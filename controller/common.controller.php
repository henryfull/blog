<?php
require_once ('model/BO/noticiasBO.php');


class CommonController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new BusinessObject();
    }
	
	// te lleva a la pagina de login
    public function Index(){
        require_once 'view/common/header.php';
        require_once 'view/common/navbar.php';
        require_once 'view/home.php';
        require_once 'view/common/footer.php';
	}

	// Destruye la variable de sesión y te lleva a la pagina de inicio
	public function CerrarSesion(){
		session_destroy();
        header("Location:?c=common&a=Index");
		
    }
    
 


	

	
	
	
    
}