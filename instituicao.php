<!-- sofiii -->
<?php include_once 'includes/header.php'; ?>

<!-- Missão, Visão e Valores -->
<section class="container my-5">

    <div class="row g-4">
        <div class="col-md-6">
            <div class="news-card h-100 p-4 text-center">
                <i class="fas fa-bullseye fa-3x text-primary-custom mb-3"></i>
                <h4 class="text-primary-custom mb-3">MISSÃO</h4>
                <p>
                    Tem como missão oferecer educação profissional integrada à formação humana, alinhada à política educacional do Paraná iniciada em 2003. A instituição valoriza tanto a preparação para o mercado de trabalho quanto o desenvolvimento de conhecimentos científicos, tecnológicos e sociais. Atende principalmente adolescentes de 14 a 18 anos nos cursos técnicos integrados (em período diurno) e adultos acima de 18 anos nos cursos subsequentes. O CEEP busca formar alunos com pensamento crítico, capacidade de reflexão, trabalho em equipe e domínio teórico-prático.de.
                </p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="news-card h-100 p-4 text-center">
                <i class="fas fa-heart fa-3x text-primary-custom mb-3"></i>
                <h4 class="text-primary-custom mb-3">IMPORTÂNCIA DA ESCOLA TÉCNICA</h4>
                <p>
                    A Escola Técnica oferece uma formação de qualidade, preparando jovens e adultos para o mercado de trabalho com cursos técnicos em diversas áreas, como tecnologia, saúde, administração e indústria. Com uma abordagem prática e inovadora, buscamos capacitar nossos alunos para se destacarem profissionalmente, com conhecimentos atualizados e habilidades específicas, promovendo a inclusão e o desenvolvimento de sua carreira.
                </p>
            </div>
        </div>
    </div>
</section>

<ul class="container nav nav-tabs mb-4" id="courseTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true">História</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="documentos-tab" data-bs-toggle="tab" data-bs-target="#documentos" type="button" role="tab" aria-controls="documentos" aria-selected="false">Documentos</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="gallery-tab" data-bs-toggle="tab" data-bs-target="#gallery" type="button" role="tab" aria-controls="gallery" aria-selected="false">Galeria</button>
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
                        <p>
                            Em 2008, o município de Laranjeiras do Sul – PR foi contemplado com uma unidade do Centro Estadual de Educação Profissional (CEEP), devido à sua posição central na região da Cantuquiriguaçu, que abrange 20 municípios.
                        </p>
                        <p>
                            Foram realizados estudos de demanda e reuniões com os municípios da região para definir os cursos técnicos mais adequados. Com base nessas análises, optou-se por ofertar os cursos técnicos em:
                            <strong>Edificações (subsequente)</strong>, <strong>Agronegócio (integrado)</strong>, <strong>Enfermagem (integrado e subsequente)</strong>, entre outros.
                        </p>
                        <p>
                            As obras começaram em 2011, mas foram suspensas em 2013 por estarem sobre a faixa de domínio do DNIT.
                            Em 2016, a professora Eliane Maria da Silva foi nomeada como primeira diretora e, junto com uma pequena equipe, iniciou os preparativos para funcionamento da escola.
                        </p>
                        <p>
                            O CEEP iniciou suas atividades em agosto de 2016, com cursos noturnos. Em 2017, passou a ofertar também cursos integrados no período da manhã. A escola tem capacidade para 1.200 alunos.
                        </p>
                    </div>

                    <!-- Imagem -->
                    <div class="col-md-5 text-center">
                        <img src="img/enfermagem.jpeg" alt="Foto do CEEP" class="img-fluid rounded shadow-sm">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row justify-content-center g-4">
                    <div class="col-12 col-md-6">
                        <a href="PPP.pdf" target="_blank" class="text-decoration-none">
                            <div class="card h-100" style="max-width: 400px; margin: 0 auto;">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <iframe src="PPP.pdf" width="100%" height="200px" class="mb-3 border rounded"></iframe>
                                    <button type="button" class="btn btn-dark">PPP</button>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-md-6">
                        <a href="Regime.pdf" target="_blank" class="text-decoration-none">
                            <div class="card h-100" style="max-width: 400px; margin: 0 auto;">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <iframe src="Regime.pdf" width="100%" height="200px" class="mb-3 border rounded"></iframe>
                                    <button type="button" class="btn btn-dark">Regime</button>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Galeria -->
<div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
    <div class="card shadow-sm bg-white border-0">
        <div class="card-body">
            <div class="carousel-galeria js-flickity" data-flickity='{"wrapAround": true, "pageDots": false, "autoPlay": 2500, "draggable": true}'>
                <div class="carousel-cell">
                    <a data-fancybox="galeria" href="img/eletrotecnica.jpeg">
                        <img src="img/eletrotecnica.jpeg" class="galeria-img img-fluid rounded shadow-sm" alt="Foto 1">
                    </a>
                </div>
                <div class="carousel-cell">
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
                </div>
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

<?php include_once 'includes/footer.php'; ?>