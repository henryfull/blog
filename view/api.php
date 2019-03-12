<?php 
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('content-type: application/json; charset=utf-8');

$noticias = array();
$noticias['item'] = array();


if (!empty($_REQUEST["id_noticia"])) {
    $result = $this->model->obtenerId();
    setJson($noticias,$result);
    echo count($result) ;

}
else{
    $result = $this->model->todasNoticias();
    setJson($noticias,$result);
}

function setJson($noticias,$result){
    if (count($result) > 0) {

        foreach ($result as $row) :
    
            $item = array(
                'id' => $row["id_noticia"],
                'autor' => $row["autor"],
                'editor' => $row["editor"],
                'titulo' => $row["titulo"],
                'subtitulo' => $row["subtitulo"],
                'id_seccion' => $row["id_seccion"],
                'imagen' => $row["imagen"],
                'texto' => $row["texto"]
            );
    
            array_push($noticias['item'], $item);
    
        endforeach;
    
        printJson($noticias);
        
    } 
    else {
        error('No hay noticias');
    }   
}
function printJson($array){
    echo json_encode($array);
}

function error($mensaje){
    echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>';
}


 