CREATE DATABASE IF NOT EXISTS prueba_gema;
USE prueba_gema;
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    estado TINYINT NOT NULL
);

CREATE TABLE `revisores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

ALTER TABLE usuarios
  ADD COLUMN revisor_id INT NOT NULL AFTER apellido,
  ADD CONSTRAINT fk_revisor
    FOREIGN KEY (revisor_id)
    REFERENCES `revisores`(id);


INSERT INTO `revisores` (`nombre`, `apellido`) VALUES ('Nombre', 'Revisor1');
INSERT INTO `revisores` (`nombre`, `apellido`) VALUES ('Nombre', 'Revisor2');
INSERT INTO `revisores` (`nombre`, `apellido`) VALUES ('Nombre', 'Revisor3');
INSERT INTO `revisores` (`nombre`, `apellido`) VALUES ('Nombre', 'Revisor4');
INSERT INTO `revisores` (`nombre`, `apellido`) VALUES ('Nombre', 'Revisor5');
INSERT INTO `revisores` (`nombre`, `apellido`) VALUES ('Nombre', 'Revisor6');
INSERT INTO `revisores` (`nombre`, `apellido`) VALUES ('Nombre', 'Revisor7');
INSERT INTO `revisores` (`nombre`, `apellido`) VALUES ('Nombre', 'Revisor8');
