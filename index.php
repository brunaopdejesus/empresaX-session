<?php

require("./funcao.php");
$funcionarios = lerArquivo("empresaX.json");

if (isset($_GET["buscarFuncionario"])) {
    $funcionarios = buscarFuncionarios($funcionarios, $_GET["buscarFuncionario"]);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>

    <title>Empresa X</title>
</head>

<body>

    <header>
        <h1 class="primeiro-titulo">Funcionários da Empresa X</h1>
        <?php
        $count = 0;
        foreach ($funcionarios as $funcionario) {
            if ($funcionario == true) {
                $count++;
            }
        }
        echo "A empresa conta com $count funcionários";
        ?>
    </header>

    <main>
        <form>
            <label for="">Pesquisa por nome:</label>
            <div class="div-form">
                <input type="text" value="<?= isset($_GET["buscarFuncionario"]) ? $_GET["buscarFuncionario"] : "" ?>" name="buscarFuncionario" id="buscarFuncionario" placeholder="Digite o nome...">
                <button id="btn-search" class="btn"><i class="fa fa-search"></i></button>
            </div>
        </form>

        <div class="buttons">
            <button id="addFuncionario">Adicionar funcionário</button>
        </div>

        <div class="modal-form">
            <form id="form-funcionario" action="acoes.php" method="POST">
                <h1 class="h1-form-modal">Adicionar funcionário:</h1>
                <input class="inputForm" type="text" name="id" placeholder="Digite o id...">
                <input class="inputForm" type="text" name="first_name" placeholder="Digite o primeiro nome...">
                <input class="inputForm" type="text" name="last_name" placeholder="Digite o sobrenome...">
                <input class="inputForm" type="text" name="email" placeholder="Digite o email...">
                <input class="inputForm" type="text" name="gender" placeholder="Digite o gênero...">
                <input class="inputForm" class="inputForm" type="text" name="ip_address" placeholder="Digite o IP...">
                <input class="inputForm" type="text" name="country" placeholder="Digite o país...">
                <input class="inputForm" type="text" name="department" placeholder="Digite o departamento...">
                <button class="btnSalvar">Salvar</button>
            </form>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last name</th>
                <th>E-mail</th>
                <th>Gender</th>
                <th>IP Address</th>
                <th>Country</th>
                <th>Departament</th>
                <th>Actions</th>
            </tr>

            <?php
            foreach ($funcionarios as $funcionario) :
            ?>

                <tr>
                    <td> <?= $funcionario->id; ?> </td>
                    <td> <?= $funcionario->first_name; ?> </td>
                    <td> <?= $funcionario->last_name; ?> </td>
                    <td> <?= $funcionario->email; ?> </td>
                    <td> <?= $funcionario->gender; ?> </td>
                    <td> <?= $funcionario->ip_address; ?> </td>
                    <td> <?= $funcionario->country; ?> </td>
                    <td> <?= $funcionario->department; ?> </td>
                    <td>
                        <button 
                            onclick="editar(<?= $funcionario->id ?>)" 
                            class="btn" 
                            id="editFuncionario">
                            <i class="fa fa-pencil"></i>
                        </button>

                        <button 
                            onclick="deletar(<?= $funcionario->id ?>)" 
                            class="btn" 
                            id="deleteFuncionario">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>

            <?php
            endforeach;
            ?>

        </table>
    </main>

    <footer>
        <p>Copyright &copy; Bruna Oliveira</p>
    </footer>

</body>

</html>