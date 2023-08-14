<?php
    // carregando o autoload
    require __DIR__.'/vendor/autoload.php';

    use \App\Entity\Vaga;

    $vagas = Vaga::getVagas();

    //incluindo conteudo
    include __DIR__.'/includes/header.php' ;
    include __DIR__.'/includes/listagem.php' ;
    include __DIR__.'/includes/footer.php' ;