<?php
require("conexao.php");
include("login-validar.php");

$id = $_POST["txtid"];
$nome = $_POST["txtNome"];
$senha = $_POST["txtSenha"];
$usuario = $_POST["txtUsuario"];
$cargo = $_POST["txtCargo"];
$status = $_POST["txtStatus"];

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

if (!$nome) {
    echo "<script>alert('Você deve escrever um nome válido.'); history.back();</script>";
    exit;
} else {
    if (!$senhaHash) {
        echo "<script>alert('Você deve escrever uma senha válido.'); history.back();</script>";
        exit; 
    } else {
        if (!$usuario){
             echo "<script>alert('Você deve escrever um email válido.'); history.back();</script>";
            exit; 
        } else {
            if (!$id) {
        $sql = $conn->prepare("INSERT INTO usuarios SET nome='$nome',
                                                     senha='$senhaHash',
                                                     usuario='$usuario',
                                                     cargo='$cargo',
                                                     status='$status'
                                                    ");
        $sql->execute();
            } else {
        $sql = $conn->prepare("UPDATE usuarios SET nome='$nome',
                                                    usuario='$usuario',
                                                    cargo='$cargo',
                                                    status='$status'
                                                    WHERE id='$id'
                                                    ");
        $sql->execute();
            }
        }
    }
}
header("location: usuarios-pesquisar.php");