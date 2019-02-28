<section id="view-post">
	<?php
	

	empty($prod["name"])? "": print $prod["name"]; 

	?>
	<a href="?c=News&a=Index" class="return">cerrar</a>
	<article id="post">
		<hgroup>
			<h1><?php empty($prod["titulo"])? "":  print $prod["titulo"]; ?></h1>
			<h2><?php empty($prod["subtitulo"])? "":  print $prod["subtitulo"]; ?></h2>		
		</hgroup>
		<figure>
			<img src="<?php empty($prod["imagen"])? '':  print $prod["imagen"]; ?>" width="auto" height="auto">
		</figure>
			<p><?php empty($prod["texto"])? "":  print $prod["texto"]; ?></p>
			<p><?php empty($prod["fecha_creacion"])? "":  print $prod["fecha_creacion"]; ?></p>
			<p><?php empty($prod["autor"])? "":  print $prod["autor"]; ?></p>
	</article>
</section>

