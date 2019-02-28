
document.getElementsByTagName("aside")[0].addEventListener("click", muestraOculta);
document.getElementById("menu-items").addEventListener("click", actionButtons)
document.getElementById("fileToUpload").addEventListener("change", cargarFotoPortada);
document.getElementById("keyword-insert").addEventListener("keyup", buscarPalabrasClave);
document.getElementById("mostrarkeywords").addEventListener("click", seleccionarPalabraClaveBuscador);
document.getElementById("btn-add-keyword").addEventListener("click", ponerPalabraClaveBuscador);
document.getElementById("btn-save-post").addEventListener("mouseover", transformHtmltoPost);
document.getElementById("container-text").addEventListener("load", transformarPostToHtml);
document.querySelector(".vergaleria").addEventListener("click", mostrarGaleria);
document.getElementById("editor-texto").designMode = "on";
document.getElementById("editor-texto").contentEditable = true;

listenCloseModal();
cargarKeywords();

function cargarKeywords() {

    let keyword = document.getElementById("textoarea2").value;
    document.getElementById("textoarea").innerHTML = keyword;
    console.log(keyword);
}


window.document.getElementById("editor-texto").designMode = "On";

// Funcion para cerrar el modal que se abre de las imagenes
function listenCloseModal() {
    let modals = document.getElementsByClassName("cerrar-modal");
    for (let i = 0; i < modals.length; i++) {
        const element = modals[i];
        element.addEventListener("click", cerrarModal);
    }
}


function cargarFotoPortada(event) {
    document.getElementsByClassName("labelfile")[0].innerHTML = event.target.value.split('\\').pop();
    console.log(event.target.value.split('\\').pop());
    
}

function transformarPostToHtml(event) {
    console.log("se varga");

}

// Cerrar Modal
function cerrarModal(event) {
    let modal = event.target.parentNode.parentNode;
    console.log(modal);
    //    document.getElementsByClassName("galery-block")[0].innerHTML = "";
    modal.style.display = "none";
    modal.nextSibling.style.display = "none";
}

// Muestra la galeria
function mostrarGaleria(event) {
    for (let i = 0; i < arrayImages.length; i++) {
        const element = arrayImages[i];
        document.getElementsByClassName("modal")[0].style.display = "grid";
        document.getElementsByClassName("fondonegro")[0].style.display = "block";
    }
    document.getElementById("addimagefromgalery").addEventListener("click",imagenSeleccionada );

}

// Carga en el input la imagen seleccionada
function imagenSeleccionada(event) {
    let galery = document.getElementsByName("imageGalery");
    for (let i = 0; i < galery.length; i++) {
        const element = galery[i];
        if (element.checked == true) {
            console.log(element.getAttribute("id"));
            document.getElementById("fileToUploadSecundary").setAttribute("value",element.getAttribute("id") );
            let modal = document.getElementsByClassName("modal")[0];
            modal.style.display = "none";
            modal.nextSibling.style.display = "none";
            document.getElementsByClassName("imagen-portada")[0].setAttribute("src",element.getAttribute("id") );

        }
    }
}


function opcionesImagenGalery(event) {
    let element = event.target.parentNode;
    console.log(event.target);

    let bloque = document.createElement('div');
    let item = bloque.innerHTML = '<a class="btn-verimagen"></a><a class="btn-killiamgen"></a>';
    bloque.classList.add("options-image");
    //   bloque.appendChild(item);

    element.appendChild(bloque);

}

function killopcionesImagenGalery(event) {

    let rutaimagen = event.target.getAttribute("src");
    console.log(document.getElementById("fileToUpload").getAttribute("value"));
}



function transformHtmltoPost(event) {

    var doc = document.getElementById("editor-texto").innerHTML;
    var inputTexto = document.getElementById("textNews");
    inputTexto.value = doc;
    console.log(inputTexto.value);
}

function ponerPalabraClaveBuscador(event) {

    let keyword = document.getElementById("keyword-insert").value;
    //    let textarea = document.getElementById("editor-texto").innerText;  
    let inputText = document.getElementById("textoarea").value;
    let arrayKeywords = inputText.split(" , ");
    let cierto = false;

    for (let i = 0; i < arrayKeywords.length; i++) {
        const element = arrayKeywords[i];
        if (keyword == element) {
            cierto = true;
            break;
        }
    }

    if (!cierto) {
        document.getElementById("textoarea").value += keyword + " , ";
        document.getElementById("keyword-insert").value = "";
    }



}


function seleccionarPalabraClaveBuscador(event) {
    document.getElementById("keyword-insert").value = event.target.textContent;
    document.getElementById("mostrarkeywords").style.display = "none";
}

