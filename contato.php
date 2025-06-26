<?php include_once 'includes/header.php'; ?>

<section class="container contact-info py-5">
    <div class="row g-4">

        <!-- Informações de Contato -->
        <section class="col-md-6">
            <div class="news-card text-center p-4" style="background-color: #fff;">
                <div class="card-body">
                    <h3 class="card-title mb-4">Informações </h3>
                    <p><i class="bi bi-house-door me-2"></i><strong>Endereço:</strong><br>Rua Coronel Guilherme de Paula, 530. Laranjeiras do Sul – PR, Centro,</p>
                    <p><i class="bi bi-phone me-2"></i><strong>Telefone:</strong><br>(42) 3635-2397</p>
                    <p><i class="bi bi-envelope me-2"></i><strong>Email:</strong><br>ljsceeplaranjeiras@seed.pr.gov.br</p>
                    <i class="bi bi-clock me-2"></i><strong>Horário de Funcionamento:</strong>
                    <div class="mb-3">
                        <span class="d-block">07:30 às 11:50</span>
                        <span class="d-block">13:00 às 17:20</span>
                        <span class="d-block">18:40 às 22:30</span>
                    </div>

                    <!-- Ícones sociais -->
                    <div class="social-icons mt-4">
                        <a href="#" class="text-dark fs-4 mx-2" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-dark fs-4 mx-2" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-dark fs-4 mx-2" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                        <a href="#" class="text-dark fs-4 mx-2" aria-label="E-mail"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Formulário de Contato -->
        <section class="col-md-6">
            <div class="news-card text-center p-4" style="background-color: #fff;">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Fale conosco</h3>
                    <form action="contatos.php" method="POST" id="contact-form">
                        <div class="mb-3">
                            <label for="name" class="form-label">Seu Nome</label>
                            <input type="text" class="form-control" id="name" name="name" required />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Seu Email</label>
                            <input type="email" class="form-control" id="email" name="email" required />
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Mensagem</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" style="background-color: #361c11;">Enviar por E-mail</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</section>

<!-- Mapa (Google Maps) -->
<section class="container my-5">
    <div class="text-center mb-4">
        <i class="fas fa-map fa-3x text-primary-custom mb-3"></i>
        <h4 class="text-primary-custom">Mapa da Localização</h4>
    </div>

    <div class="rounded overflow-hidden" style="height: 400px;">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3604.1200193646923!2d-52.42326082534418!3d-25.400792831735316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94efcb1205ab6b87%3A0x4c6769f192dbec61!2sCEEP%20Prof%C2%AA.%20Naiana%20Bavaresco%20Souza%20-%20Escola%20T%C3%A9cnica%20de%20Laranjeiras%20do%20Sul%20-%20PR!5e0!3m2!1spt-BR!2sbr!4v1742170914658!5m2!1spt-BR!2sbr"
            width="100%"
            height="100%"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <div class="text-center mt-3">
        <a href="https://maps.google.com" target="_blank" class="btn btn-primary-custom">
            <i class="fas fa-external-link-alt me-2"></i>Ver no Google Maps
        </a>
    </div>
</section>

<?php include_once 'includes/footer.php'; ?>