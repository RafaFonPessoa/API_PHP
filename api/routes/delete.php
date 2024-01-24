<?php 
    if($acao == "" && $param == "") {echo json_encode(["ERROR" => "Caminho invalido"]);}

    if($acao == "deletar" && $param == "") {echo json_encode(["ERROR" => "Informe um cliente!"]);}

    if($acao == "deletar" && $param != "") {
        array_shift($_POST);

        $db = DB::connect();
        $rs = $db -> prepare("DELETE FROM clientes WHERE id = {$param}");
        $exec = $rs -> execute();
        
        if($exec) {
            echo json_encode(["Dados" => "Dados foram deletados com sucesso!"]);
        } else {
            echo json_encode(["Dados" => "Erro ao deletar dados!"]);
        }
    }