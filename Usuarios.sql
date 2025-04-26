CREATE DATABASE IF NOT EXISTS prueba_gema;
USE prueba_gema;
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    estado TINYINT NOT NULL
);
