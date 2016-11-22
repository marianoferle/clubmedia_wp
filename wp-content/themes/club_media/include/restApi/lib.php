<?php

require __DIR__ . '/db_connection.php';

class CRUD{

    protected $db;

    function __construct(){ $this->db = DB(); }
    function __destruct(){ $this->db = null; }




    //-----------------resultados index----------------
    public function resultados_index($posi_){
        $pos=$posi_;
        $query = $this->db->prepare("SELECT * FROM lista_videos WHERE id >$pos AND id <=$pos+10 ORDER BY id ASC ");
        $query->execute();
        $data = array();
        while ($row = $query->fetchAll(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        $dat_= json_encode($data, true);
        //WHERE ROWNUM <= 10 order by lista_videos desc
        //SELECT * FROM lista_videos
        return $dat_;
    }


    //-----------------resultados destacados en index----------------
    public function resultados_destacados_en_index(){
        $query = $this->db->prepare("SELECT * FROM lista_videos WHERE destacado_activo=1 ORDER BY destacado_posicion ASC");
        $query->execute();
        $data = array();
        while ($row = $query->fetchAll(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        $dat_= json_encode($data[0], true);
        return $dat_;
    }



    //-----------------busca categoria seleccionada----------------
    public function resultados_por_categoria($catSel_){
        $query = $this->db->prepare("SELECT * FROM lista_videos WHERE categorias LIKE '%{$catSel_}%' ");
        $query->execute();
        $data = array();
        while ($row = $query->fetchAll(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        $dat_= json_encode($data, true);
        return $dat_;
    }


    //-----------------busca categoria seleccionada----------------
    public function resultados_por_categoria_y_subcategoria($catSel_,$subSel_){
        $query = $this->db->prepare("SELECT * FROM lista_videos WHERE categorias LIKE '%{$catSel_}%' AND subCat LIKE '%{$subSel_}%' ");
        $query->execute();
        $data = array();
        while ($row = $query->fetchAll(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        $dat_= json_encode($data, true);
        return $dat_;
    }



    //---------------------------------
    public function resultados_post($id_,$hora_){
        $query = $this->db->prepare("SELECT * FROM lista_videos WHERE dia_id = '{$id_}' AND hora_id ='{$hora_}' ");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
      //  $dat_= json_encode($data, true);
      //  print_r($dat_);
        return $data;
    }








    //-----------------busca categoria seleccionada----------------
    public function categorias_tipos(){
        $query = $this->db->prepare("SELECT * FROM categorias");
        $query->execute();
        $data = array();
        while ($row = $query->fetchAll(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        $dat_= json_encode($data[0], true);
        return $dat_;
    }



    //-----------------busca categoria seleccionada----------------
    public function categoria_seleccionada($catSel_){
        $query = $this->db->prepare("SELECT * FROM categorias WHERE categoria = '$catSel_'");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        //$dat_= json_encode($data, true);
        return $data;

    }



    //-----------------busca categoria seleccionada----------------
    public function total_por_categoria($catSel_){
        $query = $this->db->prepare("SELECT * FROM lista_videos WHERE categorias LIKE '%{$catSel_}%' ");
        $query->execute();
        $data = array();
        while ($row = $query->fetchAll(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

       $dat_= count($data[0]);
       return $dat_;

    }





























    public function Create($first_name, $last_name, $email){
        $query = $this->db->prepare("INSERT INTO users(first_name, last_name, email) VALUES (:first_name,:last_name,:email)");
        $query->bindParam("first_name", $first_name, PDO::PARAM_STR);
        $query->bindParam("last_name", $last_name, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        return $this->db->lastInsertId();
    }

    public function Delete($user_id){
        $query = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $query->bindParam("id", $user_id, PDO::PARAM_STR);
        $query->execute();
    }

    public function Update($first_name, $last_name, $email, $user_id){
        $query = $this->db->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email  WHERE id = :id");
        $query->bindParam("first_name", $first_name, PDO::PARAM_STR);
        $query->bindParam("last_name", $last_name, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("id", $user_id, PDO::PARAM_STR);
        $query->execute();
    }

    public function Details($user_id){
        $query = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $query->bindParam("id", $user_id, PDO::PARAM_STR);
        $query->execute();
        return json_encode($query->fetch(PDO::FETCH_ASSOC));
    }
}

?>
