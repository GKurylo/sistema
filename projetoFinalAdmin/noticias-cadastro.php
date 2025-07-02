<?php
include('conexao.php');
include("login-validar.php");

$id = isset($_GET["id"]) ? $_GET["id"] : "";
$dados = [];

if ($id) {
    $sql = $conn->prepare("SELECT * FROM noticias WHERE id = :id");
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $dados = $sql->fetch();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Cadastro de Notícias</title>
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
                    <h3>Bem-vindo ao Listagem e cadastro de Notícias!</h3>
                    <ul>
                        <li>Aqui você encontrara o cadastro e logo depois a listagem com as Notícias.</li>
                        <li>Se pretende cadastrar uma nova Notícias, preencha todos os campos e clique no (botão verde) Gravar.</li>
                        <li>Clique no (botão amarelo) se pretende editar a Notícias, edite os campo necessários e aperte o (botão verde) Gravar.</li>
                        <li>Clique no (botão roxo) se pretende adicionar imagens a esta Notícias, adicione as imagens e saia apertando no X.</li>
                        <li>Clique no (botão vermelho) se pretende excluir a Notícias.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body" style="min-height: 899px;">
        <div class="container-fluid">
            <div class="row">
                <div class="card p-2">

                    <h1>Adicione Sua Notícia!</h1>

                    <div class="row mt-3">
                        <form action="noticias-acao.php" method="post" enctype="multipart/form-data" class="row">
                            <input type="hidden" name="txtId" value="<?php echo $dados['id'] ?? ''; ?>">

                            <input type="hidden" name="imagem_antiga" value="<?php echo $dados['imagem'] ?? ''; ?>">


                            <!-- Título -->
                            <div class="offset-2 col-8">
                                <label for="titulo" class="form-label">Título:</label>
                                <input type="text" class="form-control" id="titulo" name="txtTitulo" value="<?php echo $dados['titulo'] ?? ''; ?>">
                            </div>

                            <!-- Resumo -->
                            <div class="offset-2 col-8">
                                <label for="resumo" class="form-label">Resumo:</label>
                                <input type="text" class="form-control" id="resumo" name="txtResumo" value="<?php echo $dados['resumo'] ?? ''; ?>">
                            </div>

                            <!-- Texto -->
                            <div class="offset-2 col-8">
                                <label for="texto" class="form-label">Texto:</label>
                                <input type="text" class="form-control" id="texto" name="txtTexto" value="<?php echo $dados['texto'] ?? ''; ?>">
                            </div>

                            <!-- Imagem / Capa -->
                            <div class="offset-2 col-8">
                                <label for="imagem" class="form-label">Capa:</label>
                                <input type="file" class="form-control mb-2" id="imagem" name="txtImagem">
                                <input type="hidden" name="imagem_antiga" value="<?php echo $dados['imagem'] ?? ''; ?>">

                                <?php if (!empty($dados['imagem'])): ?>
                                    <div>
                                        <p>Imagem atual:</p>
                                        <img src="../uploads/<?php echo $dados['imagem']; ?>" alt="Imagem atual" style="max-height: 150px; border: 1px solid #ccc; padding: 5px;">
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Destaque -->
                            <div class="offset-2 col-8">
                                <label for="destaque" class="form-label">Destaque:</label>
                                <select class="form-control" id="destaque" name="txtDestaque">
                                    <option value="0" <?php if (($dados['destaque'] ?? '') == 0) echo 'selected'; ?>>não</option>
                                    <option value="1" <?php if (($dados['destaque'] ?? '') == 1) echo 'selected'; ?>>sim</option>
                                </select>
                            </div>

                            <!-- Status -->
                            <div class="offset-2 col-8">
                                <label for="status" class="form-label">Status:</label>
                                <select class="form-control" id="status" name="txtStatus">
                                    <option value="1" <?php if (($dados['status'] ?? '') == 1) echo 'selected'; ?>>Ativo</option>
                                    <option value="0" <?php if (($dados['status'] ?? '') == 0) echo 'selected'; ?>>Bloqueado</option>
                                </select>
                            </div>

                            <!-- Botão de envio -->
                            <div class="col-12 text-center">
                                <input value="Gravar" type="submit" class="btn btn-success mt-3">
                            </div>
                        </form>
                    </div>

                    <!-- Lista de notícias cadastradas -->
                    <div class="text-center mt-4">
                        <table class="table">
                            <tr class="table-dark">
                                <th>ID:</th>
                                <th>CAPA:</th>
                                <th>TÍTULO:</th>
                                <th>RESUMO:</th>
                                <th>TEM DESTAQUE:</th>
                                <th>STATUS:</th>
                                <th>OPÇÕES:</th>
                            </tr>

                            <?php
                            $sql = $conn->prepare("SELECT * FROM noticias");
                            $sql->execute();
                            while ($dados = $sql->fetch()) {
                            ?>
                                <tr>
                                    <td><?php echo $dados['id']; ?></td>
                                    <td style="width: 150px;">
                                        <img src='../uploads/<?php echo $dados['imagem'] ?? ''; ?>' class='imgBorda' height='120px'>
                                    </td>
                                    <td><?php echo $dados['titulo']; ?></td>
                                    <td><?php echo $dados['resumo']; ?></td>
                                    <td><?php echo $dados['destaque'] == 1 ? 'Sim' : 'Não'; ?></td>
                                    <td><?php echo $dados['status'] == 1 ? 'Ativo' : 'Bloqueado'; ?></td>
                                    <td class="text-center">
                                        <a href="noticias-cadastro.php?id=<?php echo $dados['id']; ?>" class="btn btn-warning btn-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="modalFotos?id=<?php echo $dados['id']; ?>" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalFotos" data-album-id="<?php echo $dados['id']; ?>">
                                            <i class="fa-solid fa-image"></i>
                                        </a>
                                        <a href="noticias-deletar.php?id=<?php echo $dados['id']; ?>" class="btn btn-danger btn-sm">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal de fotos -->
    <div class="modal fade" id="modalFotos" tabindex="-1" aria-labelledby="modalFotosLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Gerenciar Fotos do Álbum - Notícias</h5>
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

    <script>
        var modalFotos = document.getElementById('modalFotos');
        modalFotos.addEventListener('show.bs.modal', function(event) {
            let button = event.relatedTarget;
            let albumId = button.getAttribute('data-album-id');
            document.getElementById('iframeFotos').src = 'noticias-listar.php?id=' + albumId;
        });
    </script>

</body>

</html>