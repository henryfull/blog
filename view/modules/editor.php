


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

                    <span id="btn-bold" >B</span>
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
