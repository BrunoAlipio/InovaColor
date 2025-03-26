<?php
session_start(); // Iniciar a sessão para acessar as variáveis de sessão

include_once('configuracao.php');

$sql = "SELECT * FROM arquivos ORDER BY id DESC";

$resultado = $conexao->query($sql);

$contador = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="principal.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Publicacoes InovaColor</title>
</head>
<body>
    <header class="w-full h-32">
        <div class="home">
        <a href="menu.php"><ion-icon name="home-outline"></ion-icon></a>
        </div>
    </header>

    <section class="geral">
        <!-- Area dedicada a postagens mais recentes -->
        <div class="recentes">
            <h1>Publicacoes recentes</h1>
            <div class="pubs">
            <?php
            while($user_data = mysqli_fetch_assoc($resultado)){
                if ($contador >= 2) {
                    break; // Sai do loop após 2 postagens
                }
                ?>
            <div class="pub">
                <div class="titulo"><h2><?php echo $user_data['titulo']; ?></h2></div>
                <div class="imagem"><img src="<?php echo $user_data['caminho']; ?>" alt=""></div>
                <div class="texto"><p><?php echo $user_data['texto']; ?></p></div>
                <div class="data">Publicado em: <span><?php echo $user_data['data_post']; ?></span></div>
            </div>
            <?php 
            $contador++;
             } ?>
            </div>
        </div>

        <!-- Area dedicada a postagens escolhidas pelo adm para ser destaques -->
        <div class="destaques">
            <h1>Publicacoes em destaque:</h1>
        <div class="destaque">
                <div class="ilustracao"><img src="img/publicacao1.jpg" alt=""></div>
            <div class="minitexto"><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p></div>
            <span>05-11-2024</span>
        </div>
        <div class="destaque">
            <div class="ilustracao"><img src="img/publicacao2.jpg" alt=""></div>
        <div class="minitexto"><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p></div>
        <span>05-05-2024</span>
        </div>
        <div class="destaque">
            <div class="ilustracao"><img src="img/publicacao3.jpg" alt=""></div>
        <div class="minitexto"><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p></div>
        <span>02-06-2023</span>
        </div>
        <div class="destaque">
            <div class="ilustracao"><img src="img/publicacao4.jpg" alt=""></div>
        <div class="minitexto"><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p></div>
        <span>13-01-2025</span>
        </div>
        <div class="destaque">
            <div class="ilustracao"><img src="img/publicacao5.jpg" alt=""></div>
        <div class="minitexto"><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p></div>
        <span>26-02-2025</span>
        </div>
        <!-- Página que mostra todas as publicacoes -->
         <div class="verTudo">
            <a href="todas.php"><svg class="link1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
  <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
</svg></a>
         </div>
         <div class="avaliacoes">
            <a href="avaliacoes.php"><ion-icon name="chatbox-ellipses" class="link2"></ion-icon></a>
         </div>
        </div>
    </section>

    <footer class="w-full h-28">
    <div class="textin">
            &copy; Todos os direitos reservados. InovaColor
        </div>
    </footer>
</body>
</html>