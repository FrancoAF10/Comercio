CREATE DATABASE nuevo;
USE nuevo;

CREATE TABLE IE(
Id_IE           INT PRIMARY KEY NOT NULL,
Nombre_IE       VARCHAR(50),
Direccion_IE    VARCHAR(200),
Telefono_IE     VARCHAR(11)
)ENGINE=INNODB;

CREATE TABLE USUARIO(
Id_Usuario      INT PRIMARY KEY NOT NULL,
Id_IE           INT,
Nombre_Usuario      VARCHAR(30),
Apellido_Usuario    VARCHAR(20),
Password_Usuario    VARCHAR(30),
CONSTRAINT idIE_fk FOREIGN KEY (Id_IE) REFERENCES IE(Id_IE)
)ENGINE=INNODB;

CREATE TABLE TALLERES(
Nro_Taller      INT PRIMARY KEY NOT NULL,
Id_IE           INT,
Especialidad    VARCHAR(40),
CONSTRAINT idIE2_fk FOREIGN KEY (Id_IE) REFERENCES IE(Id_IE)
)ENGINE=INNODB;

CREATE TABLE EQUIPOS(
 Nro_Maquina        VARCHAR(20) NOT NULL PRIMARY KEY ,
Nro_Taller          INT,
    Monitor            VARCHAR(50) NOT NULL,
    Serie_Monitor      VARCHAR(50) NOT NULL,
    Estado_Monitor     VARCHAR(50) NOT NULL,
    CPU                 VARCHAR(50) NOT NULL,
    Serie_CPU           VARCHAR(50) NOT NULL,
    Descripcion_CPU     VARCHAR(2000) NOT NULL,
    Estado_CPU          VARCHAR(50) NOT NULL,
    Teclado            VARCHAR(50) NOT NULL,
    Serie_Teclado      VARCHAR(50) NOT NULL,
    Estado_Teclado     VARCHAR(50) NOT NULL,
    Mouse              VARCHAR(50) NOT NULL,
    Serie_Mouse        VARCHAR(50) NOT NULL,
    Estado_Mouse       VARCHAR(50) NOT NULL,
    CONSTRAINT idtalleres_fk FOREIGN KEY (Nro_Taller) REFERENCES TALLERES(Nro_Taller)
)ENGINE=INNODB;

INSERT INTO IE(Id_IE,Nombre_IE,Direccion_IE,Telefono_IE)VALUES (1,"Andres Avelino Caceres", "Colegio-falta de informacion","999555333");

INSERT INTO USUARIO(Id_Usuario, Id_IE,Nombre_Usuario,Apellido_Usuario,Password_Usuario)VALUES(1513619,1,"Franco","Anton Felix","123456");

INSERT INTO TALLERES(Nro_Taller, Id_IE,Especialidad)VALUES(1,1,"PROGRAMACIÓN");
INSERT INTO TALLERES(Nro_Taller, Id_IE,Especialidad)VALUES(2,1,"CONTABILIDAD");
INSERT INTO TALLERES(Nro_Taller, Id_IE,Especialidad)VALUES(3,1,"SECRETARIADO");
INSERT INTO TALLERES(Nro_Taller, Id_IE,Especialidad)VALUES(4,1,"XO");
