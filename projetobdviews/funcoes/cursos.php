<?php

declare(strict_types = 1);

require_once('../config/bancodedados.php');

function cadastrarCurso(string $nome, string $descricao, int $aulas_semanais, int $professor_id) {
    global $pdo;
    $stament = $pdo->prepare("INSERT INTO cursos (nome, descricao, aulas_semanais, professor_id) VALUES (?, ?, ?, ?)");
    return $stament->execute([$nome, $descricao, $aulas_semanais, $professor_id]);
}

function editarCurso(int $id, string $nome, string $descricao, int $aulas_semanais, int $professor_id): bool {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE curso SET nome = ?, descricao = ?, aulas_semanais = ?, professor_id = ? WHERE id = ?");
    return $stmt->execute([$nome, $descricao, $aulas_semanais, $professor_id, $id]);
}

function excluirCurso(int $id):bool{
    global $pdo;
    $stament = $pdo->prepare("DELETE FROM cursos WHERE id = ?");
    return $stament->execute([$id]);
}

function todosCursos(): array{
    global $pdo;
    $stament = $pdo->query("SELECT c.*, p.nome as nome_professor FROM cursos c
                            INNER JOIN professores p ON p.id = c.professor_id");
    return $stament->fetchAll(PDO::FETCH_ASSOC);
}

function retornaCursoPorId(int $id): ?array{
    global $pdo;
    $stament = $pdo->prepare("SELECT c.*, p.nome as nome_professor FROM cursos c
                                INNER JOIN professor p ON p.id = c.professor_id
                                WHERE id = ?");
    $stament->execute([$id]);
    $curso = $stament->fetch(PDO::FETCH_ASSOC);
    return $curso ? $curso : null;
}
?>