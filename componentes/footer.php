<script>
    const cardWidth = 350;

    function moveCarousel(direction, button) {
        const section = button?.closest('section');
        const track = section?.querySelector('.carousel-track');

        if (!track) return;

        const visibleCards = Math.max(1, Math.floor(window.innerWidth / cardWidth));
        const maxScroll = -(track.children.length - visibleCards) * cardWidth;
        const currentPosition = parseInt(track.dataset.position || '0', 10) + (-direction * cardWidth);
        let newPosition = currentPosition;

        if (newPosition > 0) {
            newPosition = 0;
        } else if (newPosition < maxScroll) {
            newPosition = maxScroll;
        }

        track.dataset.position = newPosition;
        track.style.transform = `translateX(${newPosition}px)`;
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