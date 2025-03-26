<?php
session_start(); // Iniciar a sessão para acessar as variáveis de sessão

include_once('configuracao.php');

if (!isset($_SESSION['nome'])) {
    // Se não estiver logado, exibir o alerta e impedir o carregamento da página
    echo "<script>alert('Você precisa estar logado para acessar esta página!');</script>";
    // Opcionalmente, você pode redirecionar para a página de login com um pequeno atraso após o alerta
    echo "<script>setTimeout(function(){ window.location.href = 'login.php'; }, 1000);</script>";
    exit();
}

if(isset($_POST['submit'])){
    //print_r($_POST['estrela']);
    //print_r($_POST['user']);
    //print_r($_POST['texto']);

    $estrela = $_POST['estrela'];
    $user = $_POST['user'];
    $texto = $_POST['texto'];

    $result = mysqli_query($conexao, "INSERT INTO comentarios(qtd_estrela, nome_comentario, comentario) VALUES ('$estrela', '$user', '$texto')");
}

$sql = "SELECT * FROM comentarios ORDER BY id_comentario DESC";

$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="avaliacoes.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Avaliacoes InovaColor</title>
</head>
<body>
    <header class="w-full h-20">
        <div class="home">
        <a href="menu.php"><ion-icon name="home-outline"></ion-icon></a>
        <a href="principal.php"><ion-icon name="arrow-undo-outline" class="back"></ion-icon></a>
        </div>
    </header>
    <nav class="w-full h-60">
        <div class="logo"><img src="img/logo.png" alt=""></div>
        <div class="texto">
            <h1>Sua satisfacao</h1>
            <h2>1 a 5</h2>
            <div class="estrela1">
            <svg class="star1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>
            </div>
            <p>Compartilhe aqui sua experiencia e sugestoes sobre os servicos da InovaColor. Damos muita importancia a sua satisfacao!</p>
            <div class="avalie" onclick="avaliar()">
            <div class="botao"><button type="submit" onclick="avaliar()">Avaliar</button></div>
        </div>
        </div>

        <div class="bigstars">
        <svg class="bigstar" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>
        <svg class="bigstar" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>
        <svg class="bigstar" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>
        <svg class="bigstar" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>
        <svg class="bigstar" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>
            
        </div>
    </nav>

    <div class="caixinha" id="caixinha">
        <form action="avaliacoes.php" method="post" enctype="multipart/form-data">
            <div class="estrelas">
                <input type="radio" name="estrela" id="vazio" value="" checked>

                <label for="estrela_um"><svg class="star" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg></label>
                <input type="radio" name="estrela" id="estrela_um" value="1">

                <label for="estrela_dois"><svg class="star" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg></label>
                <input type="radio" name="estrela" id="estrela_dois" value="2">

                <label for="estrela_tres"><svg class="star" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg></label>
                <input type="radio" name="estrela" id="estrela_tres" value="3">

                <label for="estrela_quatro"><svg class="star" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg></label>
                <input type="radio" name="estrela" id="estrela_quatro" value="4">

                <label for="estrela_cinco"><svg class="star" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg></label>
                <input type="radio" name="estrela" id="estrela_cinco" value="5">
            </div>
            <div class="nome" class="nome">
                <input type="text" name="user" id="user" value="<?php echo isset($_SESSION['nome']) ? $_SESSION['nome'] : ''; ?>" 
                <?php echo isset($_SESSION['nome']) ? 'readonly' : ''; ?>>
            </div>
            <div class="comentario">
                <input type="text" name="texto" id="texto">
            </div>

            <div class="enviar"><input type="submit" name="submit" value="Enviar"></div>
        </form>
    </div>

    <section>
        <div class="avaliacoes">
            <?php
            while($user_data = mysqli_fetch_assoc($resultado)){
                echo "<div class='avaliacao'>";
                echo "<div class='perfil'>";
                echo "<div class='usuario'><span>" . $user_data['nome_comentario'] . "</span></div>";
                echo "</div>";
                echo "<div class='estrelinhas'>" . $user_data['qtd_estrela'] . "<svg class='star' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-star-fill' viewBox='0 0 16 16'>
                    <path d='M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z'/>
                    </svg></div>";
                echo "<div class='escrita'>" . $user_data['comentario'] . "</div></div>";
    
            }
            ?>
        </div>
    </section>

    <footer class="w-full h-32">
        &copy; Todos os direitos reservados. InovaColor
    </footer>
    
    <script src="avalie.js"></script>
</body>
</html>