<?php

require __DIR__ . '/db_connection.php';
class CRUD{

    protected $db;

    function __construct(){ $this->db = DB(); }
    function __destruct(){ $this->db = null; }



    //----------------lista de youtubers con la informacion para usar con wordpress----------------
    public function total_youtubers(){
        $query = $this->db->prepare("SELECT * FROM youtubers");
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



    //-----------------busca categorias para usar la informacion complementaria junto a wordpress----------------
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







}
?>
