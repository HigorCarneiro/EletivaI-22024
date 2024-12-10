<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/matriculas.php';

    $id = $_GET['id'];
    if (!$id){
        header('Location: matriculas.php');
        exit();
    }

    $matricula = retornaMatriculaPorId($id);
    if (!$matricula){
        header('Location: matriculas.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $id = intval($_POST['id']);
            if (excluirMatricula($id)){
                header('Location: matriculas.php');
                exit();
            } else {
                $erro = "Erro ao excluir o matricula!";
            }
        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    } else {
        if (isset($_GET['id'])){
            $id = intval($_GET['id']);
            $matricula = retornaMatriculaPorId($id);
            if ($matricula == null){
                header('Location: matriculas.php');
                exit();
            }
        } else {
            header('Location: matriculas.php');
            exit();
        }
    }
?>

<div class="container mt-5">
    <h2>Excluir Matricula</h2>

    <p>Tem certeza de que deseja excluir a matricula abaixo?</p>
    <ul>
        <li><strong>Curso: <?= $matricula['id_curso'] ?></strong> </li>
        <li><strong>Aluno: <?= $matricula['id_aluno'] ?></strong> </li>
        <li><strong>Professor: <?= $matricula['id_professor'] ?></strong> </li>
    </ul>

    <form method="post">
        <input type="hidden" name="id" value="<?= $matricula['id'] ?>" />
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="matriculas.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
