<!-- Rodapé simples e elegante -->
    <footer class="site-footer">
        <div class="footer-container">
            <p>&copy; <span id="current-year"></span> Matheus. Todos os direitos reservados.</p>
            <p class="footer-credits">Desenvolvido com foco e performance.</p>
        </div>
    </footer>

    <script>
        // Atualiza o ano do footer
        const yearSpan = document.getElementById('current-year');
        if (yearSpan) {
            yearSpan.textContent = new Date().getFullYear();
        }

        // Script do carrossel
        function moveCarousel(direction, button) {
            const section = button?.closest('section');
            const track = section?.querySelector('.carousel-track');

            if (!track) return;

            const card = track.querySelector('.project-card, .music-card');
            if (!card) return;

            const gap = 30;
            const scrollAmount = card.offsetWidth + gap;

            track.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
        }

        // Script do botão do menu
        const menuToggle = document.querySelector('#mobile-menu');
        const navLinks = document.querySelector('.nav-links');

        if (menuToggle && navLinks) {
            menuToggle.addEventListener('click', () => {
                navLinks.classList.toggle('active');
            });

            document.querySelectorAll('.nav-links a').forEach(link => {
                link.addEventListener('click', () => {
                    navLinks.classList.remove('active');
                });
            });
        }

        // --------------------------------------------------------
        // NOVO: Script da Seção Alternável (Profissional / Pessoal)
        // --------------------------------------------------------
        const btnProfissional = document.getElementById('btn-profissional');
        const btnPessoal = document.getElementById('btn-pessoal');
        const interruptor = document.getElementById('interruptor-perfil');
        
        // Só executa a lógica se os elementos existirem na página atual
        if (btnProfissional && btnPessoal && interruptor) {
            const titulo = document.getElementById('titulo-conteudo');
            const paragrafo = document.getElementById('paragrafo-conteudo');
            const imagem = document.getElementById('imagem-conteudo');

            const dados = {
                profissional: {
                    titulo: "Perfil Profissional",
                    texto: "Apaixonado por transformar ideias em software. Atuo no desenvolvimento de sistemas web, APIs e aplicações utilizando PHP, Python, JavaScript e SQL, combinando lógica de back-end, banco de dados e interfaces criativas para criar soluções eficientes e memoráveis.",
                    imagem: "/assets/imagens/profissional.jpeg"
                },
                pessoal: {
                    titulo: "Quem é o Matheus Pessoalmente?",
                    texto: "Fora do código, sou um grande fã da cultura geek. Gosto de Senhor dos Anéis, ficção científica, Jurassic Park, jogos e rock. Também gosto de criar histórias, explorar ideias e imaginar mundos e projetos diferentes. Acho que essa criatividade acaba refletindo diretamente na forma como programo: gosto de experimentar, construir coisas e transformar ideias que parecem malucas em algo que realmente funciona.",
                    imagem: "/assets/imagens/gandalf.gif"
                }
            };

            function atualizarEstado(aba) {
                const isPessoal = aba === 'pessoal';
                interruptor.classList.toggle('modo-pessoal', isPessoal);
                btnProfissional.classList.toggle('ativo', aba === 'profissional');
                btnPessoal.classList.toggle('ativo', aba === 'pessoal');
            }

            function mudarAba(aba) {
                imagem.style.opacity = 0; 

                setTimeout(() => {
                    if (aba === 'profissional') {
                        titulo.innerText = dados.profissional.titulo;
                        paragrafo.innerText = dados.profissional.texto;
                        imagem.src = dados.profissional.imagem;
                    } else {
                        titulo.innerText = dados.pessoal.titulo;
                        paragrafo.innerText = dados.pessoal.texto;
                        imagem.src = dados.pessoal.imagem;
                    }

                    atualizarEstado(aba);
                    imagem.style.opacity = 1;
                }, 150); 
            }

            btnProfissional.addEventListener('click', () => mudarAba('profissional'));
            btnPessoal.addEventListener('click', () => mudarAba('pessoal'));
            atualizarEstado('profissional');
        }
    </script>
</body>
</html>