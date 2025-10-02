/**
 * Frontend Dev Portfolio Theme - Main JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Smooth scrolling para links âncora
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    // Formulário de contato AJAX
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            formData.append('action', 'contact_form');
            formData.append('nonce', frontend_dev_ajax.nonce);
            formData.append('name', formData.get('contact_name'));
            formData.append('email', formData.get('contact_email'));
            formData.append('message', formData.get('contact_message'));
            
            const submitButton = this.querySelector('button[type="submit"]');
            const messageDiv = document.getElementById('contact-message');
            
            // Desabilita botão durante envio
            submitButton.disabled = true;
            submitButton.querySelector('span').textContent = 'Enviando...';
            
            fetch(frontend_dev_ajax.ajaxurl, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                messageDiv.style.display = 'block';
                
                if (data.success) {
                    messageDiv.innerHTML = '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">' + data.data + '</div>';
                    contactForm.reset();
                } else {
                    messageDiv.innerHTML = '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">' + data.data + '</div>';
                }
                
                // Remove mensagem após 5 segundos
                setTimeout(() => {
                    messageDiv.style.display = 'none';
                }, 5000);
            })
            .catch(error => {
                messageDiv.style.display = 'block';
                messageDiv.innerHTML = '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">Erro ao enviar mensagem. Tente novamente.</div>';
                console.error('Error:', error);
            })
            .finally(() => {
                // Reabilita botão
                submitButton.disabled = false;
                submitButton.querySelector('span').textContent = 'Enviar';
            });
        });
    }

    // Header fixo ao fazer scroll
    const header = document.querySelector('header');
    if (header) {
        let lastScrollTop = 0;
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > 100) {
                header.classList.add('fixed', 'top-0', 'left-0', 'right-0', 'z-50', 'bg-white/95', 'backdrop-blur-sm');
            } else {
                header.classList.remove('fixed', 'top-0', 'left-0', 'right-0', 'z-50', 'bg-white/95', 'backdrop-blur-sm');
            }
            
            lastScrollTop = scrollTop;
        });
    }

    // Animação de entrada dos elementos
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
            }
        });
    }, observerOptions);

    // Observa seções para animação
    const sections = document.querySelectorAll('h1, h2, .post-item, .archive-post-item');
    sections.forEach(section => {
        observer.observe(section);
    });

    // Navegação mobile (se implementada)
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const mobileMenu = document.querySelector('.mobile-menu');
    
    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Lazy loading para imagens
    const images = document.querySelectorAll('img[data-src]');
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });

    images.forEach(img => imageObserver.observe(img));

    // Botão voltar ao topo
    const backToTopButton = document.createElement('button');
    backToTopButton.innerHTML = '↑';
    backToTopButton.className = 'fixed bottom-4 right-4 bg-[#293338] text-white w-12 h-12 rounded-full hidden items-center justify-center z-50 hover:bg-[#131516] transition-colors';
    backToTopButton.id = 'back-to-top';
    document.body.appendChild(backToTopButton);

    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTopButton.classList.remove('hidden');
            backToTopButton.classList.add('flex');
        } else {
            backToTopButton.classList.add('hidden');
            backToTopButton.classList.remove('flex');
        }
    });

    backToTopButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});

// CSS para animações
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeIn 0.6s ease-out forwards;
    }

    .lazy {
        opacity: 0;
        transition: opacity 0.3s;
    }

    .lazy.loaded {
        opacity: 1;
    }

    /* Responsividade adicional */
    @media (max-width: 768px) {
        .px-40 {
            padding-left: 1rem;
            padding-right: 1rem;
        }
        
        header {
            padding-left: 1rem;
            padding-right: 1rem;
        }
        
        header .flex.items-center.gap-9 {
            display: none;
        }
        
        header .mobile-menu-toggle {
            display: block;
        }
    }

    @media (max-width: 1024px) {
        .px-40 {
            padding-left: 2rem;
            padding-right: 2rem;
        }
    }
`;
document.head.appendChild(style);