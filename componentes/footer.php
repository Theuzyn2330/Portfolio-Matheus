
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