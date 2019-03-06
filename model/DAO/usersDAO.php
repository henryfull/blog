<?php
require_once("model/conexion.php");
require_once("model/TO/usersTO.php");
require_once("model/dataSource.php");


class UsersDAO {
	public function __CONSTRUCT()
    {
        $this->data_source = new DataSource();
        //    $this->cart = new Cart();
    }


	public function comprobarExisteUsuari() {
		
		$data_table = $this->data_source->ejecutarConsulta("SELECT username FROM usuarios");
		return $data_table ;
	}

	public function comprobarLogin(){
		
		$data_table = $this->data_source->ejecutarConsulta("SELECT * FROM usuarios");
		return $data_table ;

	}


	public function existeisUsuari1($connex, $name, $password){
		$query = "select * from usuaris";
		$result = mysqli_query($connex, $query);
		if(!$result){ echo ''; }
		
	}
		
	public function insertUser($user){
		
		$sql = "INSERT INTO usuarios (username,  password, nombre,  id_tipousuario)  
							VALUES (:username , :password , :nombre , :id_tipousuario)";


		$resultado = $this->data_source->ejecutarActualizacion($sql,array(

			':username' => $user->getUsername(),
			':password' => $user->getPassUser(),
			':nombre' => $user->getFirstName(),
			':id_tipousuario' => $user->getGender()

			)
		);
		return $resultado;

	}

}
		
?>