<?php

if (!empty($_GET['id'])) {
    include_once('configuracao.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM arquivos WHERE id =  $id";

    $resultado = $conexao->query($sqlSelect);

    if ($resultado->num_rows > 0) {
        $sqlDelete = "DELETE FROM arquivos where id = $id";
        $resultadoDelete = $conexao->query($sqlDelete);
    }
}

header('Location: postagens.php');
?>