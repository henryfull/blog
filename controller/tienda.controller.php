<?php
require_once ('model/products.php');
require_once ('cart.php');


class TiendaController{
    
    private $model;
    public function __CONSTRUCT(){
        $this->model = new Productos();
        $this->cart = new Cart();
    }
    
    
	public function Index(){
        session_start();
        if(!empty($_SESSION["user"])){
            require_once 'view/header.php';

            if($_SESSION["username"]=="admin"){
                require_once 'view/tienda.php';
            }
            else{
                require_once 'view/tienda2.php';
            }
            require_once 'view/footer.php';
        }
        else{
            header('Location:?c=Common&a=Index');
        }
    }

    // Formulario para la creacion de un producto
	public function FormProduct(){
        require_once 'view/header.php';
        require_once 'view/formProduct.php';
        require_once 'view/footer.php';
    }

    // elimina un producto de la tienda
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location:?c=Tienda&a=Index');
    }

    // te lleva a una seccion donde puedes modificar los valores de un producto
    public function Crud(){
        $prod = new Productos();
        if(isset($_REQUEST['id'])){
            $prod = $this->model->Obtener($_REQUEST['id']);
        }
        require_once 'view/header.php';
        require_once 'view/formProduct.php';
        require_once 'view/footer.php';
    }

    // te lleva a la vista descriptiva del producto
    public function PaginaProducto(){
        $prod = new Productos();
        if(isset($_REQUEST['id'])){
            $prod = $this->model->Obtener($_REQUEST['id']);
        }
        require_once 'view/header.php';
        require_once 'view/paginaproducto.php';
        require_once 'view/footer.php';
    }


 

    // Cuando se añade un producto a la tienda, este lo guarda en la base de datos y lo realizar desde aqui 
    public function Guardar(){
        $product = new Productos();
        $localserver = "http://localhost/curso-php";
        $media ="";
        $nextTime=strtotime("+0 minutes");		
        $_SESSION["hour"] = date("Y-m-d H:i", $nextTime);
        
        // directorio donde guarda las imagen del producto
        $dir_subida = '../tiendasocial/view/image/productos/' ;
        $fichero_subido = $dir_subida . basename($_FILES['fichero_usuario']['name']);

        // si el fichero no exite te lo pondra en su carpeta correspondiente
        if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)) {
            echo "El fichero es válido y se subió con éxito.\n";
            $media = $localserver .trim($fichero_subido,'.');
            
        } else {
            // si el producto no tenia imagen, te pondra una por defecto
            echo "¡Posible ataque de subida de ficheros!\n";
            $media ="http://localhost/curso-php/tiendasocial/view/image/productos/noimage.png";
        }
        
    //    echo $media;

        $id = ($_POST["id"]);
        $product->setidProduct($_POST["id"]);
        $product->setName($_POST["name"]);
        $product->setDescription($_POST["description"]);
        $product->setStock($_POST["stock"]); 
        $product->setPrice($_POST["price"]); 
        $product->setCategory($_POST["category"]); 
        $product->setImage($media);
        $id >0 
            ? $product->actualizar($product)
            : $product->insertProduct($product);
        
      header('Location:?c=Tienda&a=Index');

    }

    // Añade los productos al carrito
    public function Carrito(){
        session_start();
        $cierto = false;


         if($_POST['qty']!= 0){ $product_qty=$_POST['qty']; }
         // Si le hemos dado a añadir al carrito, sin especificar la cantidad, te añadira uno por defecto
         else{ $_POST['qty'] = 1; $product_qty=$_POST['qty'] = 1; }

         // se recorre la variable de session de carrito para realizar la suma del valor de todos para dar el total 
         foreach ($_SESSION['carrito'] as $key => $value) {
            if (in_array($_POST['id'], $value)) {
                if($_POST['stock'] >= $_SESSION['carrito'][$key][2]+$product_qty){ 
                    $_SESSION['carrito'][$key][2] += + $_POST["qty"];
                }
                $cierto = true;
                break;
            }
        }

        if(!$cierto){ 
            $_SESSION['lista_carrito']=array();
            $product_id=$_POST['id']; 
            $product_name=$_POST['name']; 
            $product_price=$_POST['price'];
            $product_stock=$_POST['stock'];

            // Añade el producto al carrito en una array
            array_push($_SESSION['lista_carrito'],$product_id, $product_name , $product_qty, $product_price, $product_stock ); 
            array_push($_SESSION['carrito'], $_SESSION['lista_carrito']);  
            echo "falso";

        }
      header('Location:?c=Tienda&a=Index');

    }

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

}