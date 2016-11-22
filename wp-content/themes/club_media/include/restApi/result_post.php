<?php

require 'lib.php';

$object = new CRUD();
// Design initial table header
$data = '';
$catSel_='';
$miArray =[];
$users=[];

if (isset($_POST['id'])&&isset($_POST['hora'])) {

  $id_ = $_POST['id'];
  $hora_ = $_POST['hora'];
  //echo $catSel_;
  $users = $object->resultados_por_categoria_y_subcategoria($id_,$hora_);
  echo $users;

}


//----------------


?>
