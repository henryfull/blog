<?php
$operando1 = 1;


if(!extension_loaded("soap")){
      dl("php_soap.dll");
}


ini_set("soap.wsdl_cache_enabled","0");
ini_set('soap.wsdl_cache_ttl', '0'); 
$server = new SoapServer("http://localhost/blog/view/webservice/noticias.wsdl?wsdl");
 
 

function noticias($user){
      include_once '../../model/BO/noticiasDAO.php';
      include_once '../../model/dataSource.php';
      $data_source = new DataSource();
//      $data_table = $data_source->ejecutarConsulta("SELECT tipousuario FROM tipo_usuario WHERE id_tipousuario = $user ");
      $data_table = $data_source->ejecutarConsulta("SELECT * FROM `noticias` WHERE autor LIKE '$user' and editor != '' ");
      $pepe = $data_table;
      return $pepe;
      
}

 
$server->AddFunction("noticias");
$server->handle();
?>