<?php

declare(strict_types = 1);

require_once('../config/bancodedados.php');

function cadastrarCurso(string $descricao, int $aulas_semanais) {
    global $pdo;
    $stament = $pdo->prepare("INSERT INTO cursos (descricao, aulas_semanais) VALUES (?, ?)");
    return $stament->execute([$descricao, $aulas_semanais]);
}

function excluirCurso(int $id):bool{
    global $pdo;
    $stament = $pdo->prepare("DELETE FROM cursos WHERE id = ?");
    return $stament->execute([$id]);
}

function todosCursos(): array{
    global $pdo;
    $stament = $pdo->query(" SELECT * FROM cursos");
    return $stament->fetchAll(PDO::FETCH_ASSOC);
}

function retornaCursoPorId(int $id): ?array{
    global $pdo;
    $stament = $pdo->prepare("SELECT * FROM cursos WHERE id = ?");
    $stament->execute([$id]);
    $curso = $stament->fetch(PDO::FETCH_ASSOC);
    return $curso ? $curso : null;
}
?>