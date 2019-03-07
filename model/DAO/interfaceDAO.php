<?php 

    interface interface_DAO {

        public function __construct();

        public function transactionUpdate($newKeywords, $arrayKeywords, $idnoticia, $noticia);

        public function actualizar($noticia);

        public function Eliminar($id_noticia);

        public function Obtener($id);

        public function MostrarMisNoticias($autor);

        public function MostrarNoticias();

        public function cargarKeywordsNoticia($idnoticia);

    }
?>