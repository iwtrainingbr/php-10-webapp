CREATE DATABASE db_ifood;

USE db_ifood;

CREATE TABLE tb_restaurante (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    endereco VARCHAR(100) NOT NULL
);

INSERT INTO tb_restaurante(nome, endereco) VALUES ('Ordones', 'Fortaleza-CE');
INSERT INTO tb_restaurante(nome, endereco) VALUES ('Paraiba', 'Fortaleza-CE');
INSERT INTO tb_restaurante(nome, endereco) VALUES ('Chico', 'Caucaia-CE');
INSERT INTO tb_restaurante(nome, endereco) VALUES ('Maria', 'Maracanau-CE');


CREATE TABLE tb_produto (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    valor FLOAT NOT NULL,
    quantidade INT NOT NULL
);

INSERT INTO tb_produto (nome, valor, quantidade) VALUES ('Cuscuz', 5.89, 20);
INSERT INTO tb_produto (nome, valor, quantidade) VALUES ('Ypioca', 5.89, 20);
INSERT INTO tb_produto (nome, valor, quantidade) VALUES ('Heineken', 6.90, 20);
INSERT INTO tb_produto (nome, valor, quantidade) VALUES ('Feijão', 10.12, 20);


USE db_ifood;

CREATE TABLE tb_usuario (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    criado_em DATETIME NOT NULL,
    editado_em DATETIME,
    ultimo_login DATETIME
);
