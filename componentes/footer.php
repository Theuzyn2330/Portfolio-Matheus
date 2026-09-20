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

        // Carrossel continuo de skills com clique, touch e arraste.
        document.querySelectorAll('[data-skills-carousel]').forEach((carousel) => {
            const viewport = carousel.querySelector('.skills-viewport');
            const track = carousel.querySelector('[data-skills-track]');
            const firstGroup = track?.querySelector('.skills-group');
            if (!viewport || !track || !firstGroup) return;

            let offset = 0;
            let lastX = 0;
            let lastTime = 0;
            let velocity = 0;
            let dragging = false;
            let activePointer = null;
            let movedDuringDrag = false;
            let holdTimer = null;
            let longPressTriggered = false;
            const baseSpeed = 0.45;

            function loopWidth() {
                return firstGroup.getBoundingClientRect().width;
            }

            function normalizeOffset() {
                const width = loopWidth();
                if (!width) return;
                while (offset <= -width) offset += width;
                while (offset > 0) offset -= width;
            }

            function render() {
                normalizeOffset();
                track.style.transform = `translate3d(${offset}px, 0, 0)`;
            }

            function animate() {
                if (!dragging) {
                    offset -= baseSpeed + Math.min(Math.abs(velocity), 3);
                    velocity *= 0.96;
                    render();
                }
                requestAnimationFrame(animate);
            }

            viewport.addEventListener('pointerdown', (event) => {
                dragging = true;
                activePointer = event.pointerId;
                lastX = event.clientX;
                lastTime = performance.now();
                velocity = 0;
                movedDuringDrag = false;
                longPressTriggered = false;
                const pressedTag = event.target.closest('.skill-tag');
                if (pressedTag && event.pointerType === 'touch') {
                    holdTimer = setTimeout(() => {
                        carousel.querySelectorAll('.skill-tag[aria-expanded="true"]').forEach((openTag) => {
                            openTag.setAttribute('aria-expanded', 'false');
                        });
                        pressedTag.setAttribute('aria-expanded', 'true');
                        longPressTriggered = true;
                    }, 450);
                }
                viewport.classList.add('is-dragging');
                viewport.setPointerCapture(event.pointerId);
            });

            viewport.addEventListener('pointermove', (event) => {
                if (!dragging || event.pointerId !== activePointer) return;
                const now = performance.now();
                const deltaX = event.clientX - lastX;
                const elapsed = Math.max(now - lastTime, 1);
                offset += deltaX;
                if (Math.abs(deltaX) > 3) {
                    movedDuringDrag = true;
                    clearTimeout(holdTimer);
                }
                velocity = Math.min(Math.abs(deltaX / elapsed) * 16, 3);
                lastX = event.clientX;
                lastTime = now;
                render();
            });

            function stopDragging(event) {
                if (!dragging || event.pointerId !== activePointer) return;
                clearTimeout(holdTimer);
                dragging = false;
                activePointer = null;
                viewport.classList.remove('is-dragging');
            }

            viewport.addEventListener('pointerup', stopDragging);
            viewport.addEventListener('pointercancel', stopDragging);

            carousel.addEventListener('click', (event) => {
                const tag = event.target.closest('.skill-tag');
                if (longPressTriggered) {
                    longPressTriggered = false;
                    return;
                }
                if (!tag || dragging || movedDuringDrag) {
                    movedDuringDrag = false;
                    return;
                }

                const isOpen = tag.getAttribute('aria-expanded') === 'true';
                carousel.querySelectorAll('.skill-tag[aria-expanded="true"]').forEach((openTag) => {
                    openTag.setAttribute('aria-expanded', 'false');
                });
                tag.setAttribute('aria-expanded', String(!isOpen));
            });

            carousel.addEventListener('keydown', (event) => {
                if (event.key !== 'Escape') return;
                carousel.querySelectorAll('.skill-tag[aria-expanded="true"]').forEach((tag) => {
                    tag.setAttribute('aria-expanded', 'false');
                });
            });

            window.addEventListener('resize', render);
            render();
            requestAnimationFrame(animate);
        });

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
                    texto: "Iniciei minha trajetória na tecnologia em 2022, realizando o curso técnico de Informática para Internet no IFMA, e em 2024 participei do programa Liga Jovem com o projeto Herbatec. Atualmente, curso Engenharia de Software e tenho como principal foco o desenvolvimento backend. Trabalho na construção de sistemas funcionais e integração de APIs utilizando tecnologias como PHP, SQL, PDO e JavaScript. Busco ir além do código, aprofundando meus conhecimentos em arquitetura de software, segurança, Docker, deploy e criação de produtos digitais para transformar ideias em soluções reais e eficientes.",
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