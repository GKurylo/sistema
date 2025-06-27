<?php include_once 'includes/header.php';
include('conexao.php');
$id = isset($_GET["id"]) ? $_GET["id"] : "";
if ($id) {
    $sql = $conn->prepare("SELECT * FROM cursos where id='$id'");
    $sql->execute();
    $dados = $sql->fetch();
}

?>

<div class="container my-5">
    <div class="row align-items-center">
        <!-- Texto -->
        <div class="col-md-6 text-center">
            <h2 class="text-primary-custom mb-3 text-center"><?php echo $dados['nome'] ?></h2>
            <h5 class="text-primary-custom mb-3 text-center">Sobre o Curso</h5>
            <p class="float-start me-3 mb-3 rounded-4 shadow-sm">
                <?php echo $dados['descricao'] ?>
            </p>
        </div>

        <!-- Imagem -->
        <div class="col-md-6 text-center">
            <img src="uploads/<?php echo $dados['imagem']; ?>"
                alt="imagem de: <?php echo $dados['nome'] ?>" class="news-image mb-4">
        </div>
    </div>
</div>

<style>
    .titulo-curso {
        font-family: 'Georgia', serif;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }

    .subtitulo-curso {
        font-family: 'Georgia', serif;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .descricao-curso {
        font-family: 'Georgia', serif;
        font-size: 1rem;
        line-height: 1.7;
        text-align: justify;
    }

    .imagem-curso {
        max-width: 300px;
        border-radius: 10px;
        border: 5px solid black;
    }
</style>

<ul class="container nav nav-tabs mb-4" id="courseTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button"
            role="tab" aria-controls="about" aria-selected="true">Areas de Atuação</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="documentos-tab" data-bs-toggle="tab" data-bs-target="#documentos" type="button"
            role="tab" aria-controls="documentos" aria-selected="false">Documentos</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="gallery-tab" data-bs-toggle="tab" data-bs-target="#gallery" type="button"
            role="tab" aria-controls="gallery" aria-selected="false">Galeria</button>
    </li>
</ul>

<div class="tab-content container" id="courseTabContent">
    <!-- Sobre o Curso -->
    <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row align-items-center">
                    
                    <!-- Texto -->
                    <div class="col-md-7">
                        <?php echo $dados['atuacao']; ?>
                    </div>

                    <!-- Imagem -->
                    <div class="col-md-5 text-center">
                        <img src="uploads/<?php echo $dados['imagem']; ?>"
                            alt="imagem de: <?php echo $dados['nome'] ?>" class="img-fluid rounded shadow-sm">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="documentos" role="tabpanel" aria-labelledby="documentos-tab">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row justify-content-center g-4">
                    <div class="col-12 col-md-6">
                        <a href="uploads/<?php echo $dados['matriz'] ?>" target="_blank"
                            class="text-decoration-none">
                            <div class="card h-100" style="max-width: 400px; margin: 0 auto;">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <iframe src="uploads/<?php echo $dados['matriz']; ?>" width="100%"
                                        height="600px" class="mb-3 border rounded"></iframe>
                                    <button type="button" class="btn btn-dark">Matriz curricular</button>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-md-6">
                        <a href="uploads/<?php echo $dados['planodecurso'] ?>" target="_blank"
                            class="text-decoration-none">
                            <div class="card h-100" style="max-width: 400px; margin: 0 auto;">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <iframe src="uploads/<?php echo $dados['planodecurso']; ?>"
                                        width="100%" height="600px"></iframe>
                                    <button type="button" class="btn btn-dark">Plano de curso</button>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Galeria -->
    <div class="fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
        <div class="card shadow-sm bg-white border-0">
            <div class="card-body">
                <div class="carousel-galeria js-flickity" data-flickity='{
                                                                       "wrapAround": true,
                                                                       "pageDots": false,
                                                                       "autoPlay": 2500,
                                                                       "draggable": true
                                                                    }'>
                    <?php
                    $sql = $conn->prepare("SELECT nome_arquivo FROM `cursos_imagens` where curso_id = 42");
                    $sql->execute();
                    while ($dados = $sql->fetch()) {
                        ?>
                        <div class="carousel-cell">
                            <a data-fancybox="galeria" href="<?php echo $dados['nome_arquivo']; ?>">
                                <img src="<?php echo $dados['nome_arquivo'] ?>"
                                    class="galeria-img img-fluid rounded shadow-sm" alt="Foto 1">
                            </a>
                        </div>

                    <?php } ?>

                    <!-- Adicione mais imagens aqui -->
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#galleryModal">
                        <i class="fas fa-images me-2"></i>Ver mais fotos
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'includes/footer.php'; ?>