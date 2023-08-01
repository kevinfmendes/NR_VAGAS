<?php
    // carregando o autoload
    require __DIR__.'/vendor/autoload.php';

    use \App\Entity\Vaga;

    //manipulando info do form via post e jogando dentro do objeto
    if (isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){

        $obVaga = new Vaga;
        $obVaga->titulo = $_POST['titulo'];
        $obVaga->descricao = $_POST['descricao'];
        $obVaga-> ativo = $_POST['ativo'];

        $obVaga->cadastrar();
        

    }

    // este trehco de código p/ 'debugar' kk //echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

    //incluindo conteudo
    include __DIR__.'/includes/header.php' ;
    include __DIR__.'/includes/form.php' ;
    include __DIR__.'/includes/footer.php' ;