<?php
session_start(); // Iniciar a sessão para acessar as variáveis de sessão

if (!isset($_SESSION['nome'])) {
    // Se não estiver logado, exibir o alerta e impedir o carregamento da página
    echo "<script>alert('Você precisa estar logado para acessar esta página!');</script>";
    // Opcionalmente, você pode redirecionar para a página de login com um pequeno atraso após o alerta
    echo "<script>setTimeout(function(){ window.location.href = 'login.php'; }, 1000);</script>";
    exit();
}

$id = @$_SESSION['id'];

// Conexão com o banco de dados
$servername = "localhost"; // ou o endereço do seu servidor
$username = "root";        // seu usuário de banco de dados
$password = "";            // sua senha de banco de dados
$dbname = "bd_InovaColor";     // o nome do seu banco de dados

// Criação da conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if(isset($_POST['submit'])){

$nome = $_POST['nome'];
$cep = $_POST['cep'];
$bairro = $_POST['bairro'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$dia = $_POST['dia'];
$hora = $_POST['hora'];
$usuario = $_POST['id'];

// Preparando a query de inserção
$sql = "INSERT INTO agendamento (nome, cep, bairro, rua, numero, dia, hora, usuario) 
        VALUES ('$nome', '$cep', '$bairro', '$rua', '$numero', '$dia', '$hora', '$usuario')";

// Executando a query
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Agendamento efetuado com sucesso!');</script>";
    echo "<script>setTimeout(function(){ window.location.href = 'menu.php'; }, 1000);</script>";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

// Fechando a conexão
$conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="agenda.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Agenda InovaColor</title>
</head>
<body>
    <header class="w-full h-32">
        <div class="home">
        <a href="menu.php"><ion-icon name="home-outline"></ion-icon></a>
        </div>
    </header>

    <section>
        <form action="agendar.php" method="post">
            <fieldset>
                <legend>AGENDA</legend>
                        <div class="inpu">
                        <input type="text" name="nome" id="nome" value="<?php echo isset($_SESSION['nome']) ? $_SESSION['nome'] : ''; ?>" 
                        <?php echo isset($_SESSION['nome']) ? 'readonly' : ''; ?>>
                        <label for="nome">Nome:</label>
                        </div>
                        <div class="inpu">
                        <input type="text" name="cep" id="cep">
                        <label for="cep">CEP:</label>
                        </div>
                        <div class="inpu">
                        <input type="text" name="bairro" id="bairro">
                        <label for="bairro">Bairro:</label>
                        </div>
                        <div class="inpu">
                            <input type="text" name="rua" id="rua">
                            <label for="rua">Rua:</label>
                        </div>
                        <div class="inpu">
                            <input type="text" name="numero" id="numero">
                            <label for="numero">N°:</label>
                        </div>
                        <div class="inpu">
                        <input type="date" name="dia" id="dia">
                        <label for="dia">Dia:</label>
                        </div>
                        <div class="inpu">
                            <input type="time" name="hora" id="hora">
                            <label for="hora">Hora:</label>
                        </div>
                        <div class="inpu hidden">
                            <input type="number" name="id" id="id" value="<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : ''; ?>" 
                            <?php echo isset($_SESSION['id']) ? 'readonly' : ''; ?>>
                        </div>
                        <div class="botoes">
                            <div class="botao">
                                <input type="reset" value="Apagar">
                            </div>
                            <div class="botao">
                            <input type="submit" name="submit" value="Enviar" class="envio2">
                            </div>
                        </div>
            </fieldset>
        </form>
    </section>

    <footer class="w-full h-32">
        &copy; Todos os direitos reservados. InovaColor
    </footer>
</body>
</html>