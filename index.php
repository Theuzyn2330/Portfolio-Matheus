
<?php
// Puxa a estrutura inicial, CSS, fontes e a abertura do body
    include 'componentes/header.php';

// Puxa barra de navegação
    include 'componentes/menu.php';

?>

<!-- FUNDO --->
 
<div class="bg-background"></div>
<div class="neon-glow"></div>


    <div id= "conteudo">
        <?php
            // Puxa toda classe hero
            include 'paginas/home.php';

        ?>
    </div>

<?php
    //Carrosel de projetos (certamente vou por pra aparecer so quando ir na opção que ta na barra de navegação)
    include 'paginas/projetos.php';

    //Puxa o fechamento das tags e os scripts finais
    include  'componentes/footer.php';
?>
