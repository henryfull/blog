<?php
require_once('model/BO/usersBO.php');

class LoginregisterController
{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new BusinessObject();
    }

    public function Index()
    {
        require_once 'view/common/header.php';
        require_once 'view/account/register.php';
        require_once 'view/common/footer.php';
    }

    public function Login()
    {
        require_once 'view/common/header.php';
        require_once 'view/account/login.php';
        require_once 'view/common/footer.php';
    }


    // recoge todos los datos del formulario de registro  de la noticiay los introduce en un objetos de tipo usuario donde despues lo envia al modelo que lo inserta en la base de datos
    public function getRegisterUser()
    {

        if ($this->model->register()) {

            // si el registro se ha creado con exito, se crea un directorio con el nombre de usuario para poder guardar las imagenes de las noticias
            $this->createDir($_POST["username"]);
            header("Location:?c=common&a=Index");
        } else {
            header("Location:?c=common&a=Index");
        }
    }

    public function checkUser()
    {
        if ($this->model->checkUsers($_REQUEST["user"], $_REQUEST["pass"])) {
            header("Location:?/News/Index");
        } else {
            unset($_SESSION["user"]);
            header("Location:?/common/Index");
        }
    }


    function createDir($numIdUser)
    {
        $nombre_directorio = "$numIdUser";
        echo "nombre del directorio" . $nombre_directorio . "<br>";
        $ruta = "view/image/noticias/" . $nombre_directorio;
        $ruta2 = "view/image/noticias/" . $nombre_directorio . "/post";
        $ruta3 = "view/image/noticias/" . $nombre_directorio . "/avatar";
        $resultado = mkdir($ruta, 0777, true);
        $resultado = mkdir($ruta2, 0777, true);
        $resultado = mkdir($ruta3, 0777, true);

        if ($resultado) {
            echo "Se ha creado el directorio $nombre_directorio";
        } else {
            echo "Error creando directorio";
        }
    }
}
 