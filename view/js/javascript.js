
var articulos = document.querySelectorAll(".link-post");

// RECORRE TODAS LAS PUNLICACIONES, CUANDO LE HACES CLICK, IRA A LA FUNCION PARA DEVOLVER LA NOTICIA SELECCIOANDA
articulos.forEach(element => {
    element.addEventListener("click", function () {
        mostrarPost(element);
    })
});

// A TRAVES DE AJAX DEVUELVE LA NOTICIA SELECCIONADA PARA DESPUES MOSTRARLA EN UN MODAL
function mostrarPost(element) {

    let id = element.id;
    var theObject = new XMLHttpRequest();
    theObject.open('POST', '?c=News&a=PaginaNoticia&id_noticia=' + id, true);
    theObject.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    theObject.onreadystatechange = function () {
        //    document.getElementById("select-centros").innerHTML = theObject.responseText;
        if (this.readyState == 4 && this.status == 200) {
            var arrayObject = JSON.parse(theObject.responseText);
                
                 // Crea el modal y todo su contenido
                crearModal(arrayObject) ;
        }
    }
    theObject.send('id_noticia=' + id);
}

// CREA TODO EL ARTICULO, SU CONTENIDO Y LO MUESTRA A TRAVES DE UN MODAL
function crearModal(arrayObject) {
    console.log(arrayObject);

    document.getElementsByClassName("modal")[0].innerHTML = '' + 
    '<section id="view-post">' + 
        '<a id="cerrar-modal" class="cerrar-modal">cerrar</a>' +
        '<article id="post">' +
            '<hgroup>' + 
                '<h1>' + arrayObject.titulo + '</h1>' + 
                '<h2>' + arrayObject.subtitulo + '</h2>' + 
            '</hgroup>' + 
           ' <figure>' +
               ' <img src="' + arrayObject.imagen + '" width="auto" height="auto">' +
           ' </figure>' +
                '<p>' + arrayObject.texto + '</p>'+
                '<p>' + arrayObject.fecha_creacion + '</p>'+
                '<p>' + arrayObject.autor + '</p>'+
       ' </article>' + 
    '</section>' ;

    document.getElementsByClassName("modal")[0].style.display = "grid";
    document.getElementsByClassName("fondonegro")[0].style.display = "block";
    document.getElementById("cerrar-modal").addEventListener("click",cerrarModal );

}


// SE RESETEA EL MODAL Y SE OCULTA DE NUEVO
function cerrarModal(event) {
    document.getElementsByClassName("modal")[0].style.display = "none";
    document.getElementsByClassName("modal")[0].innerHTML = "";
    document.getElementsByClassName("fondonegro")[0].style.display = "none";
}
