--
-- ER/Studio 8.0 SQL Code Generation
-- Company :      SAne
-- Project :      ModeladoBi07.DM1
-- Author :       Joel
--
-- Date Created : Wednesday, February 26, 2020 11:28:16
-- Target DBMS : MySQL 5.x
--

-- 
-- TABLE: Asesor 
--
create database solodesarrollos;
use solodesarrollos;

CREATE TABLE Asesor(
    Id_asesor      VARCHAR(10)     NOT NULL,
    Contrasenia    VARCHAR(20),
    Nombre         VARCHAR(15),
    Apellido       VARCHAR(50),
    Telefono       VARCHAR(15),
    Correo         VARCHAR(100),
    Id_usuario     INT             NOT NULL,
    Id_empresa     INT             NOT NULL,
    PRIMARY KEY (Id_asesor)
)ENGINE=INNODB
;



-- 
-- TABLE: Caracteristicas 
--

CREATE TABLE Caracteristicas(
    id_producto     INT            AUTO_INCREMENT,
    producto        VARCHAR(10),
    id_seminuevo    INT            NOT NULL,
    PRIMARY KEY (id_producto)
)ENGINE=INNODB
;



-- 
-- TABLE: Cliente 
--

CREATE TABLE Cliente(
    Id_cliente      INT             AUTO_INCREMENT,
    Nombre          VARCHAR(100),
    Telefono        VARCHAR(20),
    Correo          VARCHAR(100),
    Estatus         VARCHAR(10),
    Mensaje         VARCHAR(500),
    Id_inmmueble    VARCHAR(10)     NOT NULL,
    PRIMARY KEY (Id_cliente)
)ENGINE=INNODB
;



-- 
-- TABLE: Desarrolladora 
--

CREATE TABLE Desarrolladora(
    Id_desarrolladora    INT             AUTO_INCREMENT,
    Telefono             VARCHAR(15),
    Correo               VARCHAR(100),
    Logo                 VARCHAR(100),
    Nombre               VARCHAR(100),
    PRIMARY KEY (Id_desarrolladora)
)ENGINE=INNODB
;



-- 
-- TABLE: Empresa 
--

CREATE TABLE Empresa(
    Id_empresa    INT             AUTO_INCREMENT,
    Logo          VARCHAR(100),
    Telefono      VARCHAR(15),
    Correo        VARCHAR(100),
    Nombre        VARCHAR(100),
    PRIMARY KEY (Id_empresa)
)ENGINE=INNODB
;



-- 
-- TABLE: Forma_inmueble 
--

CREATE TABLE Forma_inmueble(
    Id_FI           INT            AUTO_INCREMENT,
    Id_forma        INT            NOT NULL,
    Id_inmmueble    VARCHAR(10)    NOT NULL,
    PRIMARY KEY (Id_FI)
)ENGINE=INNODB
;



-- 
-- TABLE: Forma_pago 
--

CREATE TABLE Forma_pago(
    Id_forma    INT            AUTO_INCREMENT,
    forma       VARCHAR(20),
    PRIMARY KEY (Id_forma)
)ENGINE=INNODB
;



-- 
-- TABLE: Galeria 
--

CREATE TABLE Galeria(
    Id_foto         INT             AUTO_INCREMENT,
    Foto            VARCHAR(200),
    Id_inmmueble    VARCHAR(10)     NOT NULL,
    PRIMARY KEY (Id_foto)
)ENGINE=INNODB
;



-- 
-- TABLE: Inmueble 
--

CREATE TABLE Inmueble(
    Id_inmmueble     VARCHAR(10)       NOT NULL,
    Comision         VARCHAR(15),
    Latitud          VARCHAR(255),
    Longitud         VARCHAR(255),
    Zoom             VARCHAR(255),
    Creacion         DATETIME,
    Descripcion      TEXT,
    Titulo           VARCHAR(100),
    Precio           DECIMAL(10, 2),
    Id_asesor        VARCHAR(10)       NOT NULL,
    Id_modelo        INT               NOT NULL,
    id_producto      INT               NOT NULL,
    id_tipoPrecio    CHAR(10)          NOT NULL,
    PRIMARY KEY (Id_inmmueble)
)ENGINE=INNODB
;



