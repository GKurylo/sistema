<?php include("conexao.php");
include("login-validar.php");

$id = isset($_GET["id"]) ? $_GET["id"] : "";
if ($id) {
    $sql = $conn->prepare("SELECT * FROM usuarios where id='$id'");
    $sql->execute();
    $dados = $sql->fetch();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Bem-vindo ao<?php echo isset($_GET['id']) ? ' Edição de usuário' : ' Cadastro de usuários';?></title>
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
                    <p>Bem-vindo ao<?php echo isset($_GET['id']) ? ' Edição de usuário' : ' Cadastro de usuários';?>!</p>
                    <ul>
                        <li><?php echo isset($_GET['id']) ? 'Aqui você poderá editar o usuário.' : 'Aqui você poderá cadastrar usuários.';?></li>
                        <li><?php echo isset($_GET['id']) ? 'Clique em (Nome) se quiser alterar o nome.' : 'Clique em (Nome) para digitar um nome.';?></li>
                        <li><?php echo isset($_GET['id']) ? 'Clique em (Email) se quiser alterar o email.' : 'Clique em (Email) para digitar um email.';?></li>
                        <li><?php echo isset($_GET['id']) ? 'Clique em (Status) se quiser desativar o usuário.' : 'Clique em (Status) para deixar desativado este novo usuário.';?></li>
                        <li><?php echo isset($_GET['id']) ? 'Clique em (Cargo) se quiser trocar o cargo do usuário.' : 'Clique em (Cargo) para selecionar um cargo para o usuário.';?></li>
                        <li>Se tiver terminado de colocar todas as informações, aperte o (botão verde) Gravar.</li>
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

                    <h1>Bem-vindo ao<?php echo isset($_GET['id']) ? ' Edição de usuário' : ' Cadastro de usuários';?></h1>
                    <p>Faça<?php echo isset($_GET['id']) ? ' a Edição de usuário' : ' o Cadastro de usuários';?></p>

                    <div class="row mt-3">
                        <form action="usuarios-acao.php" method="post" class="row">
                            <input type="hidden" name="txtid" value="<?php if ($id) {
                                                                            echo $dados["id"];
                                                                        } ?>">
                            <div class="col-12 col-md-4 mt-3">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome" name="txtNome" value="<?php if ($id) {
                                                                            echo $dados["nome"];
                                                                        } ?>">
                            </div>
                            <?php if (!$id) { ?>
                            <div class="col-12 col-md-4 mt-3">
                                <label for="senha">Senha</label>
                                <input type="password" class="form-control" id="senha" name="txtSenha" value="<?php if ($id) {
                                                                                                                    echo $dados["senha"];
                                                                                                                } ?>">
                            </div>
                            <?php } ?>

                            <div class="col-12 col-md-4 mt-3">
                                <label for="usuario">Email</label>
                                <input type="email" class="form-control" id="usuario" name="txtUsuario" value="<?php if ($id) {
                                                                                                                    echo $dados["usuario"];
                                                                                                                } ?>">
                            </div>
                            <div class="col-12 col-md-4 mt-3">
                                <label for="status">Status</label>
                                <select name="txtStatus" id="status" class="form-control">
                                    <option value="1" selected>ativo</option>
                                    <option value="0">bloqueado</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4 mt-3">
                                <label for="cargo">Cargo</label>
                                <select name="txtCargo" id="cargo" class="form-control">
                                    <option value="2">Gestor</option>
                                    <option value="1" selected>Administração</option>
                                    <option value="0">Professor</option>
                                    
                                </select>
                            </div>

                            <div class="mt-3 col-12 text-center">
                                <input type="submit" class="btn btn-success" value="Gravar">
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
      $("#cargo").val("<?php echo $dados["cargo"] ?>");
    </script>
    <?php
    }
    ?>
    
</body>


</html>