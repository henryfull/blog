<nav>
    <div id="blocknav">
<!--        <a href="?c=Common&a=index" class="col-sm-2"><span class="Icon Icon--home "></span></a> -->
        <a href="?/Common/index" class="col-sm-2"><span class="Icon Icon--home "></span></a>
        
        <form class="col-sm-8">
            <span class="Icon Icon--search""></span><input class=" input-form type="text" name="search-main" placeholder="Buscar">
        </form>
        <ul class="options-nav col-sm-2">





            <?php 
            if (empty($_SESSION["user"])) {
                echo ' <li> <a href="?/loginregister&/Login" class=""><span class="Icon Icon--person"></span> Login</a></li>';
            } else {
                echo '  <li><button class="Icon Icon--pen "></button></li>';

                if($_SESSION["numuser"] != 2){
                    print ' <li><a href="?/news&/FormNoticia" class="" ><span class="Icon Icon--add"></span></a></li>';
                }
   
                echo    '<li>
                            <label class="button" for="click">
                                <span class="Icon Icon--person dropdown "></span>
                            </label>
                            <input type="checkbox" id="click" style="display:none" />   
                            <ul class="menu-dropdown menu-user">';


                echo    '<li><a href="" ><span class="Icon Icon--person"></span> Perfil</a></li>';
                echo    '<li> <a href="?/news/Index" class=""><span class="Icon Icon--summary"></span> Mis Noticias</a></li>';
                
                echo    '<li> <a href="?/news&/Index" class=""><span class="Icon Icon--summary"></span> Mis Noticias</a></li>';
                echo    '<li><a href="?/news&/FormNoticia" class="" ><span class="Icon Icon--add"></span>Añadir Noticia</a></li>';
                echo    '<li><a href="" ><span class="Icon Icon--filter"></span> Configuracion</a></li>';
                echo    '<hr>
                        <li><a href="?/Common&/CerrarSesion" class=""><span class="Icon Icon--close"></span> Cerrar Sesion</a></li>';
            }
            ?>






        </ul>
        </li>

        </ul>

    </div>
</nav> 