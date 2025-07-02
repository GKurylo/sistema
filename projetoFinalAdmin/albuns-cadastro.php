<?php
include('conexao.php');
include("login-validar.php");

$id = isset($_GET["id"]) ? $_GET["id"] : "";

if ($id) {
    $sql = $conn->prepare("
    select * from albuns where id='$id';
    ");

    $sql->execute();
    $dados = $sql->fetch();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Cadastro de Álbuns</title>
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
                    <p>Bem-vindo ao Cadastro de Álbuns!</p>
                    <ul>
                        <li>Aqui você poderá cadastrar os Álbuns.</li>
                        <li>Clique em (nome) para poder escrevar o nome do álbum, se tiver terminado, aperte o (botão verde) Gravar.</li>
                        <li>Clique no (botão amarelo) se pretende editar o álbum, edite os campo necessários e aperte
                            o (botão verde) Gravar.</li>
                        <li>Clique no (botão roxo) se pretende adicionar imagens a este álbum, adicione as imagens e
                            saia apertando no X.</li>
                        <li>Clique no (botão vermelho) se pretende excluir o álbum.</li>
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

                    <h1>Adicione Seu Album!</h1>

                    <div class="row mt-3 ">
                        <form action="albuns-acao.php" method="post" class="row">
                            <input type="hidden" name="txtId" value="<?php if ($id) {
                                echo $dados['id'];
                            }
                            ; ?>">

                            <div class="offset-2 col-8">
                                <label for="nome" class="form-label">NOME:</label>
                                <input type="text" class="form-control" id="nome" name="txtNome"  value="<?php if ($id) {
                                echo $dados['nome'];
                            }
                            ; ?>">
                            </div>

                            <div class="offset-2 col-8">
                                <label for="status" class="form-label">Status:</label>
                                <select type="text" class="form-control" id="status" name="txtStatus">
                                    <option value="1" selected>Ativo</option>
                                    <option value="0">Bloqueado</option>
                                </select>
                            </div>
                            <div class="col-12 text-center">
                                <input value="Gravar" type="submit" class="btn btn-success mt-3">
                            </div> <br>
                        </form>
                    </div> <br>

                    <div class="scroll-box mt-3">
                        <table class="table ">
                            <tr class="table-dark">
                                <th>ID:</th>
                                <th>NOME:</th>
                                <th>CRIADO EM:</th>
                                <th>STATUS:</th>
                                <th>OPÇÕES:</th>
                            </tr>

                            <?php
                            $sql = $conn->prepare(" SELECT * from albuns;");
                            $sql->execute();
                            while ($dados = $sql->fetch()) {
                                ?>

                                <tr>
                                    <td>
                                        <?php echo $dados['id'] ?>
                                    </td>
                                    <td>
                                        <?php echo $dados['nome'] ?>
                                    </td>
                                    <td>
                                        <?php $dataCriacao = new DateTime($dados['data']);
                                        echo $dataCriacao->format('d/m/Y'); ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($dados['status'] == 1) {
                                            echo "Ativo";
                                        } else {
                                            echo "Bloqueado";
                                        }
                                        ;
                                        ?>

                                    </td>
                                    <td class="text-center">
                                        <a href="albuns-cadastro.php?id=<?php echo $dados['id']; ?>"
                                            class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>

                                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalFotos" data-album-id="<?php echo $dados['id']; ?>"><i
                                                class="fa-solid fa-image"></i></a>

                                        <a href="albuns-deletar.php?id=<?php echo $dados['id']; ?>"
                                            class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>

                            <?php } ?>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Modal album -->
    <div class="modal fade" id="modalFotos" tabindex="-1" aria-labelledby="modalFotosLabel">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Gerenciar Fotos do Álbum</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body p-0">
                    <iframe src="" id="iframeFotos" frameborder="0" style="width: 100%; height: 500px;"></iframe>
                </div>
            </div>
        </div>
    </div>


    <?php include("app-footer.php"); ?>


    <?php include("app-script.php"); ?>
    <?php
    if ($id) {
    ?>
        <script>
            $("#status").val("<?php echo $dados["status"] ?>");
        </script>
    <?php
    }
    ?>

    <script>
        var modalFotos = document.getElementById('modalFotos');
        modalFotos.addEventListener('show.bs.modal', function (event) {
            let button = event.relatedTarget;
            let albumId = button.getAttribute('data-album-id');
            document.getElementById('iframeFotos').src = 'albuns-listar.php?id=' + albumId;
        });
    </script>

</body>


</html>