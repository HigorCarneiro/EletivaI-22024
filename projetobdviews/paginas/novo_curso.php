<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
?>

<div class="container mt-5">
    <h2>Criar Novo Curso</h2>

    <form method="post">
        <div class="mb-3">
            <label for="descricao" class="form-label">Descricao</label>
            <input type="text" name="descricao" id="descricao" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Curso</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
