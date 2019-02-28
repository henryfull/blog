<?php
require_once("model/conexion.php");
require_once("model/TO/noticiasTO.php");
require_once("model/dataSource.php");

class NoticiasDao {

	// ###############################
	// METODOS PARA INSERTAR DATOS EN LA BASE DE DATOS	

	// inserta en la base de datos un producto pasado como parametro el objeto del mismo
	
	public function insertNoticia($noticia){
		$data_source = new DataSource();

		$sql = "INSERT INTO noticias (autor,id_seccion,titulo, subtitulo, texto, imagen, fecha_creacion) 
							VALUES ( :autor, :idSeccion, :titulo, :subtitulo , :texto , :imagen , CURRENT_DATE)";
		
		$resultado = $data_source->ejecutarActualizacion($sql,array(

			':autor' => $noticia->getAutor(),
			':titulo' => $noticia->getTitulo(),
			':subtitulo' => $noticia->getSubtitulo(),
			':imagen' => $noticia->getImage(),
			':texto' => $noticia->getTexto(),
			':idSeccion' => $noticia->getIdSeccion()
			
			)
		);
		return $resultado;

	}


	// Inserta una keyword en la base de datos
	public function returninsertKeywordsNoticia($keyword){
		
		$sql = "INSERT INTO keywords (keyword) VALUES ( :keyword)";
		$array = array( ':keyword' => $keyword );
		$dataArray = array( 'sql' => $sql , 'array' => $array);
		return $dataArray;

	}

	// Inserta una keyword en la base de datos
	public function insertKeywordsNoticia($keyword){
		$data_source = new DataSource();

		$sql = "INSERT INTO keywords (keyword) VALUES ( :keyword)";
		
		$resultado = $data_source->ejecutarActualizacion($sql,array(
			':keyword' => $keyword
			)
		);
		return $resultado;

	}

	// Inserta en la base de datos la id de la noticia y su keywords correespondientes
	public function insertKeywordsNews($idkeyword, $id_noticia){


		$data_source = new DataSource();
		$sql = "INSERT INTO keywordsNews (id_keyword, id_noticia) VALUES ( :idkeyword, :id_noticia)";
		
		$resultado = $data_source->ejecutarActualizacion($sql,array(
			':idkeyword' => $idkeyword , 
			':id_noticia' => $id_noticia
			)
		);
		return $resultado;

	}

	public function transaction($arrayQuerys){
		$data_source = new DataSource();
		$data_table = $data_source->transactionUpdate($arrayQuerys);
		return $data_table ;

	}

	// ###############################
	// METODOS PARA CARGAR INFORMACION HACIENDO SELECTS EN LA BASE DE DATOS

	// MUestra todas las imagenes que un usuario ha subido
	public function cargarKeywordsNoticia($idnoticia){
		$data_source = new DataSource();
		$data_table = $data_source->ejecutarConsulta("SELECT * FROM keywordsNews where id_noticia = '$idnoticia'");
		return $data_table ;

	}

	// Recoge todos los productos de la base de datos y los pasa a un objeto para que el controlador los maneje
	public function Mostrar() {
		$data_source = new DataSource();
		$data_table = $data_source->ejecutarConsulta("SELECT * FROM noticias order by 1 desc");
		
		return $data_table ;
	}


	// Muestra por pantalla solo aquella noticias que ya estan pubnlicadas
	public function MostrarNoticias() {
		$data_source = new DataSource();
		$data_table = $data_source->ejecutarConsulta("SELECT * FROM noticias WHERE fecha_publicacion != '0000-00-00'  order by 1 desc");
		
		return $data_table ;
	}

	// Recoge todas las keywords que hay en la base de datos
	public function CargarKeywords(){
		$data_source = new DataSource();
		$data_table = $data_source->ejecutarConsulta("SELECT * FROM keywords");
		return $data_table ;

	}

		// Recoge todas las keywords que hay en la base de datos
		public function CargarKeywordsSoloKeywords($idnoticia){
			$data_source = new DataSource();
			$data_table = $data_source->ejecutarConsulta("SELECT keyword from keywords where id_keywords in ( SELECT id_keyword from keywordsNews where id_noticia = $idnoticia GROUP by id_noticia)");
			return $data_table ;
	
		}

	// MUestra todas las imagenes que un usuario ha subido
	public function CargarGaleriaImagenesAutor($autor){
		$data_source = new DataSource();
		$data_table = $data_source->ejecutarConsulta("SELECT DISTINCT(imagen), id_noticia FROM noticias where autor = '$autor' GROUP BY imagen order by 1 desc ");
		return $data_table ;

	}


