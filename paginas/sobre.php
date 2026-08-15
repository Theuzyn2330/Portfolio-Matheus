<?php
    include '../componentes/header.php';
    include '../componentes/menu.php';
?>

<div class="bg-background"></div>
<div class="neon-glow"></div>

<style>
    .secao-alternavel {
        max-width: 1000px;
        margin: 0 auto;
        padding: 120px 20px 60px;
        min-height: 80vh;
    }

    .botoes-interruptor {
        position: relative;
        display: inline-flex;
        align-items: center;
        width: 100%;
        max-width: 460px;
        padding: 6px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.08);
        overflow: hidden;
        margin-bottom: 30px;
    }

    .switch-bg {
        position: absolute;
        top: 6px;
        left: 6px;
        width: calc(50% - 6px);
        height: calc(100% - 12px);
        border-radius: 999px;
        background: linear-gradient(135deg, #ff00ff, #ff4fe8);
        box-shadow: 0 0 18px rgba(255, 0, 255, 0.9), 0 0 30px rgba(255, 0, 255, 0.45);
        transition: transform 0.35s ease, box-shadow 0.35s ease;
        z-index: 0;
    }

    .botoes-interruptor.modo-pessoal .switch-bg {
        transform: translateX(100%);
    }

    .switch-option {
        position: relative;
        z-index: 1;
        flex: 1;
        border: none;
        background: transparent;
        color: #ffffff;
        padding: 12px 18px;
        border-radius: 999px;
        cursor: pointer;
        font-weight: 600;
        font-size: 0.95rem;
        transition: color 0.25s ease;
        white-space: nowrap;
    }

    .switch-option.ativo {
        color: #000000;
    }

    .botoes-interruptor.modo-pessoal .switch-option[data-aba="pessoal"].ativo {
        color: #000000;
    }

    .botoes-interruptor:not(.modo-pessoal) .switch-option[data-aba="profissional"].ativo {
        color: #000000;
    }

    .conteudo-container {
        display: flex;
        align-items: center;
        gap: 50px;
    }

    .area-texto {
        flex: 1;
        font-size: 1.1rem;
        line-height: 1.6;
        color: #cccccc;
    }

    .area-imagem {
        flex: 1;
        display: flex;
        justify-content: center;
    }

    .area-imagem img {
        max-width: 100%;
        width: 350px;
        height: auto;
        border: 4px solid #ff00ff;
        border-radius: 60% 40% 50% 50% / 50% 50% 60% 40%;
        box-shadow: 0 0 20px rgba(255, 0, 255, 0.4);
        transition: opacity 0.3s ease;
    }

    .texto-ciano {
        color: #00ffff;
        margin-bottom: 15px;
    }

    @media (max-width: 768px) {
        .conteudo-container {
            flex-direction: column;
            text-align: center;
        }

        .botoes-interruptor {
            max-width: 100%;
        }
    }
</style>

<section class="secao-alternavel">
    <div class="botoes-interruptor" id="interruptor-perfil">
        <div class="switch-bg"></div>

        <button type="button" id="btn-profissional" class="switch-option ativo" data-aba="profissional">
             Profissional
        </button>

        <button type="button" id="btn-pessoal" class="switch-option" data-aba="pessoal">
            Pessoal
        </button>
    </div>

    <div class="conteudo-container">
        <div class="area-texto">
            <h2 id="titulo-conteudo" class="texto-ciano">Perfil Profissional</h2>
            <p id="paragrafo-conteudo">
Comecei minha formação em tecnologia em 2022, no curso técnico de <strong> Informática para Internet pelo IFMA </strong>. Em 2024, participei do Liga Jovem, pela Herbatec, e atualmente curso Engenharia de Software.

Tenho foco em <strong> desenvolvimento backend </strong>, principalmente com PHP, SQL, PDO, JavaScript e APIs. Gosto de transformar ideias em sistemas funcionais e venho explorando também arquitetura de software, segurança, Docker, deploy e criação de produtos digitais.

Mais do que apenas programar, gosto de construir soluções e transformar ideias em projetos reais.
            </p>
        </div>

        <div class="area-imagem">
            <img id="imagem-conteudo" src="/assets/imagens/profissional.jpeg" alt="Imagem do Perfil">
        </div>
    </div>
</section>

<?php
    include '../componentes/footer.php';
?>