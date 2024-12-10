<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/professores.php';

    $id = $_GET['id'];
    if (!$id){
        header('Location: professores.php');
        exit();
    }

    $professor = retornaProfessorPorId($id);
    if (!$professor){
        header('Location: professores.php');
        exit();
    }

    $erro = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $id = intval($_POST['id']);
            if (excluirProfessor($id)){
                header('Location: professores.php');
                exit();
            } else {
                $erro = "Erro ao excluir o professor!";
            }
        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    } else {
        if (isset($_GET['id'])){
            $id = intval($_GET['id']);
            $professor = retornaProfessorPorId($id);
            if ($professor == null){
                header('Location: professores.php');
                exit();
            }
        } else {
            header('Location: professores.php');
            exit();
        }
    }
    
?>

<div class="container mt-5">
    <h2>Excluir Professor</h2>

    <p>Tem certeza de que deseja excluir o professor abaixo?</p>
    <ul>
        <li><strong>Nome: <?= $professor['nome'] ?></strong> </li>
        <li><strong>E-mail: <?= $professor['email'] ?></strong> </li>
        <li><strong>Formação: <?= $professor['formacao'] ?></strong> </li>
    </ul>

    <form method="post">
        <input type="hidden" name="id" value="<?= $professor['id'] ?>" />
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="professores.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>