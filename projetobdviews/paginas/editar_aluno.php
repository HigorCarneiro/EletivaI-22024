<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/alunos.php';

    $id = $_GET['id'];
    if (!$id){
        header('Location: alunos.php');
        exit();
    }

    $aluno = retornaAlunoPorId($id);
    if (!$aluno){
        header('Location: alunos.php');
        exit();
    }

    $erro = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try{
            $nome = $_POST['nome'];
            $idade = intval($_POST['idade']);
            $id = intval($_POST['id']);
            if (empty($nome)){
                $erro = "Preencha os campos obrigatórios!";
            } else {
                if (editarAluno($id, $nome, $idade)){
                            header('Location: alunos.php');
                            exit();
                        } else {
                            $erro = "Erro ao editar o aluno!";
                        }
            }

        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Editar Aluno</h2>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" value="<?= $aluno['nome'] ?>" id="nome" class="form-control" value="" required>
        </div>
        <div class="mb-3">
            <label for="idade" class="form-label">Idade</label>
            <input type="number" name="idade" value="<?= $aluno['idade'] ?>" id="idade" class="form-control" value="" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar aluno</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
