<?php
    include("classes/program.php");
    $id = $_GET["id"];

    //$eduprgrm = new eduprogram;
    //$eduprgrm->init($id);
   
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json; charset=utf-8');
    
    //$discipl->fileLog();
    //$eduprgrm->jsonOut();

   //print(json_encode($discipls));

    $eduprgrms = new eduprograms;
    $eduprgrms->init($id);
    $eduprgrms->jsonOut();
?>