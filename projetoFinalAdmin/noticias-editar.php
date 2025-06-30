<?php 
include('conexao.php');
include("login-validar.php");

$id = isset($_GET["id"]) ? $_GET["id"] : "";
 
if ($id) {
    $sql = $conn->prepare("
    select * from noticias where id='$id';
    ");
    $sql->execute();
    $dados = $sql->fetch();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>INDEX</title>    
    <?php include("app-header.php"); ?>
</head>

<body>

    <?php include("app-lateral.php"); ?>

    <!-- Conteudo -->
    <div class="content-body" style="min-height: 899px;">
        <div class="container-fluid">
            <div class="row">
                <div class="card p-2">

                    <h1>Edite Sua Notícia! - <?php echo $dados['titulo']; ?></h1>

                    <div class="row mt-3 ">
                        <form action="noticias-acao.php" method="post" class="row">
                            <input type="hidden" name="txtId" value="<?php if ($id) {
                                                                            echo $dados['id'];
                                                                        }; ?>">

                            <div class="offset-2 col-8">
                                <label for="titulo" class="form-label">Titulo:</label>
                                <input type="text" class="form-control" id="titulo" name="txtTitulo" value="<?php if($id){
                                                                                                 echo $dados['titulo'];
                                                                                              };?>">
                            </div>

                            <div class="offset-2 col-8">
                                <label for="resumo" class="form-label">Resumo:</label>
                                <input type="text" class="form-control" id="resumo" name="txtResumo" value="<?php if($id){
                                                                                                 echo $dados['resumo'];
                                                                                              };?>">
                            </div>

                            <div class="offset-2 col-8">
                                <label for="texto" class="form-label">Texto:</label>
                                <input type="text" class="form-control" id="texto" name="txtTexto" value="<?php if($id){
                                                                                                 echo $dados['texto'];
                                                                                              };?>">
                            </div>

                            <div class="offset-2 col-8">
                                <?php if ($id && !empty($dados['imagem'])): ?>
                                    <p>Imagem atual:</p>
                                    <img src="<?php echo $dados['imagem']; ?>" alt="Imagem atual" style="max-width: 200px;">
                                    <input type="hidden" name="imagem_antiga" value="<?php echo $dados['imagem']; ?>">
                                <?php endif; ?><br>
                                <label for="imagem">Alterar imagem:</label>
                                <input type="file" class="form-control" id="imagem" name="txtImagem">
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

                </div>
            </div>
        </div>
    </div>

    <?php include("app-footer.php"); ?>


    <?php include("app-script.php"); ?>
    <script>
      $("#status").val("<?php echo $dados["status"] ?>");
    </script>

</body>


</html>