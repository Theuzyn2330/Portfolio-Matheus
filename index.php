
<?php
// Puxa a estrutura inicial, CSS, fontes e a abertura do body
    include 'componentes/header.php';

// Puxa barra de navegação
    include 'componentes/menu.php';

?>
    <div class="bg-background"></div>
    <div class="neon-glow"></div>

    <main class="hero">
        <div class="hero-content">
            <h3>Olá, eu sou o</h3>
            <h1>Matheus</h1>
            <p>Desenvolvedor Back-end focado na criação de sistemas web dinâmicos e eficientes, combinando PHP, JavaScript, SQL e interfaces criativas para oferecer experiências únicas aos usuários.</p>
            <a href="#projetos" class="btn-neon">Ver Meus Projetos</a>
        </div>

        <div class="hero-image-profile">
            <div class="img-box">
                <img src="assets/imagens/profile.jpeg" alt="Sua Foto">
            </div>
        </div>
    </main>

    <section class="projects-section" id="projetos">
        <h2>Meus <span>Projetos</span></h2>
        
        <button class="carousel-btn btn-left" onclick="moveCarousel(-1)"><i class="fas fa-chevron-left"></i></button>
        <button class="carousel-btn btn-right" onclick="moveCarousel(1)"><i class="fas fa-chevron-right"></i></button>

        <div class="carousel-container">
            <div class="carousel-track" id="track">
                
                <div class="project-card">
                    <div class="card-img" style="background-image: url('assets/imagens/projetos/construcion.jpeg');"></div>
                    <div class="card-info">
                        <h3>Em construção</h3>
                        <p>Area em construção</p>
                        <a href="#" class="card-link">Acessar Projeto <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="project-card">
                    <div class="card-img" style="background-image: url('assets/imagens/projetos/construcion.jpeg');"></div>
                    <div class="card-info">
                        <h3>Em construção</h3>
                        <p>Area em construção</p>
                        <a href="#" class="card-link">Acessar Projeto <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="project-card">
                    <div class="card-img" style="background-image: url('assets/imagens/projetos/construcion.jpeg');"></div>
                    <div class="card-info">
                        <h3>Em construção</h3>
                        <p>Area em construção</p>
                        <a href="#" class="card-link">Acessar Projeto <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="project-card">
                    <div class="card-img" style="background-image: url('assets/imagens/projetos/construcion.jpeg');"></div>
                    <div class="card-info">
                        <h3>Em construção</h3>
                        <p>Area em construção</p>
                        <a href="#" class="card-link">Acessar Projeto <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        const track = document.getElementById('track');
        let currentPosition = 0;
        
        // Largura do card (320px) + Espaçamento gap (30px)
        const cardWidth = 350; 

        function moveCarousel(direction) {
            const maxScroll = -(track.children.length - Math.floor(window.innerWidth / cardWidth)) * cardWidth;
            
            currentPosition += (-direction * cardWidth);

            if (currentPosition > 0) {
                currentPosition = 0;
            } else if (currentPosition < maxScroll) {
                currentPosition = maxScroll;
            }

            track.style.transform = `translateX(${currentPosition}px)`;
        }
    </script>
</body>
</html>