</main>
<footer class="bg-primary-custom text-white mt-2 pt-2 pb-2">
    <div class="container">
        <div class="row align-items-center">

            <!-- Coluna Esquerda: Dias, Horários e Ícones -->
            <div class="col-md-5 text-center mb-1 mb-md-0">
                <p class="fw-bold mb-2">Segunda a Sexta:</p>

                <!-- Horários em linha, bem distribuídos -->
                <div class="d-flex justify-content-center flex-wrap gap-2">
                    <span>07:30 às 11:50</span>
                    <span>13:00 às 17:20</span>
                    <span>18:40 às 22:30</span>
                </div>

                <!-- Ícones sociais -->
                <div class="social-icons mt-2">
                    <a href="https://www.instagram.com/ceeplaranjeiras?igsh=MXB6dzM3bDh1aml0Nw==" class="text-white fs-5 mx-2"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.facebook.com/ceeplaranjeirasdosul" class="text-white fs-5 mx-2"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-white fs-5 mx-2"><i class="fab fa-whatsapp"></i></a>
                    <a href="#" class="text-white fs-5 mx-2"><i class="fas fa-envelope"></i></a>
                </div>
            </div>

            <!-- Coluna Direita: Créditos centralizados -->
            <div class="col-md-7 text-center">
                <div>
                    <p class="fs-6 text-white mb-0">
                        &copy; 2025 CEEP – Todos os direitos reservados<br>
                        Desenvolvido pela turma de Análise e Desenvolvimento de Sistemas 2024/2025
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap 5 JS Bundle com Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<!-- JavaScript personalizado -->
<script src="js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    Fancybox.bind("[data-fancybox='imagem']", {
        // Your custom options
    });
</script>


<script>
    /*
    document.addEventListener('DOMContentLoaded', function() {
        const galleryTab = document.querySelector('#gallery-tab');

        galleryTab?.addEventListener('shown.bs.tab', function() {
            Fancybox.destroy(); // remove binds antigos
            Fancybox.bind('[data-fancybox="galeria"]'); // reativa todos
        });

        // Se já estiver visível por padrão (sem clicar na aba)
        if (document.querySelector('#gallery').classList.contains('show')) {
            Fancybox.bind('[data-fancybox="galeria"]');
        }
    });*/
</script>

</body>

</html>