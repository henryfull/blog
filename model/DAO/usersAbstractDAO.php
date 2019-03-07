<?php
require_once("model/conexion.php");
require_once("model/TO/usersTO.php");
require_once("model/dataSource.php");


abstract class UsersDAO implements interfaceUserDAO {
    public function __construct()
    {
        $this->data_source = new DataSource();
        //    $this->cart = new Cart();
    }

	public function comprobarExisteUsuari() {
	}

	public function comprobarLogin(){

	}


	public function existeisUsuari1($connex, $name, $password){
		
	}
		
	public function insertUser($user){

	}

}

interface interfaceUserDAO {
    public function __construct();
    public function insertUser($user);
    public function comprobarLogin();
}
		
?>