	// Recoge todos los productos de la base de datos y los pasa a un objeto para que el controlador los maneje
	public function MostrarMisNoticias($autor) {
		
		$data_source = new DataSource();
		$data_table = $data_source->ejecutarConsulta("SELECT * FROM noticias WHERE autor = '$autor' order by 1 desc ");
		if($data_table){
			return $data_table;
		}

	}

	// devuelve como objeto un producto de la base de datos pasando por parametro la id del mismo
	public function Obtener($id) {
		$data_source = new DataSource();
		$data_table = $data_source->ejecutarConsulta("SELECT * FROM noticias WHERE id_noticia = '$id' ");
		if($data_table){
			return $data_table;
		}

	}	

	public function maxIdNoticia(){
		$data_source = new DataSource();
		$data_table = $data_source->ejecutarConsulta("SELECT MAX(id_noticia) as maxid FROM noticias ");
		return $data_table ;


	}
	
	// Muestra la lista de secciones en las que se pueden publicar noticias
	public function listaSecciones() {
		$data_source = new DataSource();
		$data_table = $data_source->ejecutarConsulta("SELECT * FROM seccion");
		return $data_table ;
	}


	// ###############################
	// BORRAR DATOS EN LA BASE DE DATOS


	// Eliminar de la base de datos un producto pasando por parametro la id del producto
	public function Eliminar($id_noticia){

		$data_source = new DataSource();
		$resultado = $data_source->ejecutarActualizacion("DELETE FROM noticias WHERE id_noticia = :idnoticia",
			array(':idnoticia'=>$id_noticia));
		return $resultado;	
	}



	// ###############################
	// ACTUALIZA LOS  DATOS EN LA BASE DE DATOS 


	// Actualizar noticia
	public function actualizar($noticia){
		$data_source = new DataSource();

		$sql = "UPDATE noticias SET 
				editor = :editor,
				id_seccion = :id_seccion,
				titulo = :titulo,
				subtitulo = :subtitulo,
				texto = :texto,
				imagen = :imagen,
				fecha_modificacion = CURRENT_DATE ,
				fecha_publicacion = :fecha_publicacion
				WHERE id_noticia = :id_noticia
				";


		$resultado = $data_source->ejecutarActualizacion($sql,array(

			':id_noticia'=> $noticia->getidNoticia(),
			':editor' => $noticia->getEditor(),
			':titulo' => $noticia->getTitulo(),
			':subtitulo' => $noticia->getSubtitulo(),
			':imagen' => $noticia->getImage(),
			':texto' => $noticia->getTexto(),
			':fecha_publicacion'  => $noticia->getFechaPublicacion(),
		//	':keywords' => $noticia->getKeywords(),
			':id_seccion' => $noticia->getIdSeccion()
			)
		);
		return $resultado;
	}

	// Actualiza foto de la noticia
	public function actualizarFotoNoticia($noticia){
		$data_source = new DataSource();

		$sql = "UPDATE noticias SET 
				imagen = :imagen
				WHERE id_noticia = :id_noticia
				";

		$resultado = $data_source->ejecutarActualizacion($sql,array(

			':id_noticia'=> $noticia->getidNoticia(),
			':imagen' => $noticia->getImage()

			)
		);
		return $resultado;
	}
	
	public function transactionUpdate($newKeywords, $arrayKeywords, $idnoticia, $noticia){
		$data_source = new DataSource();

		try {  
		  
			$data_source->beginTransaction();

			// Inserta las nuevas palabras claves en la tabla de keywords
			foreach ($newKeywords as $value) {
				$this->insertKeywordsNoticia($value);
			}
/*
			echo "<br> linea 249 : Nuevas Palabras clave  <br>";
			print_r($arrayKeywords);
			echo "<br> linea 251 <br>";
			echo "id " . $idnoticia . '<br>';

*/
			// Actualiza o inserta una noticia 
			if ($idnoticia > 0) {
				$this->actualizar($noticia);
				foreach ($newKeywords as  $value) {
					foreach ($this->CargarKeywords() as $key){
						if ($key['keyword'] == $value) {
							$this->insertKeywordsNews($key['id_keywords'], $idnoticia);
						}
					}
				}
			} 
			else {
				$this->insertNoticia($noticia);
				$maxid = implode($this->maxIdNoticia()[0]);

				foreach ($arrayKeywords as  $value) {
					foreach ($this->CargarKeywords() as $key){
						if ($key['keyword'] == $value) {
							$this->insertKeywordsNews($key['id_keywords'], $maxid + 1);
						}
					}
				}

			}

			$data_source->commit();
			
		  } 
		catch (Exception $e) {
			$data_source->rollBack();
			echo "Fallo: " . $e->getMessage();
		  }

	}
	

	


	}
?>