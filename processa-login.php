<?php

    // inicializa a sessão para processo de login
    session_start();

    // importação do arquivo de funções
    require_once('./funcao.php');

    // recebendo os dados do formulario
    if(isset($_POST['txt_usuario']) || isset($_POST['txt_senha'])) {

        $usuario = $_POST['txt_usuario'];
        $senha = $_POST['txt_senha'];
    
        realizarLogin($usuario, $senha, lerArquivo('./dados/usuarios.json'));

    } elseif ($_GET['logout']) {

        finalizarLogin();

    }

?>