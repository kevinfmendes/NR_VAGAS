<main>

    <h2 class="mt-3 bg-light">Excluir vaga</h2>
    <form method="POST">
        <div class="form-group">
        <p class="bg-light">Você deseja excluir a vaga <strong><?=$obVaga->titulo?></strong>?</p>
        </div>
        <div class="form-group mt-3">
            <a href="index.php">
                <button type="button" class="btn btn-success">Cancelar</button>
            </a>
            <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
        </div>
    </form>
</main>


