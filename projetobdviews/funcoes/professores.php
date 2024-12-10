<?php

declare(strict_types = 1);

require_once('../config/bancodedados.php');

function cadastrarProfessor(string $nome, string $email, string $formacao) {
    global $pdo;
    $stament = $pdo->prepare("INSERT INTO professores (nome, email, formacao) VALUES (?, ?, ?)");
    return $stament->execute([$nome, $email, $formacao]);
}

function editarProfessor(int $id, string $nome, string $email, string $formacao): bool {
    global $pdo;
    $stament = $pdo->prepare("UPDATE professores SET nome = ?, email = ?, formacao = ? WHERE id = ?");
    return $stament->execute([$nome, $email, $formacao, $id]);
}

function excluirProfessor(int $id):bool{
    global $pdo;
    $stament = $pdo->prepare("DELETE FROM professores WHERE id = ?");
    return $stament->execute([$id]);
}

function todosProfessores(): array{
    global $pdo;
    $stament = $pdo->query(" SELECT * FROM professores");
    return $stament->fetchAll(PDO::FETCH_ASSOC);
}

function retornaProfessorPorId(int $id): ? array{
    global $pdo;
    $stament = $pdo->prepare("SELECT * FROM professores WHERE id = ?");
    $stament->execute([$id]);
    $professor = $stament->fetch(PDO::FETCH_ASSOC);
    return $professor ? $professor : null;
}

function gerarDadosGraficoProfessores() {
    global $pdo;
    $sql = " SELECT p.nome, COUNT(m.id) AS num_matriculas
        FROM professores p
        LEFT JOIN cursos c ON c.professor_id = p.id
        LEFT JOIN matriculas m ON m.id_curso = c.id
        GROUP BY p.id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>