-- 
-- TABLE: Modelo 
--

CREATE TABLE Modelo(
    Id_modelo    INT             AUTO_INCREMENT,
    Modelo       VARCHAR(100),
    Id_tipo      INT             NOT NULL,
    PRIMARY KEY (Id_modelo)
)ENGINE=INNODB
;



-- 
-- TABLE: Seminuevo 
--

CREATE TABLE Seminuevo(
    id_seminuevo    INT            AUTO_INCREMENT,
    antiguedad      VARCHAR(25),
    Tseminuevo      VARCHAR(20),
    contrato        VARCHAR(35),
    fecha           VARCHAR(25),
    PRIMARY KEY (id_seminuevo)
)ENGINE=INNODB
;



-- 
-- TABLE: Servicio 
--

CREATE TABLE Servicio(
    Id_servicio    INT            AUTO_INCREMENT,
    Servicio       VARCHAR(18),
    PRIMARY KEY (Id_servicio)
)ENGINE=INNODB
;



-- 
-- TABLE: Servicio_inmueble 
--

CREATE TABLE Servicio_inmueble(
    Id_SI           INT            AUTO_INCREMENT,
    Id_servicio     INT            NOT NULL,
    Id_inmmueble    VARCHAR(10)    NOT NULL,
    PRIMARY KEY (Id_SI)
)ENGINE=INNODB
;



-- 
-- TABLE: Tipo_inmbueble 
--

CREATE TABLE Tipo_inmbueble(
    Id_tipo              INT             AUTO_INCREMENT,
    Tipo                 VARCHAR(100),
    Id_desarrolladora    INT             NOT NULL,
    PRIMARY KEY (Id_tipo)
)ENGINE=INNODB
;



-- 
-- TABLE: TipoPrecio 
--

CREATE TABLE TipoPrecio(
    id_tipoPrecio    CHAR(10)       NOT NULL,
    Tipo             VARCHAR(20),
    PRIMARY KEY (id_tipoPrecio)
)ENGINE=INNODB
;



-- 
-- TABLE: Usuario 
--

CREATE TABLE Usuario(
    Id_usuario     INT            AUTO_INCREMENT,
    TipoUsuario    VARCHAR(10),
    PRIMARY KEY (Id_usuario)
)ENGINE=INNODB
;



-- 
-- INDEX: Ref1110 
--

CREATE INDEX Ref1110 ON Asesor(Id_usuario)
;
-- 
-- INDEX: Ref1415 
--

CREATE INDEX Ref1415 ON Asesor(Id_empresa)
;
-- 
-- INDEX: Ref1721 
--

CREATE INDEX Ref1721 ON Caracteristicas(id_seminuevo)
;
-- 
-- INDEX: Ref41 
--

CREATE INDEX Ref41 ON Cliente(Id_inmmueble)
;
-- 
-- INDEX: Ref816 
--

CREATE INDEX Ref816 ON Forma_inmueble(Id_forma)
;
-- 
-- INDEX: Ref417 
--

CREATE INDEX Ref417 ON Forma_inmueble(Id_inmmueble)
;
-- 
-- INDEX: Ref49 
--

CREATE INDEX Ref49 ON Galeria(Id_inmmueble)
;
-- 
-- INDEX: Ref23 
--

CREATE INDEX Ref23 ON Inmueble(Id_asesor)
;
-- 
-- INDEX: Ref1212 
--

CREATE INDEX Ref1212 ON Inmueble(Id_modelo)
;
-- 
-- INDEX: Ref1619 
--

CREATE INDEX Ref1619 ON Inmueble(id_producto)
;
-- 
-- INDEX: Ref1822 
--

CREATE INDEX Ref1822 ON Inmueble(id_tipoPrecio)
;
-- 
-- INDEX: Ref311 
--

