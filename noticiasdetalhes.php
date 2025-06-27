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
            <img src="uploads/<?php echo $dados['imagem']; ?>"
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
                $sql = $conn->prepare("SELECT nome_arquivo FROM noticias
      LEFT JOIN noticias_imagens ON noticias_imagens.noticia_id = noticias.id WHERE noticias.id = ?");
                $sql->execute([$id]);
                while ($dados = $sql->fetch()) {
                    ?>

                    <div class="carousel-cell">
                        <a data-fancybox="galeria" href="<?php echo $dados['nome_arquivo'] ?>">
                            <img src="<?php echo $dados['nome_arquivo'] ?>" class="galeria-img img-fluid rounded shadow-sm" alt="Foto 1">
                        </a>
                    </div>

                <?php } ?>
            </div>

            <div class="text-center mt-4">
                <button class="btn btn-primary" type="button" id="verMaisFotosBtn">
                    <i class="fas fa-images me-2"></i>Ver mais fotos
                </button>
            </div>
            <script>
              document.getElementById('verMaisFotosBtn').addEventListener('click', function() {
                var first = document.querySelector('[data-fancybox="galeria"]');
                if(first) first.click();
              });
            </script>
        </div>

        <?php include_once 'includes/footer.php'; ?>