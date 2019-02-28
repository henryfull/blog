
<section id="products">
	<h3>Productos</h3>
	<div><a href="?c=Tienda&a=FormProduct" class="btn btnadd" >Añadir Producto</a></div>

	<ul class="list-products cabecera">
		<li>id</li>
		<li>Nombre</li>
		<li>precio</li>
		<li>Stock</li>
	</ul>
	
	<ul class="productos">	
		<?php foreach($this->model->Mostrar() as $r): ?>
			<li class="list">
				<article>
					<div>
						<a href="?c=Tienda&a=Eliminar&id=<?php echo $r->id;?>">
							<img src="view/image/icon-drop.png" alt="borrar"/>
						<a href="?c=Tienda&a=Crud&id=<?php echo $r->id; ?>"><img src="view/image/icon-edit.png" alt="modificar" />
						<a id="linkVistaProducto" href="?c=Tienda&a=paginaproducto&id=<?php echo $r->id; ?>"><img src="view/image/icon-info.png" alt="más informacion"></a> 
				
		<!--			<a class="linkVistaProducto"><img src="view/image/icon-info.png" alt="más informacion"></a> 
-->	
					</div>
					<ul class="list-products ">
						<form action="?c=tienda&a=Carrito" method="post">	
							<li><input type="hidden" name="id" value="<?php echo $r->id; ?>"/><?php echo $r->id; ?> </li>
							<li><input type="hidden" name="name"value="<?php echo $r->name; ?>"/><?php echo $r->name; ?> </li>
							<li><input type="hidden" name="price" value="<?php echo $r->price; ?>"/><?php echo $r->price; ?> €</li>
							<li><input type="hidden" name="stock" value="<?php echo $r->stock; ?>"/><?php echo $r->stock; ?> </li>
							<li><input type="hidden" name="name"value="<?php echo $r->image; ?>"/><img src="<?php echo $r->image; ?>" width="auto" height="auto"> </li>
					
						</form>
					</ul>
				</article>
			</li>
    	<?php endforeach; ?>	
	</ul>
	
	
</section>
	<?php
		if(!empty($_SESSION['carrito'])){
			echo '<button class="icon_cart"><img src="view/image/icon-cart.png" alt="actualizar"> '; 

			echo "<span>" . count($_SESSION['carrito']) . "</span>";
		}

	?>

</button>

	<a href="?c=Common&a=CerrarSesion" class="logout">Cerrar Sesion</a>





	