function buscarPalabrasClave(event) {

    console.log("codigo tecla " + event.keyCode);
    let palabra = event.target.value;
    let contenidopalabras = "";
    let keyword = "";
    let contadorAciertos = 0;

    console.log();

    if (event.keyCode >= 186 && event.keyCode <= 220 || event.keyCode == 16 || event.keyCode == 18 || event.keyCode == 93 || event.keyCode == 17) {

    }
    else {
        document.getElementById("mostrarkeywords").innerHTML = "";

        for (let i = 0; i < arrayKeywors.length; i++) {
            keyword = arrayKeywors[i].keyword.toLowerCase();

            if (keyword.includes(palabra.toLowerCase()) && palabra != "") {
                contadorAciertos++;
                contenidopalabras = "<span>" + keyword + "</span>";
                console.log("contenido palabra " + contenidopalabras);
                document.getElementById("mostrarkeywords").innerHTML += contenidopalabras;
                document.getElementById("mostrarkeywords").style.display = "block";

            }
            else if (palabra == "" && event.keyCode == 8) {
                document.getElementById("mostrarkeywords").innerHTML = "";
                document.getElementById("mostrarkeywords").style.display = "none";
                console.log("no acierto");

            }
        }

    }
}




function addColumna(typeMenu, clase, contenido) {
    var submenu = document.getElementById(typeMenu);
    var creacionColumnas = document.createElement("li"); 		// Crea una columna 
    var contenidoHijo = document.createTextNode(contenido);
    creacionColumnas.classList.add(clase);		// Le añade contenido a la columna
    creacionColumnas.appendChild(contenidoHijo);				// Le introduce el contenido al Elemento columna
    return submenu.appendChild(creacionColumnas);	// Añade la columna a la fila		
}



function actionButtons(event) {

    let editable = document.getElementById("editor-texto");

    console.log(event.target.id);

    // Style Text
    if (event.target.id == "btn-bold") {
        document.execCommand('bold', false, '');        
    }
    else if (event.target.id == "btn-emphasis") {
        document.execCommand('italic', false, '');
    }
    else if (event.target.id == "btn-underline") {
        document.execCommand('underline', false, '');
    }
    else if (event.target.id == "btn-strikethrough") {
        document.execCommand("strikethrough", false, '');
    }
    else if (event.target.id == "btn-foreColor") {
        document.execCommand("foreColor", false, document.getElementById("btn-foreColor").value);
    }
    else if (event.target.id == "btn-uppercase") {
        document.execCommand("foreColor", false, document.getElementById("btn-foreColor").value);
    }

    // Font Size
    else if (event.target.id == "btn-fontSize1") {
        document.execCommand("fontSize: 48px");
    }
    else if (event.target.id == "btn-fontSize2") {
        document.execCommand("fontSize", false, "2");
    }
    else if (event.target.id == "btn-fontSize3") {
        document.execCommand("fontSize", false, "3");
    }

    else if (event.target.id == "btn-fontSize4") {
        document.execCommand("fontSize", false, "4");
    }
    else if (event.target.id == "btn-fontSize5") {
        document.execCommand("fontSize", false, "5");
    }
    else if (event.target.id == "btn-fontSize6") {
        document.execCommand("fontSize", false, "6");
    }
    else if (event.target.id == "btn-fontSize7") {
        document.execCommand("fontSize", false, "7");
    }

    // Header Title Size
    else if (event.target.id == "btn-heading1") {
        document.execCommand("formatBlock", false, "H1");
    }
    else if (event.target.id == "btn-heading2") {
        document.execCommand("heading", false, "H2");
    }
    else if (event.target.id == "btn-heading3") {
        document.execCommand("heading", false, "H3");
    }
    else if (event.target.id == "btn-heading4") {
        document.execCommand("heading", false, "H4");
    }
    else if (event.target.id == "btn-heading5") {
        document.execCommand("heading", false, "H5");
    }
    else if (event.target.id == "btn-heading6") {
        document.execCommand("heading", false, "H6");
    }



    // Align Text
    else if (event.target.id == "btn-justifyLeft") {
        document.execCommand('justifyLeft', false, '');
    }
    else if (event.target.id == "btn-justifyCenter") {
        document.execCommand('justifyCenter', false, '');
    }
    else if (event.target.id == "btn-justifyRight") {
        document.execCommand('justifyRight', false, '');
    }
    else if (event.target.id == "btn-justifyFull") {
        document.execCommand('justifyFull', false, '');
    }


    else if (event.target.id == "btn-outdent") {
        document.execCommand('outdent', false, '');
    }

    // Options of Copy Paste
    else if (event.target.id == "btn-copy") {
        document.execCommand('copy', false, '');
    }
    else if (event.target.id == "btn-cut") {
        document.execCommand('cut', false, '');
    }
    else if (event.target.id == "btn-paste") {
        document.execCommand('paste', false, '');
    }

    // Select all
    else if (event.target.id == "btn-selectAll") {
        document.execCommand('selectAll', false, '');
    }

}


function muestraOculta(e) {

    //    console.log(e.target.className);

    if (e.target.classList.contains("collapse")) {
        var tagBlock = e.target;
        tagBlock = tagBlock.parentNode.lastElementChild;
        console.log(tagBlock);

        if (tagBlock.style.display == "block" || tagBlock.style.display == "") {
            tagBlock.style.display = "none";
            e.target.classList.remove("active");
        }
        else {
            tagBlock.style.display = "block";
            e.target.classList.add("active");
        }
    }

}


