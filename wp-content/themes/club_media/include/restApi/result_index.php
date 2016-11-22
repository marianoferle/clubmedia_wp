<?php

require 'lib.php';

$object = new CRUD();
// Design initial table header

$users=[];

if (isset($_POST['pos'])) {
  $posi_ = $_POST['pos'];
  $users = $object->resultados_index($posi_);

}

  echo $users;

//----------------


?>
