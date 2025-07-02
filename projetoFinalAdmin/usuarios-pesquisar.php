<?php 
include("conexao.php");
include("login-validar.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Listagem de Usuários</title>
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
                    <h3>Bem-vindo ao Listagem de Usuários!</h3>
                    <ul>
                        <li>Aqui você encontrara a listagem com os usuários.</li>
                        <li>Clique no (botão verde) se pretende cadastrar um novo usuários.</li>
                        <li>Clique no (botão amarelo) se pretende editar o usuários, edite os campo necessários e aperte o (botão verde) Gravar.</li>
                        <li>Clique no (botão vermelho) se pretende excluir o usuários.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- Conteudo -->
    <div class="content-body" style="min-height: 899px;">
        <div class="container-fluid">
            <div class="row">
                <div class="card p-2">

                    <h1>Listagem de Usuários</h1>
                    <p>Verifique todos os Usuários</p>

                    <div class="scroll-box mt-3">
                        <table class="table">
                            <tr class="table-dark text-center">
                                <th>ID</th>
                                <th>NOME</th>
                                <th>EMAIL</th>
                                <th>CARGO</th>
                                <th>STATUS</th>
                                <th>OPÇÕES</th>
                            </tr>
                            <?php
                            $sql = $conn->prepare("SELECT * from usuarios");
                            $sql->execute();
                            while ($dados = $sql->fetch()) {
                            ?>
                                <tr class="text-center">
                                    <td><?php echo "$dados[id]" ?></td>
                                    <td><?php echo "$dados[nome]" ?></td>
                                    <td><?php echo "$dados[usuario]" ?></td>
                                    <td>
                                        <?php 
                                        if ($dados['cargo'] == 2) {
                                            echo "gestor";
                                        } elseif ($dados['cargo'] == 1) {
                                            echo "Administrador";
                                        } else {
                                            echo "Professor";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($dados['status'] == 1) {
                                            echo "Ativo";
                                        } else {
                                            echo "Bloqueado";
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="usuarios-cadastro.php?id=<?php echo $dados['id']; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="usuarios-deletar.php?id=<?php echo $dados['id']; ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                            };
                            ?>
                        </table>
                    </div>

                    <div class="row">
                        <div class="text-center">
                            <a href="usuarios-cadastro.php" class="btn btn-success" style="width: 150px;"><i class="bi bi-plus-circle-fill fs-2"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <?php include("app-footer.php"); ?>



    <?php include("app-script.php"); ?>

</body>


</html>