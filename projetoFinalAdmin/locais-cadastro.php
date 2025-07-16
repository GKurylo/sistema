<?php 
include("conexao.php");
include("login-validar.php");

$id = isset($_GET["id"]) ? $_GET["id"] : "";

if ($id) {
    $sql = $conn->prepare("
    select * from locais where id='$id';
    ");

    $sql->execute();
    $dados = $sql->fetch();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Bem-vindo ao<?php echo isset($_GET['id']) ? ' Edição de local' : ' Cadastro de locais';?></title>
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
                    <h3>Bem-vindo ao<?php echo isset($_GET['id']) ? ' Edição de local' : ' Cadastro de locais';?>!</h3>
                    <ul>
                        <li>Aqui você poderá<?php echo isset($_GET['id']) ?  ' Editar o local' : ' Cadastrar locais';?>.</li>
                        <li><?php echo isset($_GET['id']) ?  ' Se pretende editar o local clique em (nome), preencha com o novo nome do local ou/e clique em (status) e depois em bloqueado para que este local não apareça, após isto clique no (botão verde) Gravar.' : ' Se pretende cadastrar um novo local clique em (nome), preencha com o nome do campo e clique no (botão verde) Gravar.';?></li>
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
                    <h1>Bem-vindo ao<?php echo isset($_GET['id']) ? ' Edição de local' : ' Cadastro de locais';?></h1>
                    <p>Aqui você poderá<?php echo isset($_GET['id']) ? ' Editar o local' : ' Cadastrar locais';?></p>

                    <div class="row mt-3">
                        <form action="locais-acao.php" method="post" class="row">
                            <input type="hidden" name="txtId" value="<?php if ($id) {
                                                                            echo $dados['id'];
                                                                        }; ?>">

                            <div class="col-12 col-md-6">
                                <label for="nome" class="form-label">NOME</label>
                                <input type="text" class="form-control" id="nome" name="txtNome" value="<?php if ($id) {
                                                                                                            echo $dados['nome'];
                                                                                                        }; ?>">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="status" class="form-label">STATUS</label>
                                <select type="text" class="form-control" id="status" name="txtStatus">
                                    <option value="1" selected>Ativo</option>
                                    <option value="0">Bloqueado</option>
                                </select>
                            </div>


                            <div class="col-12 text-center">
                                <input value="Gravar" type="submit" class="btn btn-success mt-3">
                            </div>
                        </form>
                    </div>
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
    

</body>


</html>