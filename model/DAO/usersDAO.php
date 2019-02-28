<?php
require_once("model/conexion.php");
require_once("model/TO/usersTO.php");
require_once("model/dataSource.php");


class UsersDAO {


	public function comprobarExisteUsuari() {
		$data_source = new DataSource();
		$data_table = $data_source->ejecutarConsulta("SELECT username FROM usuarios");
		return $data_table ;
	}

	public function comprobarLogin(){
		$data_source = new DataSource();
		$data_table = $data_source->ejecutarConsulta("SELECT * FROM usuarios");
		return $data_table ;

	}


	public function existeisUsuari1($connex, $name, $password){
		$query = "select * from usuaris";
		$result = mysqli_query($connex, $query);
		if(!$result){ echo ''; }
		
	}
	
	
		
	public function insertUser($user){
		$data_source = new DataSource();

		$sql = "INSERT INTO usuarios (username,  password, nombre,  id_tipousuario)  
							VALUES (:username , :password , :nombre , :id_tipousuario)";


		$resultado = $data_source->ejecutarActualizacion($sql,array(

			':username' => $user->getUsername(),
			':password' => $user->getPassUser(),
			':nombre' => $user->getFirstName(),
			':id_tipousuario' => $user->getGender()

			)
		);
		return $resultado;

	}




}
		


		function insertRegisterUser($user){

			$username = $user->getUsername();
			$pass = $user->getPassUser();
			$firstName = $user->getFirstName();
			$gender = $user->getGender();
	
			if($username != null){

			try {
				$sql = "INSERT INTO usuarios (username,  password, nombre,  id_tipousuario)  
					VALUES (? , ? , ? , ?)";
//					VALUES ('$username' , '$firstName' ,'$lastName', '$email', '$pass', '$place' , '$gender', $dateNow, '$edad')";
				
				$this->pdo->prepare($sql)
				->execute(
					array(
						$user->userName,
						$user->passUser, 
						$user->firstName, 
						$user->gender
					)
				);
			}
			catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}
				return true;
			 header("Location:login.php");
	
			}
			else{
				echo "No te has registrado";
				return false;
				
		//		echo $idUser + " id " + $username + " us " + $pass + " ps " + $firstName + " fn " + $lastName + " ln " + $edad + " e " + $email + " dt " + $dateNow;
				
				
			 header("Location:http://localhost/curso-php/ejdatabase/index.php");
	
			}
			
			
		}


		

		
		
	


?>