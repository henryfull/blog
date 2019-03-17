<?php

abstract class NoticiaAbstractDAO 
{
 

	// ###############################
	// METODOS PARA INSERTAR DATOS EN LA BASE DE DATOS	

	// inserta en la base de datos la noticia pasado como parametro el objeto del mismo

	public function insertNoticia($noticia) {}


	// Inserta una keyword en la base de datos
	public function insertKeywordsNoticia($keyword) {}

	// Inserta en la base de datos la id de la noticia y su keywords correespondientes
	public function insertKeywordsNews($idkeyword, $id_noticia){}


	###############################
	// METODOS PARA CARGAR INFORMACION HACIENDO SELECTS EN LA BASE DE DATOS

	// Muestra todas las keywords de una noticia 
	public function cargarKeywordsNoticia($idnoticia){}

	// Muestra todas las noticias creadas por todos los usuarios
	public function Mostrar(){}


	// Muestra por pantalla solo aquella noticias que ya estan pubnlicadas
	public function MostrarNoticias(){}

	// Recoge todas las keywords que hay en la base de datos
	public function CargarKeywords(){}

	// Recoge todas las keywords que hay en la base de datos vinculadas a una noticia
	public function CargarKeywordsSoloKeywords($idnoticia){}

	// Muestra todas las imagenes que un usuario ha subido
	public function CargarGaleriaImagenesAutor($autor){}


	// Recoge todas noticias de la base de datos de un usuario en concreto
	public function MostrarMisNoticias($autor){}

	// Devuelve como objeto una noticia de la base de datos pasando por parametro la id del mismo
	public function Obtener($id){}

	// Obtiene la id de la ultima noticia publicada
	public function maxIdNoticia(){}

	// Muestra la lista de secciones en las que se pueden publicar noticias
	public function listaSecciones(){}


	// ###############################
	// BORRAR DATOS EN LA BASE DE DATOS


	// Eliminar de la base de datos un producto pasando por parametro la id del producto
	public function Eliminar($id_noticia){}

	// ###############################
	// ACTUALIZA LOS  DATOS EN LA BASE DE DATOS 


	// Actualizar noticia existente
	public function actualizar($noticia){}

	// Actualiza foto de la noticia
	public function actualizarFotoNoticia($noticia){}

	/* 
		Cuando se publica una noticia  se tiene que validar que tambiebn se publiquen sus palabras clave y 
		para ellos a traves de una transaccion con beginTransaction, el commit y el rollBack se garantiza que
		cuando se publique una noticia tambien se haga todo lo demas.
	*/


	public function transactionUpdate($newKeywords, $arrayKeywords, $idnoticia, $noticia) {}
}


 ?>