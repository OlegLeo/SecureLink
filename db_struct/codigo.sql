DROP TABLE IF EXISTS utilizador;
DROP TABLE IF EXISTS tipoUtilizador;

CREATE TABLE tipoUtilizador(
    id INT PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(255)
);

INSERT INTO tipoUtilizador (descricao) VALUES 
    ('administrador'), 
    ('user normal');

CREATE TABLE utilizador(
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) UNIQUE,
    password VARCHAR(100),
    foto VARCHAR(255),
    email VARCHAR(255),
    id_tipoUtilizador INT,

    FOREIGN KEY (id_tipoUtilizador) REFERENCES tipoUtilizador(id)
);

INSERT INTO utilizador(username, password, id_tipoUtilizador) VALUES
    ('admin','pass', 1),
    ('user','pass', 2);