CREATE INDEX Ref311 ON Modelo(Id_tipo)
;
-- 
-- INDEX: Ref913 
--

CREATE INDEX Ref913 ON Servicio_inmueble(Id_servicio)
;
-- 
-- INDEX: Ref414 
--

CREATE INDEX Ref414 ON Servicio_inmueble(Id_inmmueble)
;
-- 
-- INDEX: Ref74 
--

CREATE INDEX Ref74 ON Tipo_inmbueble(Id_desarrolladora)
;
-- 
-- TABLE: Asesor 
--

ALTER TABLE Asesor ADD CONSTRAINT RefUsuario103 
    FOREIGN KEY (Id_usuario)
    REFERENCES Usuario(Id_usuario)
;

ALTER TABLE Asesor ADD CONSTRAINT RefEmpresa153 
    FOREIGN KEY (Id_empresa)
    REFERENCES Empresa(Id_empresa)
;


-- 
-- TABLE: Caracteristicas 
--

ALTER TABLE Caracteristicas ADD CONSTRAINT RefSeminuevo213 
    FOREIGN KEY (id_seminuevo)
    REFERENCES Seminuevo(id_seminuevo)
;


-- 
-- TABLE: Cliente 
--

ALTER TABLE Cliente ADD CONSTRAINT RefInmueble13 
    FOREIGN KEY (Id_inmmueble)
    REFERENCES Inmueble(Id_inmmueble)
;


-- 
-- TABLE: Forma_inmueble 
--

ALTER TABLE Forma_inmueble ADD CONSTRAINT RefForma_pago163 
    FOREIGN KEY (Id_forma)
    REFERENCES Forma_pago(Id_forma)
;

ALTER TABLE Forma_inmueble ADD CONSTRAINT RefInmueble173 
    FOREIGN KEY (Id_inmmueble)
    REFERENCES Inmueble(Id_inmmueble)
;


-- 
-- TABLE: Galeria 
--

ALTER TABLE Galeria ADD CONSTRAINT RefInmueble93 
    FOREIGN KEY (Id_inmmueble)
    REFERENCES Inmueble(Id_inmmueble)
;


-- 
-- TABLE: Inmueble 
--

ALTER TABLE Inmueble ADD CONSTRAINT RefAsesor33 
    FOREIGN KEY (Id_asesor)
    REFERENCES Asesor(Id_asesor)
;

ALTER TABLE Inmueble ADD CONSTRAINT RefModelo123 
    FOREIGN KEY (Id_modelo)
    REFERENCES Modelo(Id_modelo)
;

ALTER TABLE Inmueble ADD CONSTRAINT RefCaracteristicas193 
    FOREIGN KEY (id_producto)
    REFERENCES Caracteristicas(id_producto)
;

ALTER TABLE Inmueble ADD CONSTRAINT RefTipoPrecio223 
    FOREIGN KEY (id_tipoPrecio)
    REFERENCES TipoPrecio(id_tipoPrecio)
;


-- 
-- TABLE: Modelo 
--

ALTER TABLE Modelo ADD CONSTRAINT RefTipo_inmbueble113 
    FOREIGN KEY (Id_tipo)
    REFERENCES Tipo_inmbueble(Id_tipo)
;


-- 
-- TABLE: Servicio_inmueble 
--

ALTER TABLE Servicio_inmueble ADD CONSTRAINT RefServicio133 
    FOREIGN KEY (Id_servicio)
    REFERENCES Servicio(Id_servicio)
;

ALTER TABLE Servicio_inmueble ADD CONSTRAINT RefInmueble143 
    FOREIGN KEY (Id_inmmueble)
    REFERENCES Inmueble(Id_inmmueble)
;


-- 
-- TABLE: Tipo_inmbueble 
--

ALTER TABLE Tipo_inmbueble ADD CONSTRAINT RefDesarrolladora43 
    FOREIGN KEY (Id_desarrolladora)
    REFERENCES Desarrolladora(Id_desarrolladora)
;


