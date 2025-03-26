<?php
session_start();
include_once('configuracao.php');

// Definindo as credenciais específicas
$valid_email = "brunoadm@gmail.com";  // O email que pode acessar a página
$valid_password = "05adm.";           // A senha que pode acessar a página

// Verificando se a sessão existe e se as credenciais são válidas
if ((!isset($_SESSION['email']) || $_SESSION['email'] != $valid_email) || 
    (!isset($_SESSION['senha']) || $_SESSION['senha'] != $valid_password)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: menu.php');  // Redireciona para a página inicial ou de login
    exit();
}

$sql = "SELECT * FROM agendamento ORDER BY id_agenda DESC";

$resultado = $conexao->query($sql);

$logado = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adm.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Consulta adm</title>
</head>
<body>

    <a href="postagens.php"><button class="postar" type="submit">Publicacoes</button></a>
<div class="h1">Esses sao os seus agendamentos</div>

<div class="Consulta">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">nome</th>
                <th scope="col">cep</th>
                <th scope="col">bairro</th>
                <th scope="col">rua</th>
                <th scope="col">numero</th>
                <th scope="col">dia</th>
                <th scope="col">hora</th>
                <th scope="col">usuario</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($user_data = mysqli_fetch_assoc($resultado)){
                echo "<tr>";
                echo "<td>" .$user_data['id_agenda']. "</td>";
                echo "<td>" .$user_data['nome']. "</td>";
                echo "<td>" .$user_data['cep']. "</td>";
                echo "<td>" .$user_data['bairro']. "</td>";
                echo "<td>" .$user_data['rua']. "</td>";
                echo "<td>" .$user_data['numero']. "</td>";
                echo "<td>" .$user_data['dia']. "</td>";
                echo "<td>" .$user_data['hora']. "</td>";
                echo "<td>" .$user_data['usuario']. "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<footer class="h-32 bg-red-800 text-center text-white">
        <div class="textin">
            &copy; Todos os direitos reservados. InovaColor
        </div>
    </footer>

</body>
</html>