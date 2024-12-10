<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/professores.php';

    $erro = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $formacao = $_POST['formacao'];

            if (empty($nome) || empty($email) || empty($formacao)) {
                $erro = "Todos os campos são obrigatórios!";
            } else {
                if (cadastrarProfessor($nome, $email, $formacao)){
                    header('Location: professores.php');
                    exit();
                } else {
                    $erro = "Erro ao criar o professor!";
                }
            }
        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }

?>

<div class="container mt-5">
    <h2>Criar Novo Professor</h2>

    <?php if (!empty($erro)): ?>

        <p class="text-danger">$erro</p>

    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="string" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="formacao" class="form-label">Formação</label>
            <input type="text" name="formacao" id="formacao" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Professor</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
