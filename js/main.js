// JavaScript personalizado para o site CEEP
document.addEventListener('DOMContentLoaded', function() {
    
    // Smooth scrolling para links internos
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Animação de fade-in para elementos quando entram na viewport
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in-up');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observar elementos para animação
    document.querySelectorAll('.news-card, .highlight-section, .section-title').forEach(el => {
        observer.observe(el);
    });

    // Melhorar a experiência do dropdown no mobile
    // const dropdownToggle = document.querySelector('.dropdown-toggle');
    // if (dropdownToggle) {
    //     dropdownToggle.addEventListener('click', function(e) {
    //         if (window.innerWidth <= 768) {
    //             e.preventDefault();
    //             const dropdownMenu = this.nextElementSibling;
    //             dropdownMenu.classList.toggle('show');
    //         }
    //     });
    // }

    // Fechar dropdown ao clicar fora (mobile)
    document.addEventListener('click', function(e) {
        if (window.innerWidth <= 768) {
            const dropdown = document.querySelector('.dropdown-menu.show');
            if (dropdown && !dropdown.contains(e.target) && !dropdown.previousElementSibling.contains(e.target)) {
                dropdown.classList.remove('show');
            }
        }
    });

    // Lazy loading para imagens
    //const images = document.querySelectorAll('img[data-src]');
    //const imageObserver = new IntersectionObserver((entries, observer) => {
    //    entries.forEach(entry => {
    //        if (entry.isIntersecting) {
    //            const img = entry.target;
    //            img.src = img.dataset.src;
    //            img.classList.remove('lazy');
    //            imageObserver.unobserve(img);
    //        }
    //    });
    //});

    //images.forEach(img => imageObserver.observe(img));

    // Melhorar a busca (se implementada)
    const searchForm = document.querySelector('form[role="search"], form .input-group');
    if (searchForm) {
        const searchInput = searchForm.querySelector('input[type="search"]');
        if (searchInput) {
            searchInput.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            searchInput.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        }
    }

    // Adicionar classe ativa ao link da página atual
    const currentPage = window.location.pathname.split('/').pop() || 'index.php';
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    
    navLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (href === currentPage || (currentPage === '' && href === 'index.php')) {
            link.classList.add('active');
            link.style.color = '#f8f9fa';
        }
    });

    // Melhorar a experiência do carrossel
    const carousel = document.querySelector('.carousel');
    if (carousel) {
        // Pausar o carrossel quando o mouse estiver sobre ele
        carousel.addEventListener('mouseenter', function() {
            const carouselInstance = bootstrap.Carousel.getInstance(this);
            if (carouselInstance) {
                carouselInstance.pause();
            }
        });

        // Retomar o carrossel quando o mouse sair
        carousel.addEventListener('mouseleave', function() {
            const carouselInstance = bootstrap.Carousel.getInstance(this);
            if (carouselInstance) {
                carouselInstance.cycle();
            }
        });
    }

    // Adicionar efeito de loading aos botões de formulário
    const submitButtons = document.querySelectorAll('button[type="submit"], input[type="submit"]');
    submitButtons.forEach(button => {
        button.addEventListener('click', function() {
            if (this.form && this.form.checkValidity()) {
                this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Enviando...';
                this.disabled = true;
            }
        });
    });

    // Melhorar a acessibilidade
    document.addEventListener('keydown', function(e) {
        // Escape para fechar dropdowns
        if (e.key === 'Escape') {
            const openDropdowns = document.querySelectorAll('.dropdown-menu.show');
            openDropdowns.forEach(dropdown => {
                dropdown.classList.remove('show');
            });
        }
    });

    // Adicionar indicador de carregamento para navegação
    const navLinksForLoading = document.querySelectorAll('.navbar-nav .nav-link:not(.dropdown-toggle)');
    navLinksForLoading.forEach(link => {
        link.addEventListener('click', function(e) {
            if (this.href && this.href !== window.location.href) {
                const loadingIndicator = document.createElement('div');
                loadingIndicator.className = 'loading-indicator';
                loadingIndicator.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                loadingIndicator.style.cssText = `
                    position: fixed;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    background: rgba(54, 28, 17, 0.9);
                    color: white;
                    padding: 20px;
                    border-radius: 10px;
                    z-index: 9999;
                    font-size: 1.5rem;
                `;
                document.body.appendChild(loadingIndicator);
            }
        });
    });

    console.log('CEEP - Site carregado com sucesso!');
});

