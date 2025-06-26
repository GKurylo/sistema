<?php 
include_once 'includes/header.php'; 
include('conexao.php');
?>
   
<section class="container my-5">
  <div class="row justify-content-center g-4">


    <?php
        $sql = $conn->prepare("SELECT * FROM noticias");
        $sql->execute();
        while ($dados = $sql->fetch()) {
    ?>

    <!-- Notícia 1 -->
    <div class="col-12 col-md-6 col-lg-4">
      <a href="noticiasdetalhes.php?id=<?php echo $dados['id']?>" class="text-decoration-none text-dark d-block h-100">
        <div class="news-card text-center p-4 h-100">
          <div class="d-flex justify-content-center mb-4">
            <img src="projetoFinalAdmin/uploads/<?php echo $dados['imagem']; ?>" class="card-img-top rounded shadow-sm img-fluid" alt="Notícia 1" style="height: 200px; object-fit: cover;">

          </div>
          <h6 class="fw-bold text-uppercase text-primary-custom"><?php echo $dados['titulo'];?></h6>
        </div>
      </a>
    </div>

    <?php } ?>

    <!--
    <div class="col-12 col-md-6 col-lg-4">
      <a href="noticiasdetalhes.php" class="text-decoration-none text-dark d-block h-100">
        <div class="news-card text-center p-4 h-100">
          <div class="d-flex justify-content-center mb-4">
            <img src="img/edicacoes.jpeg" class="card-img-top rounded shadow-sm" alt="Notícia 2" style="height: 200px; object-fit: cover;">
          </div>
          <h6 class="fw-bold text-uppercase text-primary-custom">Estudantes Visitam Centro Tecnológico da ENGIE</h6>
        </div>
      </a>
    </div>

    
    <div class="col-12 col-md-6 col-lg-4">
      <a href="noticiasdetalhes.php" class="text-decoration-none text-dark d-block h-100">
        <div class="news-card text-center p-4 h-100">
          <div class="d-flex justify-content-center mb-4">
            <img src="img/edicacoes.jpeg" class="card-img-top rounded shadow-sm" alt="Notícia 3" style="height: 200px; object-fit: cover;">
          </div>
          <h6 class="fw-bold text-uppercase text-primary-custom">Parceria Traz Aula Remota com Profissionais da Área</h6>
        </div>
      </a>
    </div>
  </div>
</section>

<section class="container my-5">
  <div class="row justify-content-center g-4">

   
    <div class="col-12 col-md-6 col-lg-4">
      <a href="noticiasdetalhes.php" class="text-decoration-none text-dark d-block h-100">
        <div class="news-card text-center p-4 h-100">
          <div class="d-flex justify-content-center mb-4">
            <img src="img/edicacoes.jpeg" class="card-img-top rounded shadow-sm" alt="Notícia 1" style="height: 200px; object-fit: cover;">
          </div>
          <h6 class="fw-bold text-uppercase text-primary-custom">Aula Virtual na Usina de Salto Santiago – ENGIE</h6>
        </div>
      </a>
    </div>

    
    <div class="col-12 col-md-6 col-lg-4">
      <a href="noticiasdetalhes.php" class="text-decoration-none text-dark d-block h-100">
        <div class="news-card text-center p-4 h-100">
          <div class="d-flex justify-content-center mb-4">
            <img src="img/edicacoes.jpeg" class="card-img-top rounded shadow-sm" alt="Notícia 2" style="height: 200px; object-fit: cover;">
          </div>
          <h6 class="fw-bold text-uppercase text-primary-custom">Estudantes Visitam Centro Tecnológico da ENGIE</h6>
        </div>
      </a>
    </div>

    
    <div class="col-12 col-md-6 col-lg-4">
      <a href="noticiasdetalhes.php" class="text-decoration-none text-dark d-block h-100">
        <div class="news-card text-center p-4 h-100">
          <div class="d-flex justify-content-center mb-4">
            <img src="img/edicacoes.jpeg" class="card-img-top rounded shadow-sm" alt="Notícia 3" style="height: 200px; object-fit: cover;">
          </div>
          <h6 class="fw-bold text-uppercase text-primary-custom">Parceria Traz Aula Remota com Profissionais da Área</h6>
        </div>
      </a>
    </div>
  </div> -->
</section>

<section class="container my-5">
    <nav aria-label="Navegação de páginas">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true" style="color: #361c11;">Anterior</a>
            </li>
            <li class="page-item active">
                <a class="page-link" href="#" style="background-color: #361c11; border-color: #361c11; color: white;">
                    1
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" style="color: #361c11;">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" style="color: #361c11;">3</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" style="color: #361c11;">Próximo</a>
            </li>
        </ul>
    </nav>
</section>
 
<?php include_once 'includes/footer.php'; ?>