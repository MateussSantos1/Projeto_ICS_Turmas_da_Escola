CREATE DATABASE IF NOT EXISTS sistemanotas;
USE sistemanotas;

-- Tabela Aluno
CREATE TABLE Aluno (
    id INT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    senha VARCHAR(15) NOT NULL,
    turma_id INT,
    FOREIGN KEY (turma_id) REFERENCES Turma(turma_id)
);

-- Tabela Turma
CREATE TABLE Turma (
    turma_id INT PRIMARY KEY,
    nome_turma VARCHAR(50) NOT NULL,
    ano INT NOT NULL,
    professor_id INT,
    id INT,
    /*ID pois é o id do aluno, que foi definido como "id", e não como "aluno_id"*/
    FOREIGN KEY (professor_id) REFERENCES Professor(professor_id),
    FOREIGN KEY (id) REFERENCES Aluno(id)
);

-- Tabela Professor
CREATE TABLE Professor (
    professor_id INT PRIMARY KEY,
    nome_professor VARCHAR(50) NOT NULL,
    senha_professor VARCHAR(50) NOT NULL,
    disciplina VARCHAR(50) NOT NULL,
    turma_id INT,
    FOREIGN KEY (turma_id) REFERENCES Turma(turma_id)
);
