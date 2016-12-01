<?php

require 'lib.php';

$object = new CRUD();
// Design initial table header

$users=[];
$users = $object->total_youtubers();
echo $users;

//----------------


?>
