<?php 
include_once 'includes/header.php'; 
include('conexao.php');

// Busca
$termoBusca = isset($_GET['busca']) ? trim($_GET['busca']) : '';

// Paginação
$porPagina = 6;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$inicio = ($pagina - 1) * $porPagina;

// Consulta total para contar registros
if (!empty($termoBusca)) {
    $sqlTotal = $conn->prepare("SELECT COUNT(*) FROM noticias WHERE titulo LIKE :busca OR resumo LIKE :busca");
    $sqlTotal->bindValue(':busca', '%' . $termoBusca . '%');
} else {
    $sqlTotal = $conn->prepare("SELECT COUNT(*) FROM noticias");
}
$sqlTotal->execute();
$totalRegistros = $sqlTotal->fetchColumn();
$totalPaginas = ceil($totalRegistros / $porPagina);

// Consulta paginada
if (!empty($termoBusca)) {
    $sql = $conn->prepare("SELECT * FROM noticias WHERE titulo LIKE :busca OR resumo LIKE :busca ORDER BY id DESC LIMIT :inicio, :limite");
    $sql->bindValue(':busca', '%' . $termoBusca . '%');
} else {
    $sql = $conn->prepare("SELECT * FROM noticias ORDER BY id DESC LIMIT :inicio, :limite");
}
$sql->bindValue(':inicio', $inicio, PDO::PARAM_INT);
$sql->bindValue(':limite', $porPagina, PDO::PARAM_INT);
$sql->execute();
?>

<section class="container my-5">
  <div class="row justify-content-center g-4">
    <?php while ($dados = $sql->fetch()) { ?>
      <div class="col-12 col-md-6 col-lg-4">
        <a href="noticiasdetalhes.php?id=<?= $dados['id'] ?>" class="text-decoration-none text-dark d-block h-100">
          <div class="news-card text-center p-4 h-100">
            <div class="d-flex justify-content-center mb-4">
              <img src="uploads/<?= $dados['imagem']; ?>" class="card-img-top rounded shadow-sm img-fluid" alt="Notícia" style="height: 200px; object-fit: cover;">
            </div>
            <h6 class="fw-bold text-uppercase text-primary-custom"><?= $dados['titulo']; ?></h6>
          </div>
        </a>
      </div>
    <?php } ?>
  </div>
</section>

<section class="container my-5">
  <nav aria-label="Navegação de páginas">
    <ul class="pagination justify-content-center">
      <!-- Botão Anterior -->
      <li class="page-item <?= ($pagina <= 1) ? 'disabled' : '' ?>">
        <a class="page-link" href="?pagina=<?= $pagina - 1 ?>&busca=<?= urlencode($termoBusca) ?>" style="color: #361c11;">Anterior</a>
      </li>

      <!-- Números das páginas -->
      <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
        <li class="page-item <?= ($pagina == $i) ? 'active' : '' ?>">
          <a class="page-link" href="?pagina=<?= $i ?>&busca=<?= urlencode($termoBusca) ?>" style="<?= ($pagina == $i) ? 'background-color: #361c11; border-color: #361c11; color: white;' : 'color: #361c11;' ?>">
            <?= $i ?>
          </a>
        </li>
      <?php endfor; ?>

      <!-- Botão Próximo -->
      <li class="page-item <?= ($pagina >= $totalPaginas) ? 'disabled' : '' ?>">
        <a class="page-link" href="?pagina=<?= $pagina + 1 ?>&busca=<?= urlencode($termoBusca) ?>" style="color: #361c11;">Próximo</a>
      </li>
    </ul>
  </nav>
</section>

<?php include_once 'includes/footer.php'; ?>
