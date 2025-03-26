<?php
session_start(); // Iniciar a sessão para acessar as variáveis de sessão

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

$sql = "SELECT * FROM arquivos ORDER BY id DESC";

$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="postagens.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>sua postagens</title>
</head>
<body>
    <header class="w-full h-36">
        <div class="voltar"><a href="adm.php"><ion-icon name="arrow-undo-sharp"></ion-icon></a></div>
    </header>
<section>
    <div class="box">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="file-upload" class="none">Escolha uma imagem</label>
            <input type="file" name="arquivo" id="file-upload" class="imgs">
            <input type="text" name="titulo" id="titulo" value="titulo" class="titulo">
            <input type="text" name="texto" id="texto" value="texto" class="texto">
            <input type="date" name="data_post" id="data_post" value="data_post" class="data">
            <input type="submit" value="Enviar" class="submit" name="submit">
        </form>
    </div>
    <div class="box2">
        <h1>Gerenciamento de postagens</h1>
        <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imagem</th>
                <th scope="col">titulo</th>
                <th scope="col">texto</th>
                <th scope="col">data</th>
                <th scope="col">...</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($user_data = mysqli_fetch_assoc($resultado)){
                echo "<tr>";
                echo "<td>" .$user_data['id']. "</td>";
                echo "<td>" .$user_data['caminho']  . "</td>";
                echo "<td>" .$user_data['titulo']. "</td>";
                echo "<td>" .$user_data['texto']. "</td>";
                echo "<td>" .$user_data['data_post']. "</td>";
                echo "<td><a class='btn btn-sm btn-danger' href='delete.php?id=$user_data[id]'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
  <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5'/>
</svg>
</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    </div>

    </section>
    
</body>
</html>