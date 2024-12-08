<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/alunos.php';

    $erro = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $nome = $_POST['nome'];
            $idade = $_POST['idade'];

            if (empty($nome) || empty($idade)) {
                $erro = "Todos os campos são obrigatórios!";
            } else {
                if (cadastrarAluno($nome, $idade)){
                    header('Location: alunos.php');
                    exit();
                } else {
                    $erro = "Erro ao criar o aluno!";
                }
            }
        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }

?>

<div class="container mt-5">
    <h2>Criar Novo Aluno</h2>

    <?php if (!empty($erro)): ?>

        <p class="text-danger">$erro</p>

    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="idade" class="form-label">Idade</label>
            <input type="idade" name="idade" id="idade" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Aluno</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
