<?php
	class Noticias {
		private $pdo;
		private $idNoticia; 		// id de LA noticia
		private $autor;				// autor de la noticia
		private $editor;			// editor de la  noticia
		private $idSeccion; 		// id de la Seccion

		private $titulo;			// titulo de la noticia 
		private $subtitulo;			// subtitulo de la noticia
		private $texto;				// texto de la noticia
		private $keywords;			// palabras clave de las publicaciones

		private $image;				// imagen de la noticia
		
		private $stock;				// stock del producto
		private $price;				// precio del producto
		private $category;			// categoria a la que pertenece el producto
		private $fechaCreacion;		// fecha de la creacion de la noticia
		private $fechaModificacion;	// fecha de la modificacion de la noticia
		private $fechaPublicacion;	// fecha de la publicacion de la noticia
		
		// constructor para conectar con la base de datos a traves de objetos, en este caso con PDO
		
	//	public function __construct(){}
		
		// SETTERS Y GETTERS  DE TODOS LOS ATRIBUTOS CREADOS ARRIBA

		public function setidNoticia($idNoticia){			
			$this->idNoticia = $idNoticia;			
		}
		public function getidNoticia(){		
			return $this-> idNoticia;	
		}

		public function setAutor($autor){			
			$this->autor = $autor;			
		}
		public function getAutor(){		
			return $this-> autor;	
		}

		public function setEditor($editor){			
			$this->editor = $editor;			
		}
		public function getEditor(){		
			return $this-> editor;	
		}

		public function setIdSeccion($idSeccion){			
			$this->idSeccion = $idSeccion;			
		}
		public function getIdSeccion(){		
			return $this-> idSeccion;	
		}

		public function setTitulo($titulo){			
			$this->titulo = $titulo;			
		}
		public function getTitulo(){		
			return $this-> titulo;	
		}

		public function setSubtitulo($subtitulo){			
			$this->subtitulo = $subtitulo;			
		}
		public function getSubtitulo(){		
			return $this-> subtitulo;	
		}		
		
		
		public function setTexto($texto){			
			$this->texto = $texto;			
		}
		public function getTexto(){		
			return $this-> texto;	
		}

		public function setKeywords($keywords){			
			$this->keywords = $keywords;			
		}
		public function getKeywords(){		
			return $this-> keywords;	
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
		public function setFechaCreacion($fechaCreacion){			
			$this->fechaCreacion = $fechaCreacion;			
		}
		public function getFechaCreacion(){		
			return $this-> fechaCreacion;	
		}	
		public function setFechaModificacion($fechaModificacion){			
			$this->fechaModificacion = $fechaModificacion;			
		}
		public function getFechaModificacion(){		
			return $this-> fechaModificacion;	
		}	
		public function setFechaPublicacion($fechaPublicacion){			
			$this->fechaPublicacion = $fechaPublicacion;			
		}
		public function getFechaPublicacion(){		
			return $this-> fechaPublicacion;	
		}		
		
		// FIN DE SETTERS Y GETTERS
		

		

		
		
	}


?>