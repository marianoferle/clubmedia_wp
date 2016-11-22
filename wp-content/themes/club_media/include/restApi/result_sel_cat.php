<?php

require 'lib.php';

$object = new CRUD();
// Design initial table header
$data = '';
$catSel_='';
$miArray =[];
$users=[];

if (isset($_POST['sub'])&&isset($_POST['cat'])) {
  $subSel_ = $_POST['sub'];
  $catSel_ = $_POST['cat'];
  //echo $catSel_;
  $users = $object->resultados_por_categoria_y_subcategoria($catSel_,$subSel_);
  echo $users;

}else if (isset($_POST['cat'])) {
  $catSel_ = $_POST['cat'];
  //echo $catSel_;
  $users = $object->resultados_por_categoria($catSel_); //console.log($users.length);
  echo $users;
}


//----------------


?>
