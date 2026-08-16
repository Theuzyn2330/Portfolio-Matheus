<?php
$page = $_GET['page'] ?? 'home';

include 'componentes/header.php';
include 'componentes/menu.php';
?>

<div class="bg-background"></div>
<div class="neon-glow"></div>

<div id="conteudo">
    <?php
        if ($page === 'detalhes_projeto') {
            include 'paginas/detalhes_projeto.php';
        } elseif ($page === 'sobre') {
            include 'paginas/sobre.php';
        } elseif ($page === 'contato') {
            include 'paginas/contato.php';
        } else {
            include 'paginas/home.php';
        }
    ?>
</div>

<?php
    if ($page === 'home' || $page === 'sobre' || $page === 'contato') {
        include 'paginas/projetos.php';
        include 'paginas/musicas.php';
    }

    include 'componentes/footer.php';
?>
