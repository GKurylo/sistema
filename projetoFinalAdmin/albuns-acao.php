<?php include('conexao.php');

$id = $_POST["txtId"];
$nome = $_POST["txtNome"];
$status = $_POST["txtStatus"];
$data = date('Y-m-d');

if (!$nome) {
    echo "<script>alert('Campo nome Obrigatório!'); history.back();</script>";
    exit; // Impede a execução do restante
}
if (!$data) {
    echo "<script>alert('Campo data Obrigatório!'); history.back();</script>";
    exit; // Impede a execução do restante
}

    if (!$id) {
        //inserir
        $sql = $conn->prepare("
                        insert into albuns set nome='$nome',
                                               status='$status',
                                               data='$data'
    ");
        $sql->execute();
    } else {
        //atualizar
        $sql = $conn->prepare("
    update albuns set nome='$nome',
                      status='$status',
                      data='$data' where id='$id'
    ");
        $sql->execute();
    }

header("location:albuns-cadastro.php");
