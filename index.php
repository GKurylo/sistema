<?php include_once 'includes/header.php'; ?>

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
                <img src="img/FACHADA.jpg" class="d-block w-100" alt="Centro Estadual de Educação Profissional">
            </div>
            <div class="carousel-item">
                <img src="img/FACHADA.jpg" class="d-block w-100" alt="Cursos Profissionalizantes">
            </div>
            <div class="carousel-item">
                <img src="img/estacionamento.jpeg" class="d-block w-100" alt="Infraestrutura Moderna">
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
        <!-- Notícia 1 -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="news-card text-center p-4">
                <div class="d-flex justify-content-center mb-4">
                    <img src="img/noticia.png" class="news-image" alt="Aula Virtual na Usina">
                </div>
                <h5 class="fw-bold text-uppercase text-primary-custom">Aula Virtual na Usina de Salto Santiago – ENGIE</h5>
                <!--<p class="text-muted small mt-3">Estudantes participaram de uma experiência única de aprendizado virtual na usina hidrelétrica.</p>-->
                <a href="noticias.php" class="btn btn-primary-custom btn-sm mt-2">Leia Mais</a>
            </div>
        </div>

        <!-- Notícia 2 -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="news-card text-center p-4">
                <div class="d-flex justify-content-center mb-4">
                    <img src="img/noticia.png" class="news-image" alt="Inscrições Abertas">
                </div>
                <h5 class="fw-bold text-uppercase text-primary-custom">Inscrições Abertas para Cursos Profissionalizantes</h5>
                <!--<p class="text-muted small mt-3">Não perca a oportunidade de se qualificar profissionalmente. Inscrições abertas!</p>-->
                <a href="cursos.php" class="btn btn-primary-custom btn-sm mt-2">Saiba Mais</a>
            </div>
        </div>

        <!-- Notícia 3 -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="news-card text-center p-4">
                <div class="d-flex justify-content-center mb-4">
                    <img src="img/noticia.png" class="news-image" alt="Atenção Alunos">
                </div>
                <h5 class="fw-bold text-uppercase text-primary-custom">Atenção Alunos e Responsáveis</h5>
                <!--<p class="text-muted small mt-3">Informações importantes sobre o calendário acadêmico e atividades escolares.</p>-->
                <a href="noticias.php" class="btn btn-primary-custom btn-sm mt-2">Ver Detalhes</a>
            </div>
        </div>
    </div>
</section>

<!-- Seção Destaque -->
<section class="container my-5">
    <div class="highlight-section">
        <h2 class="section-title text-center text-uppercase mb-5">Destaque</h2>
        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h3 class="text-primary-custom mb-4">Novos Cursos Disponíveis</h3>
                <p class="lead mb-4">
                    O CEEP tem o prazer de anunciar a abertura de novos cursos que preparam você para os desafios do mercado de trabalho.
                </p>
                <p class="mb-4">
                    Com uma abordagem prática e focada nas demandas atuais, nossos cursos oferecem uma formação de qualidade em áreas como
                    Tecnologia da Informação, Automação Industrial, Saúde, Design e muito mais.
                </p>
                <p class="mb-4">
                    Seja para quem busca aprimoramento profissional ou para quem quer começar uma nova carreira, estamos aqui para
                    ajudá-lo a alcançar seus objetivos.
                </p>
            </div>

            <div class="col-lg-4 text-center">
                <img src="img/destaque.jpg" alt="Estudantes em Destaque" class="img-fluid highlight-image">
            </div>
        </div>
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