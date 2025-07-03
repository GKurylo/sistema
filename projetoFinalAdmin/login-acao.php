<?php
include("conexao.php");

$usuario = $_POST["txtUsuario"];
$senha = $_POST["txtSenha"];

// Busca o usuário pelo nome
$sql = $conn->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
$sql->bindParam(':usuario', $usuario);
$sql->execute();

if ($sql->rowCount() > 0) {
    $dados = $sql->fetch(PDO::FETCH_ASSOC);

    // Verifica se a senha digitada confere com o hash MD5 armazenado
    if (md5($senha) == $dados['senha']) {
        session_start();
        $_SESSION['id'] = $dados['id'];
        $_SESSION['nome'] = $dados['nome'];

        header("Location: index.php");
        exit;
    } else {
        // Senha incorreta
        header("Location: ../login.php?erro=senha");
        exit;
    }
} else {
    // Usuário não encontrado
    header("Location: ../login.php?erro=usuario");
    exit;
}
?>