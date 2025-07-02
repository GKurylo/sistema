<?php
include("conexao.php");
include("login-validar.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Listagem de Agendamentos</title>
    <?php include("app-header.php"); ?>
</head>

<body>

    <?php include("app-lateral.php"); ?>
    <!-- Modal de Ajuda -->
    <div class="modal fade" id="modalAjuda" tabindex="-1" aria-labelledby="modalAjudaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="modalAjudaLabel">Ajuda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <p>Bem-vindo ao listagem de agendamentos!</p>
                    <ul>
                        <li>Aqui você encontrara todos os agendamentos.</li>
                        <li>Clique em (Ver Observação) para ver as observações do agendamento(se houver).</li>
                        <li>Clique no (botão verde) se pretende cadastrar um novo agendamento.</li>
                        <li>Clique no (botão amarelo) se pretende editar o agendamento, edite os campo necessários e aperte o (botão verde) Gravar.</li>
                        <li>Clique no (botão vermelho) se pretende excluir o agendamento.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- Conteudo -->
    <div class="content-body" style="min-height: 899px; overflow-x: scroll;">
        <div class="container-fluid">
            <div class="row">
                <div class="card p-2">

                    <h1>Listagem de Agendamentos</h1>
                    <p>Verifique os Agandamentos</p>

                    <div class="scroll-box mt-3">
                        <table class="table" id="tabela">
                            <tr class="table-dark text-center">
                                <th>ID</th>
                                <th>LOCAL</th>
                                <th>DATA</th>
                                <th>HORÁRIO</th>
                                <th>OBSERVAÇÃO</th>
                                <th>OPÇÕES</th>
                            </tr>

                            <?php
                            $sql = $conn->prepare("
                     select agendas.*, locais.nome as local
                     from agendas
                     LEFT JOIN locais ON locais.id = agendas.local_id
                            ");
                            $sql->execute();
                            while ($dados = $sql->fetch()) {
                                ?>

                                <tr class="text-center">
                                    <td><?php echo $dados['id']; ?></td>
                                    <td><?php echo $dados['local']; ?></td>
                                    <td><?php
                                    $data = new DateTime($dados['data']);
                                    echo $data->format('d/m/Y'); ?>
                                    </td>
                                    <td><?php
                                    $horario = new DateTime($dados['horario']);
                                    echo $horario->format('H:i:s'); ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-info btn-sm"
                                            onclick="mostrarObs('<?php echo htmlspecialchars(addslashes($dados['observacao'])); ?>')">
                                            Ver Observação
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <a href="agendas-cadastro.php?id=<?php echo $dados['id']; ?>"
                                            class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="agendas-deletar.php?id=<?php echo $dados['id']; ?>"
                                            class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>

                            <?php } ?>

                        </table>
                    </div>

                    <div class="row">
                        <div class="text-center">
                            <a href="agendas-cadastro.php" class="btn btn-success" style="width: 150px;"><i
                                    class="bi bi-plus-circle-fill fs-2"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php include("app-footer.php"); ?>


    <?php include("app-script.php"); ?>
    <script>
        function mostrarObs(observacao) {
            alert("Observação:\n" + observacao);
        }


    </script>


</body>


</html>