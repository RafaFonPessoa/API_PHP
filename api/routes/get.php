<?php 
    if($acao == "" && $param == "") {echo json_encode(["ERROR" => "Caminho invalido"]);}
    
    if($acao == "lista" && $param == "") { 
        $db = DB::connect();
        $rs = $db -> prepare("SELECT * FROM clientes ORDER BY nome");
        $rs -> execute();
        $obj = $rs->fetchAll(PDO::FETCH_ASSOC);

        if($obj) {
            echo json_encode(["Dado" => $obj]);
        } else {
            echo json_encode(["Dado" => "Nao ha dados"]);
        }
    }

    if($acao == "lista" && $param != "") { 
        $db = DB::connect();
        $rs = $db -> prepare("SELECT * FROM clientes WHERE id = $param");
        $rs -> execute();
        $obj = $rs->fetchAll(PDO::FETCH_ASSOC);


        if($obj) {
            echo json_encode(["Dado" => $obj]);
        } else {
            echo json_encode(["Dado" => "Nao ha dados"]);
        }
    }