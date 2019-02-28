<?php
//require_once ('model/noticiaDAO.php');
require_once ('model/BO/noticiasBO.php');

require_once ('cart.php');


class NewsController{
    
    private $model;
    public function __CONSTRUCT(){
        $this->model = new BusinessObject();
//        $this->cart = new Cart();
        
    }
    
    // Te lleva a la pagina de las noticias del usuario logueado
	public function Index(){

        if(!empty($_SESSION["user"])){
            require_once 'view/common/header.php';
            require_once 'view/common/navbar.php';
            
            if($_SESSION["username"]=="editor"){
                require_once 'view/misnoticias.php';
            }
            else{
                require_once 'view/misnoticias.php';
            }
            require_once 'view/common/footer.php';
        }
        else{
            header('Location:?c=Common&a=Index');
        }
    }

    // Te lleva la vista del editor de texto de para generar la noticia
	public function FormNoticia(){
        require_once 'view/common/header.php';
        require_once 'view/common/navbar.php';
        require_once 'view/formNoticia.php';
        require_once 'view/common/footer.php';
    }

    // Elimina una noticia ya creada en la base de datos
    public function Eliminar(){
        $this->model->eliminarId();
        header('Location:?c=News&a=Index');
    }

    // Te lleva la vista del editor de texto de para generar la noticia
    public function Crud(){
        $prod = new NoticiasDAO();
        $keys = "";
        if(isset($_REQUEST['id_noticia'])){
            $prod = $this->model->obtenerId();
            $keys = $this->keywordsNoticia();
        }
        require_once 'view/common/header.php';
        require_once 'view/common/navbar.php';
        require_once 'view/formNoticia.php';
        require_once 'view/common/footer.php';
    }

    // Carga las keywords de la noticia selecionada en el editor de noticias
    public function keywordsNoticia(){
        $keys = "";
        if(isset($_REQUEST['id_noticia'])){
            foreach($this->model->mostrarKeywords() as $fila):
                foreach($this->model->seleccionarKeywordsNoticias() as $fila2):
                    if ($fila["id_keywords"]== $fila2["id_keyword"]) {
                        $keys = $keys . $fila["keyword"] . " , ";
                    }
                endforeach;
            endforeach;
        }
    //    print(json_encode($keys));
        return $keys;
    }

    // Te lleva a la vista de la noticia a la que se le ha hecho click
    public function PaginaNoticia2(){
        if(isset($_REQUEST['id_noticia'])){
            $prod = $this->model->obtenerId();
        }
        require_once 'view/common/header.php';
        require_once 'view/common/navbar.php';
        require_once 'view/post.php';
        require_once 'view/common/footer.php';
    }

    // Te devuelve los datos de una noticia solicitada y los convierte en Json para tratarlos en Javascript para que se vea a atraves de un modal
    public function PaginaNoticia(){
        if(isset($_REQUEST['id_noticia'])){
            $noticia = $this->model->obtenerId();
        }
        print(json_encode($noticia));

    }


 

    // Cuando se añade o se actualiza una noticia desde el controlador te lleva al Business Object que realizara la operacion 
    public function Guardar(){
        if($this->model->guardarNoticia()){
            header('Location:?c=News&a=Index');
        }
    }

    // Añade los productos al carrito
  

    // actualiza el carrito cuadno se cambia la cantidad o se elimina del carrito
   
    public function actualizarProductoCarrito(){

        session_start();
        if($_REQUEST['update']=="update" ){ echo "actualizando"; }
        else{  $_REQUEST['qty']= 0;  }

        echo $_REQUEST['name'] . "<br>";

        foreach ($_SESSION['carrito'] as $key => $value) {
         if (in_array($_REQUEST['name'], $value)) {
            
            echo $key;

            // si la cantidad es 0 lo elimina del carrito
            if($_REQUEST['qty']== 0){
               unset($_SESSION['carrito'][$key]);
            }
            else {
                // si la cantidad a poner es superior al Stock, no se añadira al carriyo
                if($_REQUEST['stock'] >= $_REQUEST["qty"]){ 
                    $_SESSION['carrito'][$key][2] = $_REQUEST["qty"];
                }                    
            }
               break;
           }
        }

      header('Location:?c=Tienda&a=Index');
    }

    public function borrarCarrito(){
        session_start();
        foreach ($_SESSION['carrito'] as $key => $value) {   
                unset($_SESSION['carrito'][$key]);
        }
     //   print_r($_SESSION['carrito']);
        header('Location:?c=Tienda&a=Index');
    }

    /*  Borra una iamgen de la galeria de imagenes del usuario y del directorio del mismo, 
        ademas de borrar la imagen de las noticias donde aparecia y la sustituye por una estandar
    */
    public function borrarImagen(){

        // recoge el nombre de la imagen y la transforma para poder comprobar que esa imagen existe
        $url = str_replace('http://localhost/blog/', '', $_REQUEST["url"]);
       
        // compueba que la imagen no sea la misma que la por defecto, si es distinta la borrara 
        if('view/image/noticias/noimage.png' != $url){
            unlink($url);
            echo "no es igual";

            // Elimina la imagen de la noticia 
            $this->model->eliminarFotoGaleria($_REQUEST["id_noticia"], 'http://localhost/blog/view/image/noticias/noimage.png' );
        }
        else{
            echo " es igual ";
        }

        echo $url;



// 45, 

    }


}