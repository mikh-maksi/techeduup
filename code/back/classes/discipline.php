<?php
    class discipline{
        var $id;
        var $name;
        var $link;
        var $year;
        var $materials_link;
        var $abatracts;
        var $comments;
        var $block;

    function init($id){
        include "config.php";
        include "connect.php";
        include "../functions.php";
        if(!isset($id)) $id = 0;

        if ($id == 0){
            $sql = 'SELECT MAX(id) as id FROM disciplines';   
            if ($result = $mysqli->query($sql)) {
                while($row = $result->fetch_array() ){$id = $row['id'];}                
          }
        }


        $sql = 'SELECT * FROM disciplines WHERE id = '.$id;   
          if ($result = $mysqli->query($sql)) {
            while($row = $result->fetch_array() ){
              $this->id=$row["id"];
              $this->name=$row["name"];
              $this->link=$row["link"];
              $this->year=$row["year"];
              $this->materials_link=$row["materials_link"];
              $this->abatracts=$row["abatracts"];
              $this->comments=$row["comments"];
              }}
    }

    function fileLog(){
        $fp = fopen("log_disciplines.txt", "a"); // Открываем файл в режиме записи 
        $mytext = $this->name." ".$this->link. "\r\n"; // Исходная строка
        $test = fwrite($fp, $mytext); // Запись в файл
        fclose($fp); //Закрытие файла
      
    }
        function jsonOut(){
        echo json_encode($this);
    }
    }
class disciplines{

    var $disciplines;
    function init($id){
        include "config.php";
        include "connect.php";
        include "../functions.php";
        if(!isset($id)) $id = 0;

        $d = array();
        $sql1 = 'SELECT * FROM disciplines WHERE eduprogram_id = '.$id;   
          if ($result = $mysqli->query($sql1)) {
            while($row = $result->fetch_array() ){
                $d1 = new discipline;
                $d1->init($row['id']);
                $d[] = $d1;
              }}

        $this->disciplines = $d;
    }
    function jsonOut(){
        echo json_encode($this);
    }
}