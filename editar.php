<?php

    require("./funcao.php");

    $funcionarioId = $_GET['id'];

    $funcionario = buscarFuncionarioPorId("./empresaX.json", $funcionarioId);


?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="./script.js" defer></script>
    <title>Empresa X</title>
</head>

<body>
    <div class="container-form">
        <form id="form-funcionario" action="acaoEditar.php" method="POST">
            <?php
            if (!$funcionario) echo "<h1>Funcionário não encontrado</h1>";
            else {
            ?>
                <h1 style="color: white; margin-bottom: 2px; font-size: 30px; font-weight: 100;">Editar funcionário</h1>
                <input type="hidden" placeholder="Digite o id" name="id" value="<?= $funcionario->id ?>"/>
                <input type="text" style="width: 300px;" placeholder="Digite o primeiro nome" name="first_name" value="<?= $funcionario->first_name ?>"/>
                <input type="text" style="width: 300px;" placeholder="Digite o sobrenome" name="last_name" value="<?= $funcionario->last_name ?>"/>
                <input type="text" style="width: 300px;" placeholder="Digite o e-mail" name="email" value="<?= $funcionario->email ?>"/>
                <input type="text" style="width: 300px;" placeholder="Digite o sexo" name="gender" value="<?= $funcionario->gender ?>"/>
                <input type="text" style="width: 300px;" placeholder="Digite o IP" name="ip_address" value="<?= $funcionario->ip_address ?>"/>
                <input type="text" style="width: 300px;" placeholder="Digite o país" name="country" value="<?= $funcionario->country ?>"/>
                <input type="text" style="width: 300px;" placeholder="Digite o departamento" name="department" value="<?= $funcionario->department ?>"/>
                <button style="width: 100px; height: 33px; margin-top: 5px; background-color: rgb(106, 139, 141); color: white; font-size: 19px; border: 2px solid rgb(48, 95, 97);">Salvar</button>
            <?php } ?>
        </form>
    </div>
</body>

</html>