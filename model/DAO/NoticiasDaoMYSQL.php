<?php

class NoticiasDaoMYSQL extends NoticiaAbstractDAO
{
 
	// ###############################
	// METODOS PARA INSERTAR DATOS EN LA BASE DE DATOS	

	// inserta en la base de datos la noticia pasado como parametro el objeto del mismo

	public function insertNoticia($noticia)
	{

		$sql = "INSERT INTO noticias (autor,id_seccion,titulo, subtitulo, texto, imagen, fecha_creacion) 
							VALUES ( :autor, :idSeccion, :titulo, :subtitulo , :texto , :imagen , CURRENT_DATE)";

		$resultado = $this->data_source->ejecutarActualizacion(
			$sql,
			array(
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
	public function insertKeywordsNoticia($keyword)
	{
		$sql = "INSERT INTO keywords (keyword) VALUES ( :keyword)";
		$resultado = $this->data_source->ejecutarActualizacion(
			$sql,
			array(
				':keyword' => $keyword
			)
		);
		return $resultado;
	}

	// Inserta en la base de datos la id de la noticia y su keywords correespondientes
	public function insertKeywordsNews($idkeyword, $id_noticia)
	{
		$sql = "INSERT INTO keywordsNews (id_keyword, id_noticia) VALUES ( :idkeyword, :id_noticia)";
		$resultado = $this->data_source->ejecutarActualizacion(
			$sql,
			array(
				':idkeyword' => $idkeyword,
				':id_noticia' => $id_noticia
			)
		);
		return $resultado;
	}


	###############################
	// METODOS PARA CARGAR INFORMACION HACIENDO SELECTS EN LA BASE DE DATOS

	// Muestra todas las keywords de una noticia 
	public function cargarKeywordsNoticia($idnoticia)
	{
		$data_table = $this->data_source->ejecutarConsulta("SELECT * FROM keywordsNews where id_noticia = '$idnoticia'");
		return $data_table;
	}

	// Muestra todas las noticias creadas por todos los usuarios
	public function Mostrar()
	{
		$data_table = $this->data_source->ejecutarConsulta("SELECT * FROM noticias order by 1 desc");

		return $data_table;
	}


	// Muestra por pantalla solo aquella noticias que ya estan pubnlicadas
	public function MostrarNoticias()
	{
		$data_table = $this->data_source->ejecutarConsulta("SELECT * FROM noticias WHERE fecha_publicacion != '0000-00-00'  order by 1 desc");

		return $data_table;
	}

	// Recoge todas las keywords que hay en la base de datos
	public function CargarKeywords()
	{
		$data_table = $this->data_source->ejecutarConsulta("SELECT * FROM keywords");
		return $data_table;
	}

	// Recoge todas las keywords que hay en la base de datos vinculadas a una noticia
	public function CargarKeywordsSoloKeywords($idnoticia)
	{
		$data_table = $this->data_source->ejecutarConsulta("SELECT keyword from keywords where id_keywords in ( SELECT id_keyword from keywordsNews where id_noticia = $idnoticia GROUP by id_noticia)");
		return $data_table;
	}

	// Muestra todas las imagenes que un usuario ha subido
	public function CargarGaleriaImagenesAutor($autor)
	{
		$data_table = $this->data_source->ejecutarConsulta("SELECT DISTINCT(imagen), id_noticia FROM noticias where autor = '$autor' GROUP BY imagen order by 1 desc ");
		return $data_table;
	}


	// Recoge todas noticias de la base de datos de un usuario en concreto
	public function MostrarMisNoticias($autor)
	{
		$data_table = $this->data_source->ejecutarConsulta("SELECT * FROM noticias WHERE autor = '$autor' order by 1 desc ");
		if ($data_table) {
			return $data_table;
		}
	}

	// Devuelve como objeto una noticia de la base de datos pasando por parametro la id del mismo
	public function Obtener($id)
	{
		$data_table = $this->data_source->ejecutarConsulta("SELECT * FROM noticias WHERE id_noticia = '$id' ");
		if ($data_table) {
			return $data_table;
		}
	}

	// Obtiene la id de la ultima noticia publicada
	public function maxIdNoticia()
	{
		$data_table = $this->data_source->ejecutarConsulta("SELECT MAX(id_noticia) as maxid FROM noticias ");
		return $data_table;
	}

	// Muestra la lista de secciones en las que se pueden publicar noticias
	public function listaSecciones()
	{
		$data_table = $this->data_source->ejecutarConsulta("SELECT * FROM seccion");
		return $data_table;
	}


	// ###############################
	// BORRAR DATOS EN LA BASE DE DATOS


	// Eliminar de la base de datos un producto pasando por parametro la id del producto
	public function Eliminar($id_noticia)
	{
		$resultado = $this->data_source->ejecutarActualizacion(
			"DELETE FROM noticias WHERE id_noticia = :idnoticia",
			array(':idnoticia' => $id_noticia)
		);
		return $resultado;
	}

	// ###############################
	// ACTUALIZA LOS  DATOS EN LA BASE DE DATOS 


	// Actualizar noticia existente
	public function actualizar($noticia)
	{
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

		$resultado = $this->data_source->ejecutarActualizacion(
			$sql,
			array(

				':id_noticia' => $noticia->__GET('idNoticia'),
				':editor' => $noticia->__GET('editor'),
				':titulo' => $noticia->__GET('titulo'),
				':subtitulo' => $noticia->__GET('subtitulo'),
				':imagen' => $noticia->__GET('image'),
				':texto' => $noticia->__GET('texto'),
				':fecha_publicacion'  => $noticia->__GET('fechaPublicacion'),
				//	':keywords' => $noticia->getKeywords(),
				':id_seccion' => $noticia->__GET('idSeccion')
			)
		);
		return $resultado;
	}

	// Actualiza foto de la noticia
	public function actualizarFotoNoticia($noticia)
	{
		$sql = "UPDATE noticias SET 
				imagen = :imagen
				WHERE id_noticia = :id_noticia
				";
		$resultado = $this->data_source->ejecutarActualizacion(
			$sql,
			array(
				':id_noticia' => $noticia->__GET('idNoticia'),
				':imagen' => $noticia->__GET('Image')

			)
		);
		return $resultado;
	}

	/* 
		Cuando se publica una noticia  se tiene que validar que tambiebn se publiquen sus palabras clave y 
		para ellos a traves de una transaccion con beginTransaction, el commit y el rollBack se garantiza que
		cuando se publique una noticia tambien se haga todo lo demas.
	*/


	public function transactionUpdate($newKeywords, $arrayKeywords, $idnoticia, $noticia) 
	{
        
		try 
		{

        	$this->data_source->beginTransaction();

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
					foreach ($this->CargarKeywords() as $key) {
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
					foreach ($this->CargarKeywords() as $key) {
						if ($key['keyword'] == $value) {
							$this->insertKeywordsNews($key['id_keywords'], $maxid + 1);
						}
					}
				}
			}

			$this->data_source->commit();
        } 
        catch (Exception $e) {
			$this->data_source->rollBack();
			echo "Fallo: " . $e->getMessage();
		}
	}
}
 

?>