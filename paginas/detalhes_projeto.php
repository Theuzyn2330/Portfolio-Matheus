<?php
    $projetos = [
        'pdv' => [
            'titulo' => 'Empório das Poções',
            'imagem' => 'assets/imagens/projetos/pdv.png',
            'descricao' => 'Sistema de ponto de venda completo desenvolvido em PHP 8+ com MySQL, projetado para operação de caixa com foco em segurança financeira e consistência de dados. A aplicação adota arquitetura inspirada em MVC com Front Controller e acesso a dados via PDO com Prepared Statements. O motor do PDV processa o checkout de forma atômica utilizando transações de banco de dados e bloqueio de linhas (FOR UPDATE), prevenindo venda duplicada e inconsistência de estoque. Toda a regra de preço e subtotal é validada exclusivamente no servidor, mantendo um histórico de vendas imutável com preços da época da transação e métricas comerciais em tempo real.',
            'link' => 'https://pdv-porcoes.onrender.com/',
            'tags' => ['PHP', 'MySQL', 'PDO']
        ],
        'portfolio' => [
            'titulo' => 'Portfólio Pessoal',
            'imagem' => 'assets/imagens/profile.jpeg',
            'descricao' => 'Portfólio em PHP com layout moderno, visual escuro e neon, projetado para apresentar projetos, habilidades e identidade profissional de forma elegante e impactante. A página foi pensada para facilitar a navegação, destacar o trabalho e transmitir uma imagem sólida para clientes, recrutadores e parceiros.',
            'link' => 'https://github.com/Theuzyn2330',
            'tags' => ['Crud','Banco de Dados', 'PHP']

        ],


        'api' =>[
            'titulo' => 'Youtube Data API V3',
            'imagem' => 'assets/imagens/projetos/api.jpg',
            'descricao' => 'Desenvolvida em PHP, esta funcionalidade consome a YouTube Data API v3 para renderizar dinamicamente os vídeos selecionados na interface.

Como funciona:

Configuração Segura: O pacote vlucas/phpdotenv carrega a chave de API e os IDs dos vídeos a partir de um arquivo .env protegido.

Requisição HTTP: O PHP utiliza cURL para enviar um GET ao endpoint videos.list (part=snippet) solicitando apenas os metadados necessários.

Processamento & Renderização: O JSON de resposta é validado e percorrido com um foreach, montando dinamicamente os cards na tela com o título, canal e o player iframe incorporado.

Resiliência: Inclui tratamento de erros para falhas na requisição/API e mensagens amigáveis de fallback para o usuário.',
           'tags' => ['YoutubeV3','API']
        ]
    ];

    $idProjeto = $_GET['id'] ?? null;
    $projeto = $idProjeto ? ($projetos[$idProjeto] ?? null) : null;
?>
<div class="bg-background"></div>
<div class="neon-glow"></div>

<div class="detalhes-wrapper">
    <?php if (!$projeto): ?>
        <div class="erro-container">
            <h2>Projeto não encontrado</h2>
            <p>O projeto solicitado não existe ou foi removido. Volte para a página inicial e escolha outro item.</p>
            <a href="index.php" class="btn-voltar-erro"><i class="fas fa-arrow-left"></i> Voltar para início</a>
        </div>
    <?php else: ?>
        <div class="detalhes-shell">

            <article class="detalhes-projeto fade-in">
                <div class="detalhes-imagem">
                    <img src="<?= $projeto['imagem']; ?>" alt="<?= htmlspecialchars($projeto['titulo']); ?>">
                </div>

                <div class="detalhes-info">
                    <div class="projeto-tags">
                        <?php foreach ($projeto['tags'] ?? [] as $tag): ?>
                            <span class="projeto-badge"><?= htmlspecialchars($tag); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <h1><?= htmlspecialchars($projeto['titulo']); ?></h1>
                    <p><?= nl2br(htmlspecialchars($projeto['descricao'])); ?></p>

                    <a href="<?= htmlspecialchars($projeto['link'] ?? '#'); ?>" class="btn-externo" target="_blank" rel="noopener noreferrer">
                        <i class="fas fa-external-link-alt"></i> Visitar Projeto Online
                    </a>
                </div>
            </article>
        </div>
    <?php endif; ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const fadeItem = document.querySelector('.fade-in');
        if (fadeItem) {
            fadeItem.style.opacity = '0';
            fadeItem.style.transform = 'translateY(18px)';
            fadeItem.style.transition = 'opacity 0.5s ease, transform 0.5s ease';

            requestAnimationFrame(() => {
                fadeItem.style.opacity = '1';
                fadeItem.style.transform = 'translateY(0)';
            });
        }
    });
</script>

