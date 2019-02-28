<section id="publicaciones">
    <h2>Noticias</h2>
    
    <ul class="noticias">
        <?php foreach ($this->model->todasNoticiasPublicas() as $r): ?>
        <li class="list">
            <article class="articulos">
        
        <!--
                <a href="?c=News&a=PaginaNoticia&id_noticia=<?php echo $r["id_noticia"]; ?>" id="<?php echo $r["id_noticia"]; ?>" class="link-post">
-->    
                <a id="<?php echo $r["id_noticia"]; ?>" class="link-post">
  
                <!--    <li><?php echo $r["id_noticia"]; ?> </li> -->
                    <h4>
                        <?php echo $r["titulo"]; ?>
                    </h4>
                    <figure><img src="<?php echo $r["imagen"]; ?>" width="auto" height="auto"> </figure>

                    <p>
                        <?php echo substr(strip_tags($r['texto']), 0, 200); ?>
                    </p>

                    <p>
                        <span class="name-autor">
                            <?php echo $r["autor"]; ?>
                        </span>

                        <span class="date-post">
                            <?php echo $r["fecha_creacion"]; ?>
                        </span>
                    </p>
                </a>

            </article>
        </li>
        <?php endforeach; ?>
    </ul>




    <div class="modal"></div>
    <div class="fondonegro"></div>


</section> 