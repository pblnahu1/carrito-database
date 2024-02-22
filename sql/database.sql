CREATE DATABASE carrito_database
DEFAULT CHARACTER SET = 'utf8mb4';

CREATE TABLE USUARIOS (
    id_usuario INT NOT NULL AUTO_INCREMENT,
    nombre_usuario VARCHAR(50) NOT NULL,
    apellido_usuario VARCHAR(50) NOT NULL,
    email_usuario VARCHAR(60) NOT NULL,
    metodo_pago VARCHAR(60) NOT NULL,
    prod_nom_elegido VARCHAR(100),
    prod_precio_elegido INT,
    CONSTRAINT pk_id_usuario PRIMARY KEY(id_usuario),
    CONSTRAINT ck_metodo_pago CHECK(metodo_pago IN('Tarjeta de Crédito', 'Tarjeta de Débito', 'Efectivo'))
);