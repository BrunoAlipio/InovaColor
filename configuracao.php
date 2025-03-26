<?php

$dbHost = 'Localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'bd_InovaColor';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

/*if($conexao->connect_errno){
    echo "Erro ao se conectar ao banco de dados";
} else{
    echo "Conexao efetuada com sucesso";
}*/
?>