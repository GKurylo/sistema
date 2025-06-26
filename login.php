<?php
include('conexao.php');
include_once('includes/header.php');
?>

<!-- Banner da Página -->
<section class="container-fluid px-0 mb-5">
    <div class="text-black py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h1 class="display-4 fw-bold mb-3">Área Administrativa</h1>
                    <p class="lead">Acesso restrito para administradores do sistema.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Formulário de Login -->
<section class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6">
            <div class="news-card">
                <div class="p-4">
                    <div class="text-center mb-4">
                        <i class="fas fa-user-shield fa-3x text-primary-custom mb-3"></i>
                        <h3 class="text-primary-custom">Login Administrativo</h3>
                    </div>

                    <form action="projetoFinalAdmin/login-acao.php" method="POST">
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuário</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="email" class="form-control" id="usuario" name="txtUsuario" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Senha</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" id="password" name="txtSenha" required>
                                <button class="btn btn-outline-secondary" type="button" name="togglePassword" onclick="togglePassword()">
                                    <i class="fas fa-eye" id="toggleIcon"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="lembrar" name="lembrar">
                                <label class="form-check-label" for="lembrar">
                                    Lembrar-me
                                </label>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary-custom btn-lg">
                                <i class="fas fa-sign-in-alt me-2"></i>Entrar
                            </button>
                        </div>
                    </form>

                    <hr class="my-4">

                    <div class="text-center">
                        <a href="#" class="text-decoration-none text-primary-custom">
                            <i class="fas fa-key me-1"></i>Esqueci minha senha
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Informações de Segurança -->
<section class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="highlight-section text-center">
                <h4 class="text-primary-custom mb-3">Informações de Segurança</h4>

                <div class="row g-4">
                    <div class="col-md-4">
                        <i class="fas fa-shield-alt fa-2x text-primary-custom mb-2"></i>
                        <h6>Acesso Seguro</h6>
                        <p class="small text-muted">Conexão protegida por SSL</p>
                    </div>

                    <div class="col-md-4">
                        <i class="fas fa-clock fa-2x text-primary-custom mb-2"></i>
                        <h6>Sessão Limitada</h6>
                        <p class="small text-muted">Logout automático por inatividade</p>
                    </div>

                    <div class="col-md-4">
                        <i class="fas fa-user-check fa-2x text-primary-custom mb-2"></i>
                        <h6>Acesso Autorizado</h6>
                        <p class="small text-muted">Apenas usuários autorizados</p>
                    </div>
                </div>

                <div class="mt-4">
                    <p class="small text-muted">
                        <i class="fas fa-info-circle me-1"></i>
                        Para solicitar acesso ou reportar problemas, entre em contato com a coordenação.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Links Úteis -->
<section class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h5 class="text-center text-primary-custom mb-4">Links Úteis</h5>

            <div class="list-group">
                <a href="index.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-home me-2"></i>Voltar ao Site Principal
                </a>
                <a href="contato.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-phone me-2"></i>Contato
                </a>
                <a href="instituicao.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-info-circle me-2"></i>Sobre a Instituição
                </a>
                <a href="cursos.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-graduation-cap me-2"></i>Cursos Oferecidos
                </a>
            </div>
        </div>
    </div>
</section>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }

    // Adicionar validação básica
    document.querySelector('form').addEventListener('submit', function (e) {
        const usuario = document.getElementById('usuario').value;
        const password = document.getElementById('password').value;

        if (usuario.length < 3) {
            e.preventDefault();
            alert('O usuário deve ter pelo menos 3 caracteres.');
            return;
        }

        if (password.length < 4) {
            e.preventDefault();
            alert('A senha deve ter pelo menos 4 caracteres.');
            return;
        }
    });
</script>

<?php include_once('includes/footer.php'); ?>