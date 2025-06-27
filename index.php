<?php 
include_once 'includes/header.php'; 
include('conexao.php'); 
 ?>

<!-- Carrossel Principal -->
<section class="container-fluid px-0 mb-5">
    <div id="carouselPrincipal" class="carousel slide" data-bs-ride="carousel">
       
    <!-- Texto Fixo sobre o Carrossel -->
        <div class="carousel-overlay-text">
            <h3 class="custom-caption-text text-uppercase">
                Bem-vindo
            </h3>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="imagens/FACHADA.jpg" class="d-block w-100" alt="Centro Estadual de Educação Profissional">
            </div>
            <div class="carousel-item">
                <img src="imagens/FACHADA.jpg" class="d-block w-100" alt="Cursos Profissionalizantes">
            </div>
            <div class="carousel-item">
                <img src="imagens/estacionamento.jpeg" class="d-block w-100" alt="Infraestrutura Moderna">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselPrincipal" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselPrincipal" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
        </button>
    </div>
</section>

<!-- Seção de Notícias -->
<section class="container my-5">
    <h2 class="section-title text-center text-uppercase mb-5">Notícias</h2>
    <div class="row justify-content-center g-4">
        <!-- Notícia  -->

        <?php
$sql = $conn->prepare("SELECT * FROM noticias ORDER BY id ASC");
$sql->execute();
while ($dados = $sql->fetch()) { 
    ?>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="news-card text-center p-4">
                <div class="d-flex justify-content-center mb-4">
                   <img src="uploads/<?php echo $dados['imagem']; ?>">
                </div>
                <h5 class="fw-bold text-uppercase text-primary-custom"><?php echo $dados ['titulo']; ?></h5>
                <!--<p class="text-muted small mt-3">Estudantes participaram de uma experiência única de aprendizado virtual na usina hidrelétrica.</p>-->
                <a href="noticiasdetalhes.php?=id<?php echo $dados ['id'] ?>" class="btn btn-primary-custom btn-sm mt-2">Leia Mais</a>
            </div>
        </div>

<?php } ?>

    </div>
</section>

<!-- Seção Destaque -->



<section class="container my-5">
    <div class="highlight-section">
        <h2 class="section-title text-center text-uppercase mb-5">Destaque</h2>

<?php
$sql = $conn->prepare("SELECT * FROM noticias WHERE destaque = 1");
$sql->execute();
while ($dados = $sql->fetch()) { 
    ?>

        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h3 class="text-primary-custom mb-4"><?php echo $dados['titulo']; ?></h3>
                <p class="lead mb-4">
                   <?php echo $dados['resumo']; ?>
                </p>
                <p class="mb-4">
                    <?php echo $dados['texto']; ?>
                </p>
            </div>
            <div class="col-lg-4 text-center">
                <img src="uploads/<?php echo $dados['imagem']; ?>" class="img-fluid highlight-image">
            </div>
        </div>  <hr> <br> 

<?php } ?>

    </div>
</section>

<!-- Botão WhatsApp Flutuante -->
<a href="https://wa.me/554236352397?text=Olá%20quero%20mais%20informações!" 
   class="whatsapp-float" target="_blank" title="Fale conosco no WhatsApp">
  <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp">
</a>
<style>
    /* Botão flutuante do WhatsApp */
.whatsapp-float {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 1050;
    width: 60px;
    height: 60px;
    background-color: #25d366;
    border-radius: 50%;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    animation: pulse 2s infinite;
    transition: transform 0.3s;
}
.whatsapp-float img {
    width: 35px;
    height: 35px;
}
.whatsapp-float:hover {
    transform: scale(1.1);
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

</style>

<?php include_once 'includes/footer.php'; ?>