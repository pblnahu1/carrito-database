
-- Modificaciones, Eliminaciones, Agregaciones
ALTER TABLE PRODUCTOS MODIFY COLUMN id_producto INT NOT NULL;

ALTER TABLE USUARIOS MODIFY COLUMN id_usuario INT NOT NULL AUTO_INCREMENT;


ALTER TABLE userxprod DROP CONSTRAINT fk_interrelacion_id_usuario;

ALTER TABLE userxprod DROP CONSTRAINT fk_interrelacion_id_producto;

ALTER TABLE userxprod DROP FOREIGN KEY id_usuario;


ALTER TABLE userxprod ADD CONSTRAINT fk_interrelacion_id_usuario;

ALTER TABLE userxprod ADD CONSTRAINT fk_interrelacion_id_producto;


SELECT * FROM usuarios;

SELECT * FROM productos;

SELECT * FROM userxprod;



DROP TABLE usuarios;

DROP TABLE productos;

DROP TABLE userxprod;