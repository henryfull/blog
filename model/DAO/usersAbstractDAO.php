<?php

abstract class usersAbstractDAO {


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