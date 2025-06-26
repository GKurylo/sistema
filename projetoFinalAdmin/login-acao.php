<?php
include("conexao.php");

$usuario = $_POST["txtUsuario"];
$senha = $_POST["txtSenha"];

// Usando parâmetros nomeados para evitar SQL Injection
$sql = $conn->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha");
$sql->bindParam(':usuario', $usuario);
$sql->bindParam(':senha', $senha);
$sql->execute();

if ($sql->rowCount() > 0) {
    $dados = $sql->fetch(PDO::FETCH_ASSOC);
    session_start();
    $_SESSION['id'] = $dados['id'];
    $_SESSION['nome'] = $dados['nome'];

    header("Location: index.php");
    exit;
} else {
    header("Location: login.php");
    exit;
}
?>