<?php
    include("classes/discipline.php");
    $id = $_GET["id"];

    $discipl = new discipline;
    $discipl->init($id);
   
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json; charset=utf-8');
    
    //$discipl->fileLog();
    //$discipl->jsonOut();

   //print(json_encode($discipls));

    $dspls = new disciplines;
    $dspls->init($id);
    $dspls->jsonOut();

?>