<?php

    $resultados = '';

    foreach($vagas as $vaga){
        $resultados .= '<tr>
                        <td> '.$vaga->id.' </td>
                        <td> '.$vaga->titulo.' </td>
                        <td> '.$vaga->descricao.' </td>
                        <td> '.($vaga->ativo == 's' ? 'Ativo' : 'Inativo').' </td>
                        <td> '.date('d/m/Y à\s H:i:s', strtotime($vaga->data)).' </td>
                        <td>
                            <a href="editar.php?id='.$vaga->id.'">
                            <button type="button" class="btn btn-primary">Editar</button>
                            </a>
                            <a href="excluir.php?id='.$vaga->id.'">
                            <button type="button" class="btn btn-danger">Excluir</button>
                            </a>
                        </td>
                        </tr>';
    }
?>

<main>
    <section>

    <a href="cadastro.php">
        <button class="btn btn-success">Nova vaga</button>
    </a>
    
    </section>
    
    <section>
        <table class="table table-hover mt-5">    
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
               <?=$resultados?>
            </tbody>
        </table>
    </section>




</main>