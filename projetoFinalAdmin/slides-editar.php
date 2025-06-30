<?php
include('conexao.php');
include("login-validar.php");


$dados = [
    'img1' => '',
    'img2' => '',
    'img3' => ''
];
    $sql = $conn->prepare("SELECT * FROM slides");
    $sql->execute();
    $dados = $sql->fetch();

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Editar Slide</title>
    <?php include("app-header.php"); ?>
</head>

<body>

    <?php include("app-lateral.php"); ?>

    <!-- Conteudo -->
    <div class="content-body" style="min-height: 899px;">
        <div class="container-fluid">
            <div class="row">
                <div class="card p-2">

                    <h1>Edite o slide inicial!</h1>

                    <div class="offset-2 col-8 mb-4">
                        <div class="row">
                            <?php if (!empty($dados['img1'])): ?>
                                <div class="col-md-4 text-center mb-2">
                                    <p>Imagem 1 atual:</p>
                                    <img src="../uploads/<?php echo $dados['img1']; ?>" alt="Imagem 1 atual"
                                        style="max-height: 150px; border: 1px solid #ccc; padding: 5px;" class="img-fluid">
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($dados['img2'])): ?>
                                <div class="col-md-4 text-center mb-2">
                                    <p>Imagem 2 atual:</p>
                                    <img src="../uploads/<?php echo $dados['img2']; ?>" alt="Imagem 2 atual"
                                        style="max-height: 150px; border: 1px solid #ccc; padding: 5px;" class="img-fluid">
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($dados['img3'])): ?>
                                <div class="col-md-4 text-center mb-2">
                                    <p>Imagem 3 atual:</p>
                                    <img src="../uploads/<?php echo $dados['img3']; ?>" alt="Imagem 3 atual"
                                        style="max-height: 150px; border: 1px solid #ccc; padding: 5px;" class="img-fluid">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <form action="slides-acao.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="offset-2 col-8 mb-3">
                            <label class="form-label">Imagem 1:</label>
                            <input type="file" class="form-control mb-2" name="img1">
                            <input type="hidden" name="img1_antiga" value="<?php echo $dados['img1'] ?? ''; ?>">
                        </div>
                        <div class="offset-2 col-8 mb-3">
                            <label class="form-label">Imagem 2:</label>
                            <input type="file" class="form-control mb-2" name="img2">
                            <input type="hidden" name="img2_antiga" value="<?php echo $dados['img2'] ?? ''; ?>">
                        </div>
                        <div class="offset-2 col-8 mb-3">
                            <label class="form-label">Imagem 3:</label>
                            <input type="file" class="form-control mb-2" name="img3">
                            <input type="hidden" name="img3_antiga" value="<?php echo $dados['img3'] ?? ''; ?>">
                        </div>
                        <div class="offset-2 col-8 mb-3">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <?php include("app-footer.php"); ?>


    <?php include("app-script.php"); ?>


</body>


</html>