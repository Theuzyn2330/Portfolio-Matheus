<?php
// Puxa a estrutura inicial, CSS, fontes e a abertura do body
    include '../componentes/header.php'; 

// Puxa barra de navegação
    include '../componentes/menu.php'; 
?>

<!-- FUNDO -->
<div class="bg-background"></div>
<div class="neon-glow"></div>

<style>
    /* Suas configurações da página de contato */
    .contato-wrapper {
        min-height: 100vh;
        display: flex;
        flex-direction: column; 
        align-items: center;
        justify-content: center;
        padding-top: 80px; 
    }

    /* Estilizando o Título */
    .contato-wrapper h3 {
        font-size: 2.5rem;
        margin-bottom: 40px;
        color: #ffffff;
        text-align: center;
    }

    /* Container dos Botões */
    .social-container {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        justify-content: center;
    }

    /* Estilo Base dos Botões */
    .social-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 12px 24px;
        border-radius: 8px;
        text-decoration: none;
        color: #ffffff;
        font-weight: 600;
        font-size: 16px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .social-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        filter: brightness(1.1);
    }

    .github { background-color: #24292e; }
    .linkedin { background-color: #0077b5; }
    .twitter { background-color: #1da1f2; }
    .instagram { background-image: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); }
</style>
        
<div class="contato-wrapper">

            <h3>Entre em contato!</h3>

    <div class="social-container">


        <!-- Botão do GitHub -->
        <a href="https://github.com/Theuzyn2330" target="_blank" class="social-btn github">
            <i class="fab fa-github"></i> GitHub
        </a>

        <!-- Vou por depois-->

        <!-- Botão do LinkedIn 
        <a href="https://linkedin.com" target="_blank" class="social-btn linkedin">
            <i class="fab fa-linkedin"></i> LinkedIn
        </a>

         -->

        <!-- Botão do Twitter/X
        <a href="https://twitter.com" target="_blank" class="social-btn twitter">
            <i class="fab fa-x-twitter"></i> Twitter
        </a> 
        -->

        <!-- Botão do Instagram -->
        <a href="https://www.instagram.com/theuzyn_2307" target="_blank" class="social-btn instagram">
            <i class="fab fa-instagram"></i> Instagram
        </a>
    </div>
</div>

<?php
    // Puxa o fechamento das tags e os scripts finais
    include '../componentes/footer.php';
?>