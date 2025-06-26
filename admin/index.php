<?php include_once '../includes/header.php'; ?>

<!-- Banner da Página -->
<section class="container-fluid px-0 mb-5">
    <div class="bg-primary-custom text-white py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="display-4 fw-bold mb-3">Painel Administrativo</h1>
                    <p class="lead">Bem-vindo ao sistema de administração do CEEP.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dashboard -->
<section class="container my-5">
    <div class="row g-4">
        <!-- Estatísticas Rápidas -->
        <div class="col-md-3">
            <div class="news-card text-center p-4">
                <i class="fas fa-users fa-3x text-primary-custom mb-3"></i>
                <h4 class="fw-bold">245</h4>
                <p class="text-muted">Alunos Ativos</p>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="news-card text-center p-4">
                <i class="fas fa-graduation-cap fa-3x text-primary-custom mb-3"></i>
                <h4 class="fw-bold">8</h4>
                <p class="text-muted">Cursos Ativos</p>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="news-card text-center p-4">
                <i class="fas fa-chalkboard-teacher fa-3x text-primary-custom mb-3"></i>
                <h4 class="fw-bold">32</h4>
                <p class="text-muted">Professores</p>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="news-card text-center p-4">
                <i class="fas fa-newspaper fa-3x text-primary-custom mb-3"></i>
                <h4 class="fw-bold">15</h4>
                <p class="text-muted">Notícias Publicadas</p>
            </div>
        </div>
    </div>
</section>

<!-- Menu de Administração -->
<section class="container my-5">
    <h2 class="section-title text-center mb-5">Menu de Administração</h2>
    
    <div class="row g-4">
        <div class="col-md-6 col-lg-4">
            <div class="news-card h-100">
                <div class="p-4 text-center">
                    <i class="fas fa-user-graduate fa-3x text-primary-custom mb-3"></i>
                    <h5 class="text-primary-custom">Gerenciar Alunos</h5>
                    <p class="small text-muted mb-3">Cadastro, edição e consulta de alunos matriculados.</p>
                    <a href="#" class="btn btn-primary-custom btn-sm">Acessar</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-4">
            <div class="news-card h-100">
                <div class="p-4 text-center">
                    <i class="fas fa-book fa-3x text-primary-custom mb-3"></i>
                    <h5 class="text-primary-custom">Gerenciar Cursos</h5>
                    <p class="small text-muted mb-3">Administração de cursos, disciplinas e matrizes curriculares.</p>
                    <a href="#" class="btn btn-primary-custom btn-sm">Acessar</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-4">
            <div class="news-card h-100">
                <div class="p-4 text-center">
                    <i class="fas fa-users fa-3x text-primary-custom mb-3"></i>
                    <h5 class="text-primary-custom">Gerenciar Professores</h5>
                    <p class="small text-muted mb-3">Cadastro e administração do corpo docente.</p>
                    <a href="#" class="btn btn-primary-custom btn-sm">Acessar</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-4">
            <div class="news-card h-100">
                <div class="p-4 text-center">
                    <i class="fas fa-newspaper fa-3x text-primary-custom mb-3"></i>
                    <h5 class="text-primary-custom">Gerenciar Notícias</h5>
                    <p class="small text-muted mb-3">Publicação e edição de notícias do site.</p>
                    <a href="#" class="btn btn-primary-custom btn-sm">Acessar</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-4">
            <div class="news-card h-100">
                <div class="p-4 text-center">
                    <i class="fas fa-calendar fa-3x text-primary-custom mb-3"></i>
                    <h5 class="text-primary-custom">Calendário Acadêmico</h5>
                    <p class="small text-muted mb-3">Gestão de eventos e datas importantes.</p>
                    <a href="#" class="btn btn-primary-custom btn-sm">Acessar</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-4">
            <div class="news-card h-100">
                <div class="p-4 text-center">
                    <i class="fas fa-chart-bar fa-3x text-primary-custom mb-3"></i>
                    <h5 class="text-primary-custom">Relatórios</h5>
                    <p class="small text-muted mb-3">Geração de relatórios e estatísticas.</p>
                    <a href="#" class="btn btn-primary-custom btn-sm">Acessar</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Atividades Recentes -->
<section class="container my-5">
    <h3 class="text-primary-custom mb-4">Atividades Recentes</h3>
    
    <div class="highlight-section">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Data/Hora</th>
                        <th>Usuário</th>
                        <th>Ação</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>15/01/2025 14:30</td>
                        <td>admin</td>
                        <td><span class="badge bg-success">Criação</span></td>
                        <td>Nova notícia publicada: "Aula Virtual na Usina"</td>
                    </tr>
                    <tr>
                        <td>15/01/2025 10:15</td>
                        <td>secretaria</td>
                        <td><span class="badge bg-primary">Edição</span></td>
                        <td>Atualização de dados do aluno João Silva</td>
                    </tr>
                    <tr>
                        <td>14/01/2025 16:45</td>
                        <td>coordenacao</td>
                        <td><span class="badge bg-info">Visualização</span></td>
                        <td>Consulta de relatório de matrículas</td>
                    </tr>
                    <tr>
                        <td>14/01/2025 09:20</td>
                        <td>admin</td>
                        <td><span class="badge bg-warning">Modificação</span></td>
                        <td>Alteração na matriz curricular do curso de TI</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Ações Rápidas -->
<section class="container my-5">
    <h3 class="text-primary-custom mb-4">Ações Rápidas</h3>
    
    <div class="row g-3">
        <div class="col-md-6 col-lg-3">
            <a href="#" class="btn btn-outline-dark w-100 p-3">
                <i class="fas fa-plus me-2"></i>Nova Notícia
            </a>
        </div>
        
        <div class="col-md-6 col-lg-3">
            <a href="#" class="btn btn-outline-dark w-100 p-3">
                <i class="fas fa-user-plus me-2"></i>Novo Aluno
            </a>
        </div>
        
        <div class="col-md-6 col-lg-3">
            <a href="#" class="btn btn-outline-dark w-100 p-3">
                <i class="fas fa-file-alt me-2"></i>Gerar Relatório
            </a>
        </div>
        
        <div class="col-md-6 col-lg-3">
            <a href="logout.php" class="btn btn-outline-danger w-100 p-3">
                <i class="fas fa-sign-out-alt me-2"></i>Sair do Sistema
            </a>
        </div>
    </div>
</section>

<!-- Informações do Sistema -->
<section class="container my-5">
    <div class="row">
        <div class="col-lg-6">
            <div class="highlight-section">
                <h5 class="text-primary-custom mb-3">Informações do Sistema</h5>
                <ul class="list-unstyled">
                    <li><strong>Versão:</strong> 2.0.1</li>
                    <li><strong>Último Backup:</strong> 15/01/2025 02:00</li>
                    <li><strong>Usuários Online:</strong> 3</li>
                    <li><strong>Espaço em Disco:</strong> 75% utilizado</li>
                </ul>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="highlight-section">
                <h5 class="text-primary-custom mb-3">Suporte Técnico</h5>
                <p class="small">Para problemas técnicos ou dúvidas sobre o sistema:</p>
                <p class="mb-0">
                    <i class="fas fa-envelope me-2"></i>suporte@ceep.edu.br<br>
                    <i class="fas fa-phone me-2"></i>(00) 0000-0002
                </p>
            </div>
        </div>
    </div>
</section>

<?php include_once '../includes/footer.php'; ?>

