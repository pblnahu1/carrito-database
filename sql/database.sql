-- Importante: Las CONSTRAINT no deben repetirse: deben ser únicas para cada clave.

CREATE DATABASE carrito_database
DEFAULT CHARACTER SET = 'utf8mb4';

CREATE TABLE IF NOT EXISTS USUARIOS (
    id_usuario INT NOT NULL AUTO_INCREMENT,
    nombre_apellido VARCHAR(50) NOT NULL,
    email_usuario VARCHAR(60) NOT NULL,
    telefono_usuario VARCHAR(25) NOT NULL,
    metodo_pago VARCHAR(60) NOT NULL,
    CONSTRAINT pk_id_usuario PRIMARY KEY(id_usuario),
    CONSTRAINT ck_metodo_pago CHECK(metodo_pago IN('Tarjeta de Crédito', 'Tarjeta de Débito', 'Efectivo'))
);



CREATE TABLE IF NOT EXISTS TELEFONO (
    id_telefono INT NOT NULL AUTO_INCREMENT,
    telefono_numero VARCHAR(25) NOT NULL,
    id_usuario INT NOT NULL,
    CONSTRAINT pk_id_telefono PRIMARY KEY(id_telefono),
    CONSTRAINT fk_id_usuario FOREIGN KEY(id_usuario) REFERENCES USUARIOS(id_usuario)
);



CREATE TABLE IF NOT EXISTS PRODUCTOS (
    id_producto INT NOT NULL AUTO_INCREMENT,
    nombre_producto VARCHAR(100) NOT NULL,
    precio_producto INT NOT NULL,
    CONSTRAINT pk_id_producto PRIMARY KEY(id_producto)
);



CREATE TABLE IF NOT EXISTS USERXPROD (
    id_usuario INT NOT NULL,
    id_producto INT NOT NULL,
    CONSTRAINT fk_interrelacion_id_usuario_ FOREIGN KEY(id_usuario) REFERENCES USUARIOS(id_usuario),
    CONSTRAINT fk_interrelacion_id_producto FOREIGN KEY(id_producto) REFERENCES PRODUCTOS(id_producto),
    PRIMARY KEY (id_usuario, id_producto)
);


SELECT * FROM USUARIOS;
SELECT * FROM TELEFONO;
SELECT * FROM PRODUCTOS;
SELECT * FROM USERXPROD;