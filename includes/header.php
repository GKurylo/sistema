<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro Estadual de Educação Profissional</title>
    <link rel="shortcut icon" type="image/jpg" href="projetoFinalAdmin/images/logo.png">

    <!-- Bootstrap 5 CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    <!-- Flickity CSS sofiiii-->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <!-- Flickity (para o carrossel da galeria) -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <!-- Fancybox 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4/dist/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4/dist/fancybox.umd.js"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- sofi -->
    <div class="container ">
        <div class="row align-items-center py-2">
            <div class="col-md-2 text-center text-md-start">
                <a href="./">
                    <!--<img src="img/logo-ceep.png" alt="CEEP Logo" class="img-fluid" style="max-height: 80px;">-->
                </a>
            </div>
            <div class="col-md-8 text-center">
                <h1 class="mb-0 fs-3">Centro Estadual de Educação Profissional</h1>
                <h2 class="fs-5 fw-normal ">Prof° Naiana Babaresco de Souza</h2>
            </div>
            <div class="col-md-2 text-center text-md-end">
                <a href="http://www.diaadia.pr.gov.br/">
                    <!--<img src="img/Parana.png" alt="Brasão" class="img-fluid" style="max-height: 80px;">-->
                </a>
            </div>
        </div>
    </div>

    <?php
    $currentPage = basename($_SERVER['PHP_SELF']);
    ?>



    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary-custom sticky-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link px-4 <?php echo ($currentPage == 'index.php') ? 'active-link' : ''; ?>"
                            href="./">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-4 <?php echo ($currentPage == 'instituicao.php') ? 'active-link' : ''; ?>"
                            href="instituicao.php">Instituição</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-4 <?php echo ($currentPage == 'cursos.php') ? 'active-link' : ''; ?>"
                            href="cursos.php">Cursos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link px-4 <?php echo ($currentPage == 'noticias.php') ? 'active-link' : ''; ?>"
                            href="noticias.php">Notícias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-4 <?php echo ($currentPage == 'contato.php') ? 'active-link' : ''; ?>"
                            href="contato.php">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-4 <?php echo ($currentPage == 'login.php') ? 'active-link' : ''; ?>"
                            href="login.php">
                            <i class="fas fa-user-lock"></i> Admin
                        </a>
                    </li>
                </ul>
            </div>
            <form action="noticias.php" method="get" class="d-none d-lg-flex ms-auto">
                <div class="input-group">
                    <input class="form-control form-control-sm" name="busca" type="search" placeholder="Buscar"
                        aria-label="Buscar">
                    <button class="btn btn-outline-light btn-sm" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </nav>


    <main class="flex-grow-1">