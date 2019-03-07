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
		

		public function __GET($k) { return $this->$k; }
		public function __SET($k,$v) { return $this->$k = $v; }


		// constructor para conectar con la base de datos a traves de objetos, en este caso con PDO
		
	//	public function __construct(){}
		
		// SETTERS Y GETTERS  DE TODOS LOS ATRIBUTOS CREADOS ARRIBA


		
		
	}


?>