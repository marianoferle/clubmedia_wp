<?php

require 'lib.php';

$object = new CRUD();
// Design initial table header
$data = '';
$catSel_='';
$miArray ='';

if (isset($_POST['cat'])) {

    $catSel_ = $_POST['cat'];
    //echo $catSel_;

    $users = $object->categoria_seleccionada($catSel_);

    if(count($users) > 0){
        foreach ($users as $user) {
            $subCat_ = explode(",", $user['subCat']);
            $miArray= array(
                "id"=>$user['id'],
                "categoria"=>$user['categoria'],
                "info_cat"=>$user['info_cat'],
                "colorFondo"=>$user['colorFondo'],
                "colorTexto"=>$user['colorTexto'],
                "imgCategoria"=>$user['imgCategoria'],
                "subCat"=>$subCat_
            );
        }

        $data= json_encode($miArray, JSON_UNESCAPED_UNICODE);

        echo $data;

    }else{

    echo "no hay resultados";

    }

}



?>
