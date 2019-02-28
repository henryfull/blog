<?php
class Database {
	
	public static function connectdb(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "blog";

		try {
			$pdo = new PDO("mysql:host=$servername; dbname=blog" , $username, $password);
			// set the PDO error mode to exception
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//		echo "La conexion se ha realizado correctamente"; 
			
		}
		catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
		return $pdo;
	}
			
		 
	public function connectdbs(){
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "tiendasocial";
			
			$con = mysqli_connect($servername, $username, $password);
				
			if(mysqli_connect_errno()){
				echo "no se ha podido conectar con el servivor";
				exit();
			}
		
			mysqli_select_db($con, $dbname) or die ("no se encuentra la base de datos");
			mysqli_set_charset($con, "Utf-8");
		
			return  $con;
		
		
		}



		
	
}





?>

