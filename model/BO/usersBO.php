<?php 
require_once("model/DAO/usersDAO.php");
session_start();

class BusinessObject{

    public function __CONSTRUCT(){
        $this->userDao = new UsersDao();
    //    $this->cart = new Cart();
    }

    // Se obtiene los parametros del formulario y los setea en un objeto
    public function register(){
        $user = new Usuarios;
		$user->setUsername(addslashes($_POST["username"]));
		$user->setPassUser( addslashes($_POST["password"]));
		$user->setFirstName(addslashes($_POST["firstname"]));
		$user->setGenero($_POST["gender"]);

        echo $_POST["username"];

        return $this->userDao->insertUser($user);
    }

    // Se comprueba que el usuario y la contraseña esten en la base de datos, si coincide se rellenan todoos los datos del objetos con los valores del usuarios
    public function checkUsers($user, $pass){		
        $usuario = new Usuarios();	

        foreach ($this->userDao->comprobarLogin() as $row) {
            if($user == strtolower($row["username"])){
                if($pass == $row["password"]){
                    $_SESSION["user"]= "guacamole";
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["numuser"]= $row["id_tipousuario"];
                    $_SESSION['textNews'] = "";
                //    $_SESSION['carrito'] = array();
                    $enter = true;
                    $this->setterUserDates($usuario, $row);
                    break;
                }
                else{
                    echo "la contraseña es incorrecta";
                }
            }
            else{
                $enter = false;
            }	
        }
        return $enter;

     }

    // Introduce todos los valores del usuario una vez se ha logueado correctamente
	public function setterUserDates($user, $row){
    
        $user->__SET('username',($row["username"]));
        $user->__SET('passUser',($row["password"]));
        $user->__SET('FirstName',($row["nombre"]));

/*        
        $user1->setIdUSer($row["iduser"]); 
        $user1->setUsername($row["username"]);
        $user1->setPassUser($row["password"]);
        $user1->setFirstName($row["firstname"]);
        $user1->setLastName($row["lastname"]);
        $user1->setEmail($row["email"]);
        $user1->setBirthday($row["datebirth"]);
        $user1->setLocation($row["place"]);
        $user1->setGenero($row["gender"]);

*/        
}


    
}



?>