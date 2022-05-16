-- Base de Datos bdacademico
-- Autores: Bejar Espinoza Joel Wenceslao, Florez Mejia Miguel Adriano,
--	    Fuentes Avilés Edy nestor, Maza García Julio César
-- Fecha: 01/05/22
DROP DATABASE IF EXISTS bdacademico;

CREATE DATABASE IF NOT EXISTS bdacademico;

USE bdacademico;

-- Crear tabla tUsuario
DROP TABLE IF EXISTS tUsuario;
CREATE TABLE IF NOT EXISTS tUsuario(
  usuario CHAR(10) NOT NULL,
  contrasenia VARCHAR(50) NOT NULL,
  PRIMARY KEY(usuario)
)ENGINE=INNODB DEFAULT CHARSET=latin1;

-- Crear la tabla tCarrera
DROP TABLE IF EXISTS tCarrera;
CREATE TABLE IF NOT EXISTS tCarrera(
  codCarrera CHAR(5) NOT NULL,
  carrera VARCHAR(100) NOT NULL,
  PRIMARY KEY(codCarrera)
)ENGINE=INNODB DEFAULT CHARSET=latin1;

-- Crear la tabla tAlumno
DROP TABLE IF EXISTS tAlumno;
CREATE TABLE IF NOT EXISTS tAlumno(
  codAlumno CHAR(5) NOT NULL,
  aPaterno VARCHAR(50) NOT NULL,
  aMaterno VARCHAR(50) NOT NULL,
  nombres VARCHAR(50) NOT NULL,
  usuario CHAR(10) NOT NULL,
  codCarrera CHAR(5) NOT NULL,
  PRIMARY KEY(codAlumno),
  FOREIGN KEY(usuario) REFERENCES tUsuario(usuario),
  FOREIGN KEY(codCarrera) REFERENCES tCarrera(codCarrera)
)ENGINE=INNODB DEFAULT CHARSET=latin1;

-- Crear la tabla tDocente
DROP TABLE IF EXISTS tDocente;
CREATE TABLE IF NOT EXISTS tDocente(
  codDocente CHAR(5) NOT NULL,
  aPaterno VARCHAR(50) NOT NULL,
  aMaterno VARCHAR(50) NOT NULL,
  nombres VARCHAR(50) NOT NULL,
  usuario CHAR(10) NOT NULL,
  PRIMARY KEY(codDocente),
  FOREIGN KEY(usuario) REFERENCES tUsuario(usuario)
)ENGINE=INNODB DEFAULT CHARSET=latin1;

-- Crear la tabla tAsignatura
DROP TABLE IF EXISTS tAsignatura;
CREATE TABLE IF NOT EXISTS tAsignatura(
  codAsignatura CHAR(5) NOT NULL,
  asignatura VARCHAR(100) NOT NULL,
  codRequisito CHAR(5),
  PRIMARY KEY(codAsignatura),
  FOREIGN KEY(codRequisito) REFERENCES tAsignatura(codAsignatura)
)ENGINE=INNODB DEFAULT CHARSET=latin1;

-- Crear la tabla tCarga
DROP TABLE IF EXISTS tCarga;
CREATE TABLE IF NOT EXISTS tCarga(
  idCarga CHAR(5) NOT NULL,
  codDocente CHAR(5) NOT NULL,
  codAsignatura CHAR(5) NOT NULL,
  semestre VARCHAR(10) NOT NULL,
  PRIMARY KEY(idCarga),
  FOREIGN KEY(codDocente) REFERENCES tDocente(codDocente),
  FOREIGN KEY(codAsignatura) REFERENCES tAsignatura(codAsignatura)
)ENGINE=INNODB DEFAULT CHARSET=latin1;

-- Crear la tabla tNotas
DROP TABLE IF EXISTS tNotas;
CREATE TABLE IF NOT EXISTS tNotas(
  codAlumno CHAR(5) NOT NULL,
  codAsignatura CHAR(5) NOT NULL,
  semestre CHAR(5) NOT NULL,
  parcial1 INT NOT NULL,
  parcial2 INT NOT NULL,
  notaFinal INT NOT NULL,
  FOREIGN KEY(codAlumno) REFERENCES tAlumno(codAlumno),
  FOREIGN KEY(codAsignatura) REFERENCES tAsignatura(codAsignatura)
)ENGINE=INNODB DEFAULT CHARSET=latin1;

-- Insercion de datos
INSERT INTO tUsuario VALUES('Admin','A123456789');
INSERT INTO tUsuario VALUES('User','B987654321');
INSERT INTO tUsuario VALUES('Docente1','docente01');
INSERT INTO tUsuario VALUES('Docente2','docente02');
SELECT * FROM tUsuario

INSERT INTO tCarrera VALUES('C0001','Ingenieria de sistemas');
INSERT INTO tCarrera VALUES('C0002','Derecho');
SELECT * FROM tCarrera

INSERT INTO tAlumno VALUES('A0001','Gonzales','Castro','Maria Flor','Admin','C0001');
INSERT INTO tAlumno VALUES('A0002','Pacheco','Sanchez','Juan Antonio','User','C0002');
SELECT * FROM tAlumno

INSERT INTO tDocente VALUES('D0001','Fuentes','Castillo','Jorge Luis','Docente1');
INSERT INTO tDocente VALUES('D0002','Rojas','Delgado','Julia','Docente2');
SELECT * FROM tDocente

INSERT INTO tAsignatura VALUES('AS001','Desarrollo de Software I',NULL);
SELECT * FROM tAsignatura