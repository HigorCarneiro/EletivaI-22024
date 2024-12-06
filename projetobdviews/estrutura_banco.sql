CREATE TABLE alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE professores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    materia_aplicada VARCHAR(100) NOT NULL
);

CREATE TABLE cursos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    aulas_semanais INT NOT NULL
);

CREATE TABLE matriculas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data DATETIME NOT NULL,
    id_alunos INT NOT NULL,
    id_professor INT NOT NULL,
    id_curso INT NOT NULL,
    FOREIGN KEY (id_alunos) REFERENCES alunos(id),
    FOREIGN KEY (id_professor) REFERENCES professores(id),
    FOREIGN KEY (id_curso) REFERENCES cursos(id)
);
