<?php
class eduprogram{
    var $id;
    var $speciality;
    var $name;
    var $link;
    var $department_name;
    var $department_link;
    var $vstup_link;
    var $licence;
    var $n;
    var $n_bugjet;
    var $n_contract;
    var $price;
    var $garant;
    function init($id){
        include "config.php";
        include "connect.php";
        include "../functions.php";
        if(!isset($id)) $id = 0;

        if ($id == 0){
            $sql = 'SELECT MAX(id) as id FROM eduprogram';   
            if ($result = $mysqli->query($sql)) {
                while($row = $result->fetch_array() ){$id = $row['id'];}                
          }
        }

        $sql = 'SELECT * FROM eduprogram WHERE id = '.$id;   
          if ($result = $mysqli->query($sql)) {
            while($row = $result->fetch_array() ){
              $this->id=$row["id"];
              $this->speciality=$row["speciality"];
              $this->name=$row["name"];
              $this->link=$row["link"];
              $this->department_name=$row["department_name"];
              $this->department_link=$row["department_link"];
              $this->vstup_link=$row["vstup_link"];
              $this->licence=$row["licence"];
              $this->n=$row["n"];
              $this->n_bugjet=$row["n_bugjet"];
              $this->n_contract=$row["n_contract"];
              $this->price=$row["price"];
              $this->garant=$row["garant"];
              }}
    }

    function jsonOut(){
        echo json_encode($this);
    }
}
class eduprograms{
    var $eduprograms;
    function init($id){
        include "config.php";
        include "connect.php";
        include "../functions.php";
        if(!isset($id)) $id = 0;

        $d = array();
        $sql1 = 'SELECT * FROM eduprogram';   
          if ($result = $mysqli->query($sql1)) {
            while($row = $result->fetch_array() ){
                $d1 = new eduprogram;
                $d1->init($row['id']);
                $d[] = $d1;
              }}

        $this->eduprograms = $d;
    }
    function jsonOut(){
        echo json_encode($this);
    }



}


?>