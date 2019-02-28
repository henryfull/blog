<?php 
/**
 * Business Oject
 * */
require_once("model/DAO/noticiaDAO.php");
session_start();
class BusinessObject
{

    private $misnoticias;

    public function __CONSTRUCT()
    {
        $this->noticiasDao = new NoticiasDao();
        //    $this->cart = new Cart();
    }

    // Muestra todas las publicaciones ya publicacdads de todos los usuarios
    public function todasNoticiasPublicas()
    {
        return  $this->noticiasDao->MostrarNoticias();
    }

    // Muestra todas las publicaciones de tosos los usuarios
    public function todasNoticias()
    {
        return  $this->noticiasDao->Mostrar();
    }

    // Muestras las publicaciones del mismo usuario
    public function misnoticias()
    {
        return  $this->noticiasDao->MostrarMisNoticias($_SESSION["username"]);
    }

    // Se obtiene la id de la noticia
    public function obtenerId()
    {
        return $this->noticiasDao->Obtener($_REQUEST['id_noticia'])[0];
    }

    // Se elimina una noticia en base en base a su id
    public function eliminarId()
    {
        return  $this->noticiasDao->Eliminar($_REQUEST['id_noticia']);
    }

    // Muestra la galeria de imagnees de que un usuario en concreto a subido en sus publicaciones
    public function galeriaUsuario($autor)
    {
        return $this->noticiasDao->CargarGaleriaImagenesAutor($autor);
    }

    // Elimina una imagen de su galeria  y ademas la elimina de la publicacion
    public function eliminarFotoGaleria($id, $url)
    {
        $noticia = new Noticias();
        $noticia->setidNoticia($id);
        $noticia->setImage($url);
        return $this->noticiasDao->actualizarFotoNoticia($noticia);
    }


    // Guarda una publicacion 
    public function guardarNoticia()
    {
        $noticia = new Noticias();
        $id = 0;
        $media = "";
        $media = $this->imagenNoticia();
        //    echo 'Nombre foto: ' .  $media . '<br>User: ' . $_POST["id_noticias"] . "<br>";


        empty($_POST["id_noticias"]) ? $id = 0 : $id = $_POST["id_noticias"];
        empty($_POST["keywords-text"]) ? $noticia->setKeywords("noticias") : $noticia->setKeywords($_POST["keywords-text"]);
        empty($_POST["id_noticias"]) ? $id = 0 : $id = $_POST["id_noticias"];
    //    ($_SESSION["numuser"]) == 2 ? $noticia->setEditor($_SESSION["username"]) : $noticia->setEditor("");
        

        if ($_SESSION["numuser"] == 2) {
            $noticia->setFechaPublicacion($_POST["fecha_publicacion"]);
            $noticia->setEditor($_SESSION["username"]);
        } else {
            if ($_POST["editor"] == " ") {
            //    $noticia->setFechaPublicacion('0000-00-00');
                $noticia->setEditor("");
                $noticia->setFechaPublicacion($_POST["fecha_publicacion"]);
            }
            else{
                $noticia->setEditor($_POST["editor"]);
            }
        }
        $noticia->setAutor($_SESSION["username"]);
        $noticia->setTitulo($_POST["titulo"]);
        $noticia->setSubtitulo($_POST["subtitulo"]);
        $noticia->setTexto($_POST["textNews"]);
        $noticia->setIdSeccion($_POST["id_seccion"]);
        $noticia->setImage($media);
        $noticia->setidNoticia($id);

        // insertamos todas las keywords en una array y las metemos en la base de datos
        $tada = array();
        $keywordsPost = explode(" , ", $noticia->getKeywords());
        array_pop($keywordsPost);
        $newKeywords = array();

        $arraytemp = $this->noticiasDao->CargarKeywordsSoloKeywords($_POST["id_noticias"]);

        // Separamos las palabras clave nuevas de las ya utilizadas
        foreach ($keywordsPost as $key => $value) {
            $cierto = false;
            foreach ($arraytemp as $r) {
                if (trim($r["keyword"]) == trim($value)) {
                    $cierto = true;
                }
            }
            if ($cierto == false) {
                array_push($newKeywords, $value);
            }
        }
        //   array_push($keywords,$r["keyword"] );

        $this->noticiasDao->transactionUpdate($newKeywords, $keywordsPost, $id,$noticia);

/*
        // Inserta las nuevas palabras claves en la tabla de keywords

        foreach ($newKeywords as  $value) {
            $this->noticiasDao->insertKeywordsNoticia($value);
        }


        // Actualiza o inserta una noticia 
        if ($id > 0) {
            print_r($this->noticiasDao->actualizar($noticia));
            echo '<br>se actualiza';
            return true;
        } 
        else {
            print($this->noticiasDao->insertNoticia($noticia));
            echo 'se inserta';
            return true;
        }
*/

    }


    // Inserta y publica la imagen de una noticia, comprueba si la imagen proviene de la galeria de imagenes del usuario o bien se ha subido por fichero
    public function imagenNoticia()
    {

        if (!empty($_FILES['fichero_usuario']['name'])) {

            echo "linea 154: esta vacio";

            $localserver = "http://localhost/blog/";

            echo 'linea 151 de noticias BO ';
        //    print($_POST["fichero_usuario"]);
            // directorio donde guarda las imagen del producto
            $dir_subida = 'view/image/noticias/' . $_SESSION["username"] . '/post/';
            $fichero_subido = $dir_subida . basename($_FILES['fichero_usuario']['name']);
            // si el fichero no exite te lo pondra en su carpeta correspondiente
            if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)) {
                echo "El fichero es válido y se subió con éxito.<br>";
                $media = $localserver . trim($fichero_subido, '.');
                echo 'El nombre de la imagen es:  ' . $_FILES['fichero_usuario']['name'] . "<br>";
            } else {
                // si el producto no tenia imagen, te pondra una por defecto
                echo "No se ha subido el fichero!<br>";
                //      $media ="http://localhost/blog/view/image/noticias/noimage.png";
            }

            if (empty($_POST["id_noticias"]) && empty($_FILES['fichero_usuario']['name'])) {

                echo "el post esta vacio y el archivo de subida tambien " . $_FILES['fichero_usuario']['name'];

                $media = "http://localhost/blog/view/image/noticias/noimage.png";
            } else if (!empty($_POST["id_noticias"])) {

                echo "el post no esta vacio " . $_FILES['fichero_usuario']['name'] . " <br>";

                $media = $localserver . trim($fichero_subido, '.');
            }
        }
        else{
            echo 'linea 183 de noticias BO no esta vacio';

            $media =  $_POST["fichero_usuario"];

        }


        return $media;
    }

    // Muestra el listado de las secciones que estan disponibles para una noticia
    public function listadoSecciones()
    {
        return $this->noticiasDao->listaSecciones();
    }

    // Carga todas las keywords disponibles para una noticia
    public function mostrarKeywords()
    {
        return $this->noticiasDao->CargarKeywords();
    }

    // Carga las keywords de una noticia en concreto
    public function seleccionarKeywordsNoticias()
    {
        return $this->noticiasDao->cargarKeywordsNoticia($_REQUEST['id_noticia']);
    }


    public function transaction()
    {
        try {
            $this->noticiasDao->beginTransaction();
            $this->guardarNoticia();
            $this->noticiasDao->commit();
        } catch (Exception $e) {
            $this->noticiasDao->rollBack();
            echo "Fallo: " . $e->getMessage();
        }
    }
}




/**
 * Se crea la instancia del Objeto.
 * */
 