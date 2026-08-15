<footer class="site-footer">
    <div class="footer-container">
        <p>&copy; <span id="current-year"></span> Matheus. Todos os direitos reservados.</p>
        <p class="footer-credits">Desenvolvido com carinho e dedicação.</p>
    </div>
</footer>

<script>

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

        // Scripit do botão do menu

         const menuToggle = document.querySelector('#mobile-menu');
         const navLinks = document.querySelector('.nav-links');

         menuToggle.addEventListener('click', () => {

         navLinks.classList.toggle('active');
    });

    document.querySelectorAll('.nav-links a').forEach(link => {
        link.addEventListener('click', () => {
            navLinks.classList.remove('active');
        });
    });
</script>
</body>

</html>