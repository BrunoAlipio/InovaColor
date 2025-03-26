<?php
if(isset($_POST['submit'])){
  /*print_r($_POST['nome']);
    print_r($_POST['email']);
    print_r($_POST['senha']);
    print_r($_POST['numero']);
    print_r($_POST['nasc']);*/

    include_once('configuracao.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $numero = $_POST['numero'];
    $nasc = $_POST['nasc'];

    $result = mysqli_query($conexao, "INSERT INTO usuario(nome, email, senha, contato, data_nasc) VALUES ('$nome', '$email', '$senha', '$numero', '$nasc')");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Login HermeSport</title>
</head>
<body>

    <header class="w-full h-32">
        <div class="home">
        <a href="menu.php"><ion-icon name="home-outline"></ion-icon></a>
        </div>
    </header>

    <div class="box">
        
        <!-- parte de login -->
        <form action="testeLogin.php" method="post">
            <div class="login" id="login">
                <div class="campo">
                    <input type="email" name="emaillogin" id="emaillogin" required>
                    <label for="emaillogin">email:</label>
                </div>
                <div class="campo">
                    <input type="password" name="senhalogin" id="senhalogin" required>
                    <label for="senhalogin">senha:</label>
                </div>
                <div class="campo">
                <input type="submit" name="submit" value="enviar" class="envio">
                </div>
            </div>
        </form>

        <!-- parte de cadastro -->
         <form action="login.php" method="post">
            <div class="cadastro" id="cadastro">
                <div class="campo2">
                    <input type="text" name="nome" id="nome" required>
                    <label for="nome" class="label">nome:</label>
                </div>
                <div class="campo2">
                    <input type="email" name="email" id="email" required>
                    <label for="email" class="label">email:</label>
                </div>
                <div class="campo2">
                    <input type="password" name="senha" id="senha" required>
                    <label for="senha" class="label">senha:</label>
                </div>
                <div class="campo2">
                    <input type="number" name="numero" id="numero" required>
                    <label for="numero" class="label">Seu whatsapp:</label>
                </div>
                
                <div class="campo2">
                    <input type="date" name="nasc" id="nasc" required>
                    <label for="nasc" class="nasc">data de nascimento:</label>
                </div>
                <div class="campo2">
                    <input type="submit" name="submit" value="enviar" class="envio2">
                </div>
            </div>
         </form>
         <div class="laranja" id="laranja">
            <div class="parede"><img src="img/logo.png" alt=""></div>
            <div class="botao1">
                <button type="submit" class="cadastrar" id="cadastrar" onclick="abreCadastro()">CADASTRAR</button>
                <button type="submit" class="logar" id="logar" onclick="abreLogin()">LOGAR</button>
            </div>
         </div>
    </div>

    <footer class="w-full h-32">
        &copy; Todos os direitos reservados. InovaColor
    </footer>
    
    <script src="login.js"></script>
</body>
</html>