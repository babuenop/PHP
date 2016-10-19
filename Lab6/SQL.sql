-- CREACION DE LA TABLA 
CREATE TABLE NOTICIAS ( 
ID smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, 
TITULO VARCHAR (100) NOT NULL DEFAULT '', 
TEXTO TEXT NOT NULL, 
CATEGORIA enum ('PROMOCIONES','OFERTAS','COSTAS') NOT NULL DEFAULT 'PROMOCIONES', 
FECHA DATE NOT NULL DEFAULT '0000-00-00', 
IMAGEN VARCHAR (100) DEFAULT NULL, 
PRIMARY KEY (ID) )

--INSERT
INSERT INTO NOTICIAS VALUES (1, 'Nueva promocion en ciudad cristal',
'145 viviendas de lujo en urbanizacion ajardinada situadas en un entorno privilegiado',
'promociones','2016-02-04',NULL)

INSERT INTO NOTICIAS VALUES (2, 'Ultimas viviendas junto al rio', 
'Apartamentos de 1 y 2 dormitorios, con fantaticas vistas. Excelentes condiciones de financiacion.',
'ofertas', '2016-02-05', null)

INSERT INTO NOTICIAS VALUES (3, 'Apartementos en el puerto de san martin',
'En la playa del sol en primera linea de playa. Pisos reformados y completamente acabados', 
'costas','2016-02-06', 'apartamento8.jpg')

INSERT INTO NOTICIAS VALUES (4, 'Casa reformada en el barrio la palmera', 
'Dos plantas y atico', '5 habitaciones, patio interno, amplio garaje. Situada en una calle tranquila y a un paso del centro historico.',
'promociones', '2016-02-07', null)

INSERT INTO NOTICIAS VALUES (5, 'Promocion costa del mar', 'Con vistas al campo de Golf, magnificas calidades, entorno ajardinado con piscina, y servicio de vigilancia.', 
'costas', '2016-02-09','apartamento9.jpg')

--PROCESO ALMACENADO 
CREATE DEFINER = `root`@`localhost` PROCEDURE `sp_listar_noticias`()
BEGIN 
SELECT id, titulo, texto, categoria, fecha, imagen FROM noticias; 
END  

--PROCESO ALMACENADO 2 
CREATE DEFINER = `root`@`localhost` PROCEDURE `sp_listar_noticias_filtro`(
IN param_campo VARCHAR(255),
IN param_valor VARCHAR(255)
)
BEGIN 
SET @s = CONCAT("SELECT id, titulo, texto, categoria, fecha, imagen FROM noticias WHERE ", param_campo ," LIKE CONCAT('%", param_valor ,"%')");
PREPARE stmt FROM @s; 
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
END

--LABORATORIO 7 

--Proceso Almacenado 1
CREATE DEFINER = `root`@`localhost` PROCEDURE `sp_listar_votos`()
BEGIN 
SELECT votos1, votos2 FROM votos;
END;

--Proceso Almacenado 2 
CREATE DEFINER = `root`@`localhost` PROCEDURE `sp_actualizar_votos`(
IN param_votos1 VARCHAR(255),
IN param_votos2 VARCHAR(255),
)
BEGIN 
SET @s = concat ("update votos set votos1=", param_votos1,"votos2=", param_votos2);

PREPARE stmt FROM @s;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
END;
