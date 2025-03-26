<?php
session_start(); // Iniciar a sessão para acessar as variáveis de sessão

include_once('configuracao.php');

$sql = "SELECT * FROM arquivos ORDER BY id DESC";

$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="todas.css">
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
        <a href="principal.php"><ion-icon name="arrow-undo-outline" class="back"></ion-icon></a>
        </div>
    </header>

    <section>
        <div class="mapa">
            <h1>Localizacao:</h1>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3535.522012721772!2d-48.45595142524477!3d-27.60834502262656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95273e9be942926d%3A0x8557f880f784f1e8!2sAv.%20das%20Rendeiras%20-%20Lagoa%20da%20Concei%C3%A7%C3%A3o%2C%20Florian%C3%B3polis%20-%20SC%2C%2088062-400!5e0!3m2!1spt-BR!2sbr!4v1742866013089!5m2!1spt-BR!2sbr" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="publicacoes">
            <?php
            while($user_data = mysqli_fetch_assoc($resultado)){
                ?>
            
            <div class="publicacao">
                <div class="titulo"><h2><?php echo $user_data['titulo']; ?></h2></div>
                <div class="imagem"><img src="<?php echo $user_data['caminho']; ?>" alt=""></div>
                <div class="texto"><p><?php echo $user_data['texto']; ?></p></div>
                <div class="data">Publicado em: <span><?php echo $user_data['data_post']; ?></span></div>
            </div>
            <?php } ?>
        </div>
    </section>

    <footer class="w-full h-28">
    <div class="textin">
            &copy; Todos os direitos reservados. InovaColor
        </div>
    </footer>
</body>
</html>