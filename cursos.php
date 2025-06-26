<?php include_once 'includes/header.php';
include("conexao.php");
?>

<!-- Cursos do Ensino Integrado -->
<section class="container my-5">
    <h2 class="section-title text-center mb-5">Ensino Integrado</h2>
    <div class="row 4">
        <?php $sql = $conn->prepare("SELECT * FROM cursos WHERE tipo = '0'");
        $sql->execute();
        while ($dados = $sql->fetch()) { ?>
            <!-- cursos -->
            <div class="col-md-6 col-lg-4">
                <div class="news-cursos h-100">
                    <a href="cursosdetalhes.php?id=<?php echo $dados['id']; ?>">
                        <?php if (!empty($dados['imagem'])): ?>
                            <div class="mt-2">
                                <img src="projetoFinalAdmin/uploads/<?php echo $dados['imagem']; ?>"
                                    alt="imagem de: <?php echo $dados['nome'] ?>" class="news-image mb-4">
                            </div>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<!-- Cursos do Ensino Subsequente -->
<section class="container my-5">
    <h2 class="section-title text-center mb-5">Ensino Subsequente</h2>
    <div class="row g-4">
        <?php $sql = $conn->prepare("SELECT * FROM cursos WHERE tipo = '1'");
        $sql->execute();
        while ($dados = $sql->fetch()) { ?>
            <!-- cursos -->
            <div class="col-md-6 col-lg-4">
                <div class="news-cursos h-100">
                    <a href="cursosdetalhes.php?id=<?php echo $dados['id']; ?>">
                        <?php if (!empty($dados['imagem'])): ?>
                            <div class="mt-2">
                                <img src="projetoFinalAdmin/uploads/<?php echo $dados['imagem']; ?>"
                                    alt="imagem de: <?php echo $dados['nome'] ?>" class="news-image mb-4">
                            </div>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<?php include_once 'includes/footer.php'; ?>