<?php

require 'lib.php';

$object = new CRUD();
// Design initial table header

if (isset($_POST['cat'])){

$catSel_=$_POST['cat'];
$cat_ = $object->total_por_categoria($catSel_);
//$catResult_ = $object->resultados_por_categoria($cat_);
//$result_cat = $object->resultados_por_categoria($catSel_);
//echo("<script>console.log('".$cat_."');</script>");
echo $cat_;
}


?>
