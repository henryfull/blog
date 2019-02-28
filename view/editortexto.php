<div id="block-edit">

    <div id="titles">
        <input type="hidden" name="id_noticias" value='<?php empty($prod["id_noticia"])? print $prod["id_noticia"] = "": print $prod["id_noticia"]; ?>' />
        <input type="hidden" name="username" value="<?php $_SESSION["username"];?>" />
        <label>Titulo</label>
        <input id="titulo-input" type="text" name="titulo" value="<?php empty($prod["titulo"])? "": print $prod["titulo"]; ?>" placeholder="Titulo"  >
        <label>Subtitulo</label>
        <input id="subtitulo-input" type="text" name="subtitulo" value="<?php empty($prod["subtitulo"])? "": print $prod["subtitulo"]; ?>" placeholder="Subtitulo"  >
    </div>

    <header>
        <div id="menu-left">
            <ul id="menu-items">
                <li class="item-menu">
                    <select>
                        <option selected>Font Size</option>
                        <option id="btn-fontSize1">1</option>
                        <option id="btn-fontSize2">2</option>
                        <option id="btn-fontSize3">3</option>
                        <option id="btn-fontSize4">4</option>
                        <option id="btn-fontSize5">5</option>
                        <option id="btn-fontSize6">6</option>
                        <option id="btn-fontSize7">7</option>
                    </select>
                </li>
                <li class="item-menu">
                    <select>
                        <option selected>Title</option>
                        <option id="btn-heading1">
                            <h1>H1</h1>
                        </option>
                        <option id="btn-heading2">
                            <h2>H2</h2>
                        </option>
                        <option id="btn-heading3">
                            <h3>H3</h3>
                        </option>
                        <option id="btn-heading4">
                            <h4>H4</h4>
                        </option>
                        <option id="btn-heading5">
                            <h5>H5</h5>
                        </option>
                        <option id="btn-heading6">
                            <H6>H6</H6>
                        </option>
                    </select>

                </li>
                <li class="item-menu">
                    <input id="btn-foreColor" type="color" name="favcolor" value="#ff0000">

                    <a id="btn-bold" onclick="formatDoc('bold');">B</a>
                    <a id="btn-emphasis" s><em>I</em></a>
                    <a id="btn-underline"><u>U</u></a>
                    <a id="btn-strikethrough"><del>A</del></a>
                </li>
                <li class="item-menu">
                    <a id="btn-justifyLeft"><img src="view/image/icon-justifyleft.png" alt="left"></a>
                    <a id="btn-justifyCenter"><img src="view/image/icon-justifycenter.png" alt="center"></a>
                    <a id="btn-justifyRight"><img src="view/image/icon-justifyright.png" alt="right"></a>
                    <a id="btn-justifyFull"><img src="view/image/icon-justifyall.png" alt="justify"></a>

                </li>

                <li class="item-menu">
                    <a id="btn-outdent">Tabular</a>
                    <a id="btn-selectAll">Select All</a>
                </li>
                <li class="item-menu">
                    <a id="btn-copy"><img src="view/image/icon-copy.png" alt="copiar"></a>
                    <a id="btn-cut"><img src="view/image/icon-cut.png" alt="cortar"></a>
                    <a id="btn-paste"><img src="view/image/icon-paste.png" alt="pegar"></a>
                </li>


            </ul>



        </div>

    </header>

    <div id="container-text">
        <input type="hidden" name="textNews" value="" id="textNews">

        <div id="block-edit-text" >
            <section id="editor-texto" contenteditable="true" onload="initDoc();ransformarPostToHtml();" name="texto">
            <?php empty($prod["texto"])? "": print $prod["texto"]; ?>
            </section>
        </div>
    </div>
</div>
<aside>
<a href="?c=News&a=Index" class="return cancel">cancelar</a>
<input type="submit" value="Guardar" id="btn-save-post" class="enviar" name="sendproduct" > 	


    
    <article>
        <h3 id="toogle-titulos" class="collapseTitle  collapse" href="#">Secciones </h3>
        <div class="contentCollapse">
            <ul>
                <?php 
                    foreach($this->model->listadoSecciones() as $fila):
                        
                        if(isset($prod["id_seccion"]) && $fila["id_seccion"] == $prod["id_seccion"]){
                            echo '<li><input id="'. $fila["descripcion"].'" type="radio" name="id_seccion" value="'. $fila["id_seccion"] .'" checked > <label for="'. $fila["descripcion"].'"> '. ucfirst($fila["descripcion"]).'</label></li>';
                        }
                        else{
                            if (empty($prod["id_seccion"]) && $fila["descripcion"] == 'General') {
                               
                                echo '<li><input id="'. $fila["descripcion"].'" type="radio" name="id_seccion" value="'. $fila["id_seccion"] .'" checked > <label for="'. $fila["descripcion"].'"> '. ucfirst($fila["descripcion"]).'</label></li>';
                            }
                            else{
                                
                                echo '<li><input id="'. $fila["descripcion"].'" type="radio" name="id_seccion" value="'. $fila["id_seccion"] .'"  > <label for="'. $fila["descripcion"].'"> '. ucfirst($fila["descripcion"]).'</label></li>';
                            }
                        }

                    endforeach;
                ?>	
            </ul>
        </div>
    </article>
    <article>
        <h3 id="toogle-palabras" class="collapseTitle collapse" href="#">Keywords </h3>


        <div class="contentCollapse">

        <?php $keywordsArray = $this->model->mostrarKeywords() ;  ?>
            
            <script>
                var arrayKeywors = <?php print_r(json_encode($keywordsArray)); ?> ;
            </script>
            <div class="block-insert-keyword">
                <input id="keyword-insert" type="text" name="keyword" placeholder="Escribe una keyword"><a id="btn-add-keyword" >añadir</a>
                <article id="mostrarkeywords"></article>
            </div>
            


            <!--
            <ul>
                <?php 
                    foreach($this->model->mostrarKeywords() as $fila):
                        echo '<li> ' . $fila["keyword"] . '</li>';
                    endforeach;
                ?>	
            </ul>
