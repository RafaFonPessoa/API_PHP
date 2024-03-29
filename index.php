<?php 
    header("Access-Control-Allow-Origin: *");
    header("Content-type: application/json");

    date_default_timezone_set("America/Fortaleza");

    if(isset($_GET['path'])){
        $path = explode("/", $_GET['path']);
    } else {
        echo "Caminho não existe"; exit;
    }

    if(isset($path[0])) {$api = $path[0];} else {echo "Caminho não encontrado"; exit;}
    if(isset($path[1])) {$acao = $path[1];} else {$acao = "";}
    if(isset($path[2])) {$param = $path[2];} else {$param = "";}

    $method = $_SERVER["REQUEST_METHOD"];

    include_once "api/db/db.class.php";
    include_once "api/routes/routes.php";