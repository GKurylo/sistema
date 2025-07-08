<?php
include("conexao.php");
include("login-validar.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<title>Gerenciador do site</title>
	<?php include("app-header.php"); ?>
</head>

<body>

	<?php include("app-lateral.php"); ?>

	<!-- Modal de Ajuda -->
    <div class="modal fade" id="modalAjuda" tabindex="-1" aria-labelledby="modalAjudaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="modalAjudaLabel">Ajuda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <h3>Bem-vindo ao Gerenciador do site!</h3>
                    <ul>
                        <li>Clique no (botão verde)"Adicionar Notícias" se pretende cadastrar uma nova notícias.</li>
                        <li>Clique no (botão verde)"Adicionar Notícias" se pretende cadastrar um novo cursos.</li>
						<li>Clique no (botão verde)"Adicionar Notícias" se pretende cadastrar um novo álbuns.</li>
						<li>Clique no (botão verde)"Adicionar Notícias" se pretende editar os horários.</li>
						<li>Clique no (botão verde)"Adicionar Notícias" se pretende cadastrar uma nova notícias.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

	<!-- Conteudo -->
	<div class="content-body" style="min-height: 899px;">
		<div class="container-fluid">
			<div class="row">
				<div class="card p-3 border-0 shadow-sm">
					<div class="row text-center g-3 justify-content-center">

						<!-- Botão 1 -->
						<div class="col-12 col-sm-6 col-lg-4">
							<a href="noticias-cadastro.php"
								class="btn btn-success w-100 p-3 d-flex flex-column align-items-center rounded-3" style="height: 220px;">
								<img src="images/127 Sem Título_20250616220559.png" class="img-fluid mb-2"
									style="max-height: 200px;">
								<strong class="text-white">Adicionar Notícias</strong>
							</a>
						</div>

						<!-- Botão 2 -->
						<div class="col-12 col-sm-6 col-lg-4">
							<a href="cursos-cadastro.php"
								class="btn btn-success w-100 p-3 d-flex flex-column align-items-center rounded-3" style="height: 220px;">
								<img src="images/127 Sem Título_20250616211314.png" class="img-fluid mb-2"
									style="max-height: 200px;">
								<strong class="text-white">Adicionar Cursos</strong>
							</a>
						</div>

						<!-- Botão 3 -->
						<div class="col-12 col-sm-6 col-lg-4">
							<a href="albuns-cadastro.php"
								class="btn btn-success w-100 p-3 d-flex flex-column align-items-center rounded-3" style="height: 220px;">
								<img src="images/127 Sem Título_20250618194711.png" class="img-fluid mb-2"
									style="max-height: 200px;">
								<strong class="text-white">Adicionar Álbuns</strong>
							</a>
						</div>

						<!-- Botão 4 -->
						<div class="col-12 col-sm-6 col-lg-4">
							<a href="horario-editar.php"
								class="btn btn-success w-100 p-3 d-flex flex-column align-items-center rounded-3" style="height: 220px;">
								<img src="images/127 Sem Título_20250624110353d1.png" class="img-fluid mb-2"
									style="max-height: 200px;">
								<strong class="text-white">Editar Horários</strong>
							</a>
						</div>

						<!-- Botão 5 -->
						<div class="col-12 col-sm-6 col-lg-4">
							<a href="slides-editar.php"
								class="btn btn-success w-100 p-3 d-flex flex-column align-items-center rounded-3" style="height: 220px;">
								<img src="images/127 Sem Título_20250627160326.png" class="img-fluid mb-2"
									style="max-height: 200px;">
								<strong class="text-white">Adicionar Slides</strong>
							</a>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>


	<?php include("app-footer.php"); ?>


	<?php include("app-script.php"); ?>

</body>


</html>