<?php
include_once 'includes/header.php';
include('conexao.php');
$id = $_GET['id'];
?>

<?php
$sql = $conn->prepare("SELECT * FROM noticias where id='$id'");
$sql->execute();
while ($dados = $sql->fetch()) {
    ?>

    <div class="container py-4">
        <h3 class="section-title text-center mb-5"><?php echo $dados['titulo']; ?></h3>

        <div class="texto-noticia">
            <img src="projetoFinalAdmin/uploads/<?php echo $dados['imagem']; ?>"
                class="float-start me-3 mb-2 rounded-4 shadow-sm" style="width: 450px; height: 290px; object-fit: cover;">

            <?php echo $dados['texto']; ?>
        </div>
        <br>

    <?php } ?> 

    <div class="card shadow-sm bg-white border-0">

        <div class="card-body">
            <div class="carousel-galeria js-flickity" data-flickity='{
                                                                       "wrapAround": true,
                                                                       "pageDots": false,
                                                                       "autoPlay": 2500,
                                                                       "draggable": true
                                                                    }'>

                <?php
                $sql = $conn->prepare("SELECT * FROM noticias_imagens where id='$id'");
                $sql->execute();
                
                while ($dados = $sql->fetch()) {
                    ?>

                    <div class="carousel-cell">
                        <a data-fancybox="galeria" href="img/eletrotecnica.jpeg">
                            <img src="projetoFinalAdmin/uploads/<?php echo $dados['nome_arquivo'] ?>" class="galeria-img img-fluid rounded shadow-sm" alt="Foto 1">
                        </a>
                    </div>

                <?php } ?>

                <!--      <div class="carousel-cell">
                    <a data-fancybox="galeria" href="img/enfermagem.jpeg">
                        <img src="img/enfermagem.jpeg" class="galeria-img img-fluid rounded shadow-sm" alt="Foto 2">
                    </a>
                </div>
                <div class="carousel-cell">
                    <a data-fancybox="galeria" href="img/estacionamento.jpeg">
                        <img src="img/estacionamento.jpeg" class="galeria-img img-fluid rounded shadow-sm" alt="Foto 3">
                    </a>
                </div>
                <div class="carousel-cell">
                    <a data-fancybox="galeria" href="img/farmacia.jpeg">
                        <img src="img/farmacia.jpeg" class="galeria-img img-fluid rounded shadow-sm" alt="Foto 4">
                    </a>
                </div>
                <div class="carousel-cell">
                    <a data-fancybox="galeria" href="img/estacionamento.jpeg">
                        <img src="img/estacionamento.jpeg" class="galeria-img img-fluid rounded shadow-sm" alt="Foto 3">
                    </a>
                </div> -->
                <!-- Adicione mais imagens aqui -->
            </div>

            <div class="text-center mt-4">
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#galleryModal">
                    <i class="fas fa-images me-2"></i>Ver mais fotos
                </button>
            </div>
        </div>

        <?php include_once 'includes/footer.php'; ?>