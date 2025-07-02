<?php
include("login-validar.php");
include("conexao.php");

$id = isset($_GET["id"]) ? $_GET["id"] : "";

if ($id) {
    $sql = $conn->prepare("SELECT * FROM cursos WHERE id = ?");
    $sql->execute([$id]);
    $dados = $sql->fetch();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Cadastro de Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css"
        rel="stylesheet" />
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
                    <h3>Bem-vindo ao Listagem e cadastro de Cursos!</h3>
                    <ul>
                        <li>Aqui você encontrara o cadastro e logo depois a listagem com os Cursos.</li>
                        <li>Se pretende cadastrar um novo Curso, preencha todos os campos e clique no (botão verde)
                            Gravar.</li>
                        <li>Clique no (botão amarelo) se pretende editar o Curso, edite os campo necessários e aperte
                            o (botão verde) Gravar.</li>
                        <li>Clique no (botão roxo) se pretende adicionar imagens a este Curso, adicione as imagens e
                            saia apertando no X.</li>
                        <li>Clique no (botão vermelho) se pretende excluir o Curso.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body" style="min-height: 899px;">
        <div class="container-fluid">
            <div class="row">
                <div class="card p-2">
                    <h1>Adicione Seu Curso!</h1>

                    <div class="row mt-3">
                        <form action="cursos-acao.php" method="post" class="row" enctype="multipart/form-data">
                            <input type="hidden" name="txtId" value="<?php echo $dados['id'] ?? ''; ?>">
                            <input type="hidden" name="imagem_antiga" value="<?php echo $dados['imagem'] ?? ''; ?>">
                            <input type="hidden" name="matriz_antiga" value="<?php echo $dados['matriz'] ?? ''; ?>">
                            <input type="hidden" name="plano_antigo"
                                value="<?php echo $dados['planodecurso'] ?? ''; ?>">

                            <div class="offset-2 col-8">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="txtNome"
                                    value="<?php echo $dados['nome'] ?? ''; ?>">
                            </div>

                            <div class="offset-2 col-8">
                                <label for="descricao" class="form-label">Descricao:</label>
                                <input type="text" class="form-control" id="descricao" name="txtDescricao"
                                    value="<?php echo $dados['descricao'] ?? ''; ?>">
                            </div>

                            <div class="offset-2 col-8">
                                <label for="atuacao" class="form-label">Area de Atuação:</label>
                                <textarea class="form-control" id="atuacao"
                                    name="txtAtuacao"><?php echo $dados['atuacao'] ?? ''; ?></textarea>
                            </div>

                            <div class="offset-2 col-8">
                                <label for="tipo" class="form-label">Tipo:</label>
                                <select class="form-control" id="tipo" name="txtTipo">
                                    <option value="1" <?php if (($dados['tipo'] ?? '') == 1)
                                        echo 'selected'; ?>>
                                        Subsequente</option>
                                    <option value="0" <?php if (($dados['tipo'] ?? '') == 0)
                                        echo 'selected'; ?>>Integrado
                                    </option>
                                </select>
                            </div>

                            <div class="offset-2 col-8">
                                <label for="status" class="form-label">Status:</label>
                                <select class="form-control" id="status" name="txtStatus">
                                    <option value="1" <?php if (($dados['status'] ?? '') == 1)
                                        echo 'selected'; ?>>Ativo
                                    </option>
                                    <option value="0" <?php if (($dados['status'] ?? '') == 0)
                                        echo 'selected'; ?>>
                                        Bloqueado</option>
                                </select>
                            </div>

                            <div class="offset-2 col-8">
                                <?php if (!empty($dados['imagem'])): ?>
                                    <div class="mt-2">
                                        <p>Capa atual:</p>
                                        <img src="../uploads/<?php echo $dados['imagem']; ?>" alt="Capa atual"
                                            style="max-height: 150px; border: 1px solid #ccc;">
                                    </div>
                                <?php endif; ?>
                                <label for="imagem" class="form-label">Capa:</label>
                                <input type="file" class="form-control" id="imagem" name="txtImagem">

                            </div>

                            <div class="offset-2 col-4">
                                <label for="matriz" class="form-label">Matriz:</label>
                                <?php if (!empty($dados['matriz'])): ?>
                                    <div class="mt-2">
                                        <p>Matriz atual:</p>
                                        <a href="../uploads/<?php echo $dados['matriz']; ?>" target="_blank">
                                            <?php echo $dados['matriz']; ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <input type="file" class="form-control" id="matriz" name="txtMatriz">
                            </div>

                            <div class="col-4">
                                <label for="plano" class="form-label">Plano de Curso:</label>
                                <?php if (!empty($dados['planodecurso'])): ?>
                                    <div class="mt-2">
                                        <p>Plano de Curso atual:</p>
                                        <a href="../uploads/<?php echo $dados['planodecurso']; ?>" target="_blank">
                                            <?php echo $dados['planodecurso']; ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <input type="file" class="form-control" id="plano" name="txtPlano">
                            </div>

                            <div class="offset-2 col-8">
                                <label for="meuSelect" class="form-label">Locais:</label>
                                <select id="meuSelect" class="select2 form-control" multiple="multiple"
                                    name="txtLocais[]">
                                    <?php
                                    $sqllocal = $conn->prepare("SELECT * FROM locais WHERE status = 1");
                                    $sqllocal->execute();
                                    $locaisSelecionados = explode(',', $dados['locais_ids'] ?? '');

                                    while ($dadoslocal = $sqllocal->fetch()) {
                                        $selected = in_array($dadoslocal['id'], $locaisSelecionados) ? 'selected' : '';
                                        echo "<option value='{$dadoslocal['id']}' $selected>" . htmlspecialchars($dadoslocal['nome']) . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-12 text-center">
                                <input value="Gravar" type="submit" class="btn btn-success mt-3">
                            </div>
                        </form>
                    </div><br>

                    <!-- Tabela de cursos -->
                    <div class="scroll-box mt-3">
                        <table class="table">
                            <tr class="table-dark">
                                <th>ID:</th>
                                <th>CAPA:</th>
                                <th>NOME:</th>
                                <th>DESCRICAO:</th>
                                <th>AREA DE ATUAÇÃO:</th>
                                <th>TIPO:</th>
                                <th>LOCAIS:</th>
                                <th>STATUS:</th>
                                <th>OPÇÕES:</th>
                            </tr>

                            <?php
                            $sql = $conn->prepare("SELECT * FROM cursos");
                            $sql->execute();
                            while ($dados = $sql->fetch()) {

                                // Obter nomes dos locais
                                $locaisNomes = [];
                                if (!empty($dados['locais_ids'])) {
                                    $ids = explode(',', $dados['locais_ids']);
                                    $placeholders = implode(',', array_fill(0, count($ids), '?'));
                                    $stmtLocais = $conn->prepare("SELECT nome FROM locais WHERE id IN ($placeholders)");
                                    $stmtLocais->execute($ids);
                                    while ($rowLocal = $stmtLocais->fetch()) {
                                        $locaisNomes[] = $rowLocal['nome'];
                                    }
                                }
                                ?>
                                <tr>
                                    <td><?php echo $dados['id']; ?></td>
                                    <td style="width: 150px;">
                                        <img src="../uploads/<?php echo $dados['imagem']; ?>" class="imgBorda"
                                            height="120px">
                                    </td>
                                    <td><?php echo $dados['nome']; ?></td>
                                    <td><button class="btn btn-info btn-sm"
                                            onclick="mostrarDes(`<?php echo htmlspecialchars($dados['descricao'], ENT_QUOTES | ENT_HTML5); ?>`)">
                                            Ver descrição
                                        </button></td>
                                    <td><button class="btn btn-info btn-sm"
                                            onclick="mostrarAtu(`<?php echo htmlspecialchars($dados['atuacao'], ENT_QUOTES | ENT_HTML5); ?>`)">
                                            Ver area de atuação
                                        </button></td>
                                    <td><?php echo $dados['tipo'] == 1 ? 'Subsequente' : 'Integrado'; ?></td>
                                    <td><button class="btn btn-info btn-sm"
                                            onclick="mostrarDes('<?php echo htmlspecialchars(implode(', ', $locaisNomes), ENT_QUOTES | ENT_HTML5); ?>')">
                                            Ver locais
                                        </button></td>
                                    <td><?php echo $dados['status'] == 1 ? 'Ativo' : 'Desativo'; ?></td>
                                    <td class="text-center">
                                        <a href="cursos-cadastro.php?id=<?php echo $dados['id']; ?>"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="modalFotos?id=<?php echo $dados['id']; ?>" class="btn btn-primary btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#modalFotos"
                                            data-album-id="<?php echo $dados['id']; ?>">
                                            <i class="fa-solid fa-image"></i>
                                        </a>
                                        <a href="cursos-deletar.php?id=<?php echo $dados['id']; ?>"
                                            class="btn btn-danger btn-sm">
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
                    <h5 class="modal-title">Gerenciar Fotos do Álbum - Cursos</h5>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        function mostrarAtu(atuacao) {
            alert(atuacao);
        }
        function mostrarDes(descricao) {
            alert(descricao);
        }
    </script>
    <script>
        $(document).ready(function () {
            $('#meuSelect').select2({
                placeholder: "Selecione as opções",
                allowClear: true,
                theme: 'classic',
            });
        });


        var modalFotos = document.getElementById('modalFotos');
        modalFotos.addEventListener('show.bs.modal', function (event) {
            let button = event.relatedTarget;
            let albumId = button.getAttribute('data-album-id');
            document.getElementById('iframeFotos').src = 'cursos-listar.php?id=' + albumId;
        });
    </script>
</body>

</html>