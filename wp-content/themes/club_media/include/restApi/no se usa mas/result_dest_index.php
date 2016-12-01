<?php

require 'lib.php';

$object = new CRUD();
// Design initial table header

$users=[];


  $users = $object->resultados_destacados_en_index();
  echo $users;


//----------------


?>
