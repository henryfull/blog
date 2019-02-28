<?php
require("conexion.php");

	class Productos {
		private $pdo;
		private $idProduct; 		// id del producto
		private $name;				// nombre del producto
		private $description;		// descripcion del producto
		private $image;				// imagen del producto
		private $quantity;			// cantidad del producto para añadir al carrito
		private $stock;				// stock del producto
		private $price;				// precio del producto
		private $category;			// categoria a la que pertenece el producto
		private $dateUpdate;		// fecha de ultima actualizacion del producto
		private $dateAdded;			// fecha en la que se añadio el producto en la base de dastos
		
		// constructor para conectar con la base de datos a traves de objetos, en este caso con PDO
		public function __CONSTRUCT()
		{
			try
			{
				$this->pdo = Database::connectdb();     
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}
		
	//	public function __construct(){}
		
		// SETTERS Y GETTERS  DE TODOS LOS ATRIBUTOS CREADOS ARRIBA

		public function setidProduct($idProduct){			
			$this->idProduct = $idProduct;			
		}
		public function getidProduct(){		
			return $this-> idProduct;	
		}

		public function setName($name){			
			$this->name = $name;			
		}
		public function getName(){		
			return $this-> name;	
		}
		
		
		public function setDescription($description){			
			$this->description = $description;			
		}
		public function getDescription(){		
			return $this-> description;	
		}
		
		public function setImage($image){			
			$this->image = $image;			
		}
		
		public function getImage(){		
			return $this-> image;	
		}
		
		public function setQuantity($quantity){			
			$this->quantity = $quantity;			
		}
		
		public function getQuantity(){		
			return $this-> quantity;	
		}
		
		public function setStock($stock){			
			$this->stock = $stock;			
		}
		public function getStock(){		
			return $this-> stock;	
		}
		public function setPrice($price){			
			$this->price = $price;			
		}
		public function getPrice(){		
			return $this-> price;	
		}

		public function setCategory($category){			
			$this->category = $category;			
		}
		public function getCategory(){		
			return $this-> category;	
		}	
		public function setDateUpdate($dateUpdate){			
			$this->dateUpdate = $dateUpdate;			
		}
		public function getDateUpdate(){		
			return $this-> dateUpdate;	
		}	
		public function setDateAdded($dateAdded){			
			$this->dateAdded = $dateAdded;			
		}
		public function getDateAdded(){		
			return $this-> dateAdded;	
		}	
		
		// FIN DE SETTERS Y GETTERS
		
		// inserta en la base de datos un producto pasado como parametro el objeto del mismo
		public function insertProduct($product){
			$name = $product->getName();
			$description = $product->getDescription();
			$image = $product->getImage();
			$stock = $product->getStock();
			$category = $product->getCategory();
			$price = $product->getPrice();
			$dateNow = 'CURRENT_DATE';
			
			if($name != null){

				try {
					echo $product->name . "<br>". $product->description  . "<br>" . $product->stock . "<br>" . $product->category . "<br>" . $dateNow  . "<br>";
					$sql = "INSERT INTO products (name,description,image,stock,price,date_add,category) 
					VALUES (?, ?, ?,?,?, CURRENT_DATE, ?)";
					$this->pdo->prepare($sql)
					->execute(
						array(
							$product->name,
							$product->description, 
							$product->image,
							$product->stock, 
							$product->price, 
							$product->category
						)
					);

				}
				catch(PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
				}
				$connex = null;	
				header("Location:?c=Tienda&a=Index");
			}
			else{
				echo "No se ha registrado el producto";		
				echo $name . "<br>". $description  . "<br>" . $stock . "<br>" . $category . "<br>" . $dateNow  . "<br>";
				header("Location:?c=Common&a=Index");
	
			}
			
		}

		// datos de prueba y conexion sin orientacion a objetos
		public function datosviejos(){
			echo $name . "<br>". $description  . "<br>" . $stock . "<br>" . $category . "<br>" . $dateNow  . "<br>";
	//		$query = "INSERT INTO products (name,description,stock,date_add,category) VALUES ('yogurt', 'el yogurt me gusta mucho', 20, CURRENT_DATE, 'carne')";
			$query = "INSERT INTO products (name,description,stock,date_add,category) VALUES ('$name', '$description', $stock, CURRENT_DATE, '$category')";
			
			$result = mysqli_query($connex, $query);
			mysqli_close($connex);	
		}

		// Recoge todos los productos de la base de datos y los pasa a un objeto para que el controlador los maneje
		public function Mostrar() {
			try {
				$result = array();
				$stm = $this->pdo->prepare("SELECT * FROM products ORDER BY id DESC");
				$stm->execute();	
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}
	
		// devuelve como objeto un producto de la base de datos pasando por parametro la id del mismo
		public function Obtener($id) {
			try {
				$stm = $this->pdo
						  ->prepare("SELECT * FROM products WHERE id = ?");
				$stm->execute(array($id));
				return $stm->fetch(PDO::FETCH_OBJ);
			} 
			catch (Exception $e) {
				die($e->getMessage());
			}
		}		

		// Eliminar de la base de datos un producto pasando por parametro la id del producto
		public function Eliminar($id){
			try {
				$stm = $this->pdo
							->prepare("DELETE FROM products WHERE id = ?");			          
	
				$stm->execute(array($id));
			} 
			catch (Exception $e) {
				die($e->getMessage());
			}
		}
	
		// actualiza en la base de datos un producto en concreto
		public function actualizar($product) {
			try {
				echo "ID: " . $product->price . "<br>" ;

				$sql = "UPDATE products SET 
							name = ?, 
							description = ?,
							image = ?,
							stock = ?,
							price = ?, 
							category = ?

						WHERE id = ?";
	
				if($this->pdo->prepare($sql)
					->execute(
						array(
							$product->name, 
							$product->description,
							$product->image,
							$product->stock,
							$product->price,
							$product->category,
							$product->idProduct
						)
					)){
						echo "ha salido todo oen" . $product->idProduct ;
					}
			} 
			catch (Exception $e) {
				die($e->getMessage());
			}
			}

		

		
		
	}


?>