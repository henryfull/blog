<section id="misnoticias">
    <h2>Mis Noticias</h2>


    <ul class="cabecera-lista-noticias cabecera">
        <li>id</li>
        <li>autor</li>
        <li>editor</li>
        <li>titulo</li>
        <li>subtitulo</li>
        <li>texto</li>
        <li>seccion</li>
        <li>imagen</li>
    </ul>
    <ul class="listado-noticias">

        <?php 
        //	print_r ( $this->model->MostrarMisNoticias($_SESSION["username"]) );
        ?>
        <?php 

            if(empty($this->model->misnoticias()) && $_SESSION["numuser"] == 1){
           
            }
            else{
                if ($_SESSION["numuser"] == 1) {

                    foreach ($this->model->misnoticias() as $r):
                        
                        include("modules/listadonoticiaseditor.php");
                    endforeach;
                } else {
                    
                    foreach ($this->model->todasNoticias() as $r): 
                        include("modules/listadonoticiaseditor.php");
                    endforeach;
                }
            }


        ?>


    </ul>

    <div class="modal"></div>
    <div class="fondonegro"></div>
</section> 