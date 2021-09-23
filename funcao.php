<?php

function lerArquivo($nomeArquivo) {
    $arquivo = file_get_contents($nomeArquivo);
    $listaJson = json_decode($arquivo);

    return $listaJson;
}

function buscarFuncionarios($funcionarios, $first_name) {
    $filtroFuncionarios = [];

    foreach ($funcionarios as $funcionario) {
        if (
            strpos($funcionario->first_name, $first_name) !== false
            ||
            strpos($funcionario->last_name, $first_name) !== false
            ||
            strpos($funcionario->department, $first_name) !== false
        ) {
            $filtroFuncionarios[] = $funcionario;
        }
    }

    return $filtroFuncionarios;
}

function adicionarFuncionario($nomeArquivo, $novoFuncionario) {
    $funcionarios = lerArquivo($nomeArquivo);

    $funcionarios[] = $novoFuncionario;

    $json = json_encode($funcionarios);

    file_put_contents($nomeArquivo, $json);
}

function deletarFuncionario($nomeArquivo, $idFuncionario) {
    
    $funcionarios = lerArquivo($nomeArquivo);
    
    foreach($funcionarios as $chave => $funcionario) {
        if($funcionario->id == $idFuncionario) {
            unset($funcionarios[$chave]);
        }
    }

    $json = json_encode(array_values($funcionarios));

    file_put_contents($nomeArquivo, $json);

}

function buscarFuncionarioPorId($nomeArquivo, $idFuncionario) {

    $funcionarios = lerArquivo($nomeArquivo);

    foreach ($funcionarios as $funcionario) {
        
        if ($funcionario->id) {
            return $funcionario;     
        }

    }

}

function editarFuncionario($nomeArquivo, $funcionarioEditado) {

    $funcionarios = lerArquivo($nomeArquivo);

    foreach ($funcionarios as $chave => $funcionario) {
        if ($funcionario->id == $funcionarioEditado['id']) {
            $funcionarios[$chave] = $funcionarioEditado;
        }
    }

    $json = json_encode(array_values($funcionarios));

    file_put_contents($nomeArquivo, $json);

}

function realizarLogin($usuario, $senha, $dados) {
    
}