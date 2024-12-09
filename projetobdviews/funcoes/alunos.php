<?php

declare(strict_types = 1);

require_once('../config/bancodedados.php');

function cadastrarAluno(string $nome, int $idade) {
    global $pdo;
    $stament = $pdo->prepare("INSERT INTO alunos (nome, idade) VALUES (?, ?)");
    return $stament->execute([$nome, $idade]);
}

function editarAluno(int $id, string $nome, int $idade): bool {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE aluno SET nome = ?, idade = ? WHERE id = ?");
        return $stmt->execute([$nome, $idade, $id]);
    }

function excluirAluno(int $id):bool{
    global $pdo;
    $stament = $pdo->prepare("DELETE FROM alunos WHERE id = ?");
    return $stament->execute([$id]);
}

function todosAlunos(): array{
    global $pdo;
    $stament = $pdo->query(" SELECT * FROM alunos");
    return $stament->fetchAll(PDO::FETCH_ASSOC);
}

function retornaAlunoPorId(int $id): ?array{
    global $pdo;
    $stament = $pdo->prepare("SELECT * FROM alunos WHERE id = ?");
    $stament->execute([$id]);
    $aluno = $stament->fetch(PDO::FETCH_ASSOC);
    return $aluno ? $aluno : null;
} 
?>