-->
            <textarea name="keywords-text" id="textoarea" cols="30" rows="5" ></textarea>
            <input type="hidden" name="keywords-texto" id="textoarea2" value="<?php empty($keys) ? "" :  print($keys) ; ?>" >
            


<!--

            <ul>
                <li>
                    <h4 class="collapse">Listas </h4>
                    <div class="block-links-titles">
                        <a href="">Lorem ipsum <span class="page-title">Pag <span class="numpage">3</span></span></a>
                        <a href="">Lorem ipsum Patrium <span class="page-title">Pag <span class="numpage">8</span></span></a>
                    </div>
                </li>
                <li>
                    <h4 class="collapse">Negrita </h4>
                    <div class="block-links-titles">
                        <a href="">Lorem ipsum <span class="page-title">Pag <span class="numpage">3</span></span></a>
                        <a href="">Lorem ipsum Patrium <span class="page-title">Pag <span class="numpage">8</span></span></a>
                    </div>
                </li>
                <li>
                    <h4 class="collapse">Cursiva </h4>
                    <div class="block-links-titles">
                        <a href="">Lorem ipsum <span class="page-title">Pag <span class="numpage">3</span></span></a>
                        <a href="">Lorem ipsum Patrium <span class="page-title">Pag <span class="numpage">8</span></span></a>
                    </div>
                </li>
                <li>
                    <h4 class="collapse"> Quaota </h4>
                    <div class="block-links-titles">
                        <a href="">Lorem ipsum <span class="page-title">Pag <span class="numpage">3</span></span></a>
                        <a href="">Lorem ipsum Patrium <span class="page-title">Pag <span class="numpage">8</span></span></a>
                    </div>
                </li>
                <li>
                    <h4 class="collapse">Etiquetas </h4>
                    <div class="block-links-titles">
                        <a href="">Lorem ipsum <span class="page-title">Pag <span class="numpage">3</span></span></a>
                        <a href="">Lorem ipsum Patrium <span class="page-title">Pag <span class="numpage">8</span></span></a>
                    </div>
                </li>
                <li>
                    <h4 class="collapse">Subrayado </h4>
                    <div class="block-links-titles">
                        <a href="">Lorem ipsum <span class="page-title">Pag <span class="numpage">3</span></span></a>
                        <a href="">Lorem ipsum Patrium <span class="page-title">Pag <span class="numpage">8</span></span></a>
                    </div>
                </li>

            </ul>
-->
        </div>
    </article>
    <article>
        <h3 id="toogle-paginas" class="collapseTitle  collapse" href="#">Imagenes </h3>
        
        <div class="contentCollapse">
        <?php 


            if(!empty($prod["imagen"])){
                print '<img class="imagen-portada" src="' . $prod["imagen"] . '" width="auto" height="auto">';
            } 
            else{
                print '<img class="imagen-portada" src="view/image/noticias/noimage.png" width="auto" height="auto" >' ;
            } 
            include("modules/galeryuser.php");

        ?>

        <?php


            if(empty($prod["imagen"])){
                print '<input value="" type="file" name="fichero_usuario" id="fileToUpload">';
                print '<label for="fileToUpload" class="labelfile"><svg  width="18" height="17" viewBox="0 0 20 17"><path fill="white" d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> Subir fichero</label>';

            }
            else{
                print '<input value="' . $prod["imagen"] . '" type="hidden" name="fichero_usuario" id="fileToUploadSecundary" > ';
                print '<input value="' . $prod["imagen"] . '" type="file" name="fichero_usuario" id="fileToUpload" > ';
                print '<label for="fileToUpload" class="labelfile"><svg  width="18" height="17" viewBox="0 0 20 17"><path fill="white" d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> Subir fichero</label>';
            }
            print '<a class="vergaleria">ver galeria</a>';


        ?>
<!--   
   <input value="<?php empty($prod["imagen"])? print "": print $prod["imagen"]; ?>" type="file" name="fichero_usuario" id="fileToUpload">
-->

        </div>
    </article>
    <article>
        <h3 id="toogle-titulos" class="collapseTitle  collapse" href="#">Edicion </h3>
        <div class="contentCollapse">

        <?php
                        
            if ($_SESSION["numuser"]== 2) {
                echo '<p><strong>Autor </strong> <span>'. $prod["autor"] . '</span></p>';

                echo '<p><strong>Editor </strong> <span>'. $_SESSION["username"] . '</span></p>';
                echo '<input type="hidden" name="fecha_publicacion" value="';
                $prod["fecha_publicacion"] == '0000-00-00' ? print date("Y-m-d") :  print $prod["fecha_publicacion"];
                echo '" >';
            }
            else{
                echo '<p><strong>Autor </strong> <span>'. $_SESSION["username"] . '</span></p>';
                echo '<p><strong>Editor </strong> <span>';
                    empty($prod["editor"]) ? print " " :  print $prod["editor"];  
                echo '</span></p>';
                echo '<input type="hidden" name="editor" value="';
                    empty($prod["editor"]) ? print " " :  print $prod["editor"];
                echo '" >';
                
                echo '<input type="hidden" name="fecha_publicacion" value="';
                empty($prod["fecha_publicacion"]) ? print "0000-00-00" :  print $prod["fecha_publicacion"];
                echo '" >';
            }
        ?>
        </div>
    </article>
</aside>    