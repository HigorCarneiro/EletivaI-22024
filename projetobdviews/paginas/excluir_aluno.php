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

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $id = intval($_POST['id']);
            if (excluirAluno($id)){
                header('Location: alunos.php');
                exit();
            } else {
                $erro = "Erro ao excluir o aluno!";
            }
        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    } else {
        if (isset($_GET['id'])){
            $id = intval($_GET['id']);
            $aluno = retornaAlunoPorId($id);
            if ($aluno == null){
                header('Location: alunos.php');
                exit();
            }
        } else {
            header('Location: alunos.php');
            exit();
        }
    }
?>

<div class="container mt-5">
    <h2>Excluir Aluno</h2>

    <p>Tem certeza de que deseja excluir o aluno abaixo?</p>
    <ul>
        <li><strong>Nome: <?= $aluno['nome'] ?></strong> </li>
        <li><strong>Idade: <?= $aluno['idade'] ?></strong> </li>
    </ul>

    <form method="post">
        <input type="hidden" name="id" value="<?= $aluno['id'] ?>" />
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="alunos.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
