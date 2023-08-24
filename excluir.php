<?php
    // carregando o autoload
    require __DIR__.'/vendor/autoload.php';

    define ('TITLE', 'Editar vaga');

    use \App\Entity\Vaga;

    if (!isset($_GET['id']) or !is_numeric($_GET['id'])){
        header('location: index.php?status=error');
        exit;
    }

    //carrega a vaga
    $obVaga = Vaga::getVaga($_GET['id']);

    //valida a vaga e retorna para home 
    if(!$obVaga instanceof Vaga){
        header('location: index.php?status=error');
        exit;
    }

    //manipulando info do form via post e jogando dentro do objeto
    if (isset($_POST['excluir'])){

        $obVaga->excluir();
        
        header('location: index.php?status=success');
        exit;
        
    }

    //echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

    //incluindo conteudo
    include __DIR__.'/includes/header.php' ;
    include __DIR__.'/includes/confirmar-exclusao.php' ;
    include __DIR__.'/includes/footer.php' ;