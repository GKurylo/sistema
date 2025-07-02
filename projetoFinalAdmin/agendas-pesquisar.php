<?php
include("conexao.php");
include("login-validar.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Listagem de Agendamentos</title>
    <?php include("app-header.php"); ?>
    <style>
        /* Estiliza a rolagem horizontal da tabela */
        .scroll-box {
            width: 100%;
            overflow-x: scroll;
            white-space: nowrap;
            border-radius: 8px;
            scroll-behavior: smooth;
        }

        /* WebKit (Chrome, Edge, Safari) */
        .scroll-box::-webkit-scrollbar {
            height: 8px;
        }

        .scroll-box::-webkit-scrollbar-track {
            background: #e9ecef;
            border-radius: 4px;
        }

        .scroll-box::-webkit-scrollbar-thumb {
            background: #adb5bd;
            border-radius: 4px;
        }

        .scroll-box::-webkit-scrollbar-thumb:hover {
            background: #6c757d;
        }

        /* Firefox */
        .scroll-box {
            scrollbar-width: thin;
            scrollbar-color: #adb5bd #e9ecef;
        }
    </style>
</head>

<body>

    <?php include("app-lateral.php"); ?>

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