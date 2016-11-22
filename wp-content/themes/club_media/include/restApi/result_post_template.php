<?php

require 'lib.php';

$object = new CRUD();
// Design initial table header
$data = '';
$catSel_='';
$miArray =[];
$users=[];

if (isset($_POST['id']) && isset($_POST['hora'])) {

  $id_ = $_POST['id'];
  $hora_ = $_POST['hora'];
  //echo $catSel_;
  $users = $object->resultados_post($id_,$hora_);


  //echo $users;
if(count($users) > 0){

          $categorias_ = explode(",", $users[0]['categorias']);
          $subCat_ = explode(",", $users[0]['subCat']);
          $autores_ = explode(",", $users[0]['autores']);


          $miArray= array(
              "id"=>$users[0]['id'],
              "dia_id"=>$users[0]['dia_id'],
              "hora_id"=>$users[0]['hora_id'],
              "autores"=>$autores_,
              "titulo"=>$users[0]['titulo'],
              "subTit"=>$users[0]['subTit'],
              "info"=>$users[0]['info'],
              "masInfo"=>$users[0]['masInfo'],
              "urlVideo"=>$users[0]['urlVideo'],
              "srcImg"=>$users[0]['urlImgVid'],
              "categoria"=>$categorias_,
              "subCat"=>$subCat_
          );


     //$data= json_encode($users[0], JSON_UNESCAPED_UNICODE);
     $data= json_encode($miArray, JSON_UNESCAPED_UNICODE);
     //print_r($data);
     echo $data;
}

}


//----------------


?>
