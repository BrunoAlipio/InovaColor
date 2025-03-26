<?php
session_start();
//print_r($_REQUEST);
echo "Email ou senha incorretos, por favor verifiqueos e tente novamente!";
if(isset($_POST['submit']) && !empty($_POST['emaillogin']) && !empty($_POST['senhalogin'])){

    include_once('configuracao.php');
    $email = $_POST['emaillogin'];
    $senha = $_POST['senhalogin'];

    //print_r($email);
    //print_r($senha);

    $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";

    $result = $conexao->query($sql);

    //print_r($sql);
    //print_r($result);

    if ($email == 'brunoadm@gmail.com' && $senha == '05adm.') {
        // Se for admin, redireciona para a página de administração
        $user = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $user['email'];
        $_SESSION['senha'] = $user['senha'];
        header('Location: adm.php');
        exit;
    } elseif (mysqli_num_rows($result) < 1) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        //criar alerta window
    } else{
        $user = mysqli_fetch_assoc($result);

        $_SESSION['id'] = $user['id_usuario'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['senha'] = $user['senha'];
        $_SESSION['nome'] = $user['nome'];
        $_SESSION['numero'] = $user['contato'];
        $_SESSION['nasc'] = $user['data_nasc'];

        header('Location: menu.php');
    }
} else{
    header('Location: login.php');
}
?>