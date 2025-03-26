<?php
// Verifica se o arquivo foi enviado
if (isset($_FILES['arquivo'])) {
    // Pega as informações do arquivo
    $arquivo = $_FILES['arquivo'];
    $nomeArquivo = $arquivo['name'];
    $tipoArquivo = $arquivo['type'];
    $tamanhoArquivo = $arquivo['size'];
    $caminhoTemporario = $arquivo['tmp_name'];

    // Defina o diretório onde o arquivo será armazenado
    $diretorioDestino = "uploads/";

    // Crie o diretório caso não exista
    if (!is_dir($diretorioDestino)) {
        mkdir($diretorioDestino, 0777, true);
    }

    // Defina o caminho completo do arquivo no servidor
    $caminhoFinal = $diretorioDestino . basename($nomeArquivo);

    // Verifica se o arquivo foi movido com sucesso para o diretório
    if (move_uploaded_file($caminhoTemporario, $caminhoFinal)) {
        echo "Arquivo enviado com sucesso!";

        // Agora, vamos salvar as informações no banco de dados
        salvarNoBancoDeDados($nomeArquivo, $caminhoFinal, $tipoArquivo, $tamanhoArquivo);
    } else {
        echo "Erro ao enviar o arquivo.";
    }
}

// Função para salvar as informações do arquivo no MySQL
function salvarNoBancoDeDados($nome, $caminho, $tipo, $tamanho) {
    // Conectar ao banco de dados MySQL
    $conn = new mysqli("Localhost", "root", "", "bd_InovaColor");

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    if(isset($_POST['submit'])){
        include_once('configuracao.php');
        //print_r($_POST['titulo']);
        //print_r($_POST['texto']);
        //print_r($_POST['data_post']);
    
        $titulo = $_POST['titulo'];
        $escrita = $_POST['texto'];
        $data_post = $_POST['data_post'];
    
        // Preparar a query SQL
        $sql = "INSERT INTO arquivos (nome, caminho, tipo, tamanho, titulo, texto, data_post) VALUES (?, ?, ?, ?, '$titulo', '$escrita', '$data_post')";
    }

    // Preparar a declaração
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssi", $nome, $caminho, $tipo, $tamanho);
        $stmt->execute();
        $stmt->close();
        echo "Informações salvas no banco de dados.";
    } else {
        echo "Erro ao salvar no banco de dados.";
    }

    // Fechar a conexão
    $conn->close();
}
?>
