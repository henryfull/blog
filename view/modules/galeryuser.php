

<script>
    var arrayImages = <?php print_r(json_encode($this->model->galeriaUsuario($_SESSION["username"]))); ?> ;
    
</script>
<?php 



    echo '<div class="modal">' . 

        '<hgroup><h3>Galery</h3> <a class="cerrar-modal" > X </a></hgroup>' .

        '<ul class="galery-block">';

    foreach ($this->model->galeriaUsuario($_SESSION["username"]) as $value) {

        echo '<li><input id="'. $value["imagen"].'" type="radio" name="imageGalery" value="'. $value["imagen"] .'"  > <label for="'. $value["imagen"] .'">  
        <img class="imagen-portada" src="' . $value["imagen"] . '" width="auto" height="auto"> ' .
        '</label></li>';

/*
        print '<li><img class="imagen-portada" src="' . $value["imagen"] . '" width="auto" height="auto">' .

                '<div class="options-image">' . 
                    '<a class="btn-verimagen"></a>' .
                    '<a href="?c=News&a=borrarImagen&id_noticia=' . $value["id_noticia"] .'&url=' .$value["imagen"] .' "class="btn-killiamgen"></a> '. 
                '</div></li>';
*/
                
    }
    echo'</ul>'.

    '<div><a id="addimagefromgalery">Añadir</a>' .
    '<a href="?c=News&a=borrarImagen&id_noticia=' . $value["id_noticia"] .'&url=' .$value["imagen"] .' "class="btn-killiamgen"></a></div>   ' .
    '</div><div class="fondonegro"></div>';
?>
