<?php

require("./funcao.php");

$idFuncionario = $_GET["id"];

deletarFuncionario("empresaX.json", $idFuncionario);

header("location: index.php");