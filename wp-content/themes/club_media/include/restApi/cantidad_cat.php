<?php

require 'lib.php';

$object = new CRUD();
// Design initial table header


$cat_ = $object->categorias_tipos();
//$catResult_ = $object->resultados_por_categoria($cat_);
//$result_cat = $object->resultados_por_categoria($catSel_);
//echo("<script>console.log('".$cat_."');</script>");
echo $cat_;



?>
