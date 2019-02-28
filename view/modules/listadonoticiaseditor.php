<li class="list">
    <article>
        <div class="opciones-noticia">
            <a href="?/News/Eliminar&id_noticia=<?php echo $r["id_noticia"];?>">
            <span class="Icon Icon--delete "></span>
            </a>
            <a href="?/News/Crud/<?php echo $r["id_noticia"]; ?>"><span class="Icon Icon--editPencil "></span>
            <a id="<?php echo $r["id_noticia"]; ?>" class="link-post"><span class="Icon Icon--info "></span></a> 

<!--            <a id="linkVistaProducto" href="?c=News&a=PaginaNoticia&id_noticia=<?php echo $r["id_noticia"]; ?>"><span class="Icon Icon--info "></span></a> 
    			<a class="linkVistaProducto"><img src="view/image/icon-info.png" alt="más informacion"></a> 
-->	
        </div>
        <form action="?c=tienda&a=Carrito" method="post" class="form-listado">	

            <ul class="componentes-noticias ">
                <li><input type="hidden" name="id" value="<?php echo $r["id_noticia"]; ?>"/><?php echo $r["id_noticia"]; ?> </li>
                <li><input type="hidden" name="username"value="<?php echo $r["autor"]; ?>"/><?php echo $r["autor"]; ?> </li>
                <li><input type="hidden" name="username"value="<?php echo $r["editor"]; ?>"/><?php echo $r["editor"]; ?> </li>
                <li><input type="hidden" name="titulo" value="<?php print $r["titulo"]; ?>"/><?php print $r["titulo"]; ?></li>
                <li><input type="hidden" name="subtitulo" value="<?php echo $r["subtitulo"]; ?>"/><?php echo $r["subtitulo"]; ?> </li>
                <li><input type="hidden" name="texto" value="<?php echo $texto; ?>"/><?php echo substr(strip_tags($r['texto']), 0, 200); ?> </li>
                <li><input type="hidden" name="id_seccion" value="<?php echo $r["id_seccion"]; ?>"/><?php echo $r["id_seccion"]; ?> </li>
                <li><img src="<?php echo $r["imagen"]; ?>" width="auto" height="auto"> </li>
            </ul>
        </form>

    </article>
</li>