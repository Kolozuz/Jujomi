
create database if not exists proyecto_jujomi;
use proyecto_jujomi;

# -> PARA CREAR TABLAS

create table if not exists tbl_usuario(
    id_u int(11) PRIMARY KEY AUTO_INCREMENT,
    imgurl_u varchar(255),
    email_u varchar(150) UNIQUE,
    nombre_u varchar(100) UNIQUE,
    contrasena_u varchar(255),
    fecha_u date default current_timestamp(),
    hora_u time default current_timestamp());

create table if not exists tbl_curso(
    id_c int(11) PRIMARY KEY AUTO_INCREMENT,
    imgurl_c varchar(255),
    imgname_c varchar(50),
    ctg_c varchar(50) default NULL,
    nombre_c varchar(100),
    desc_c varchar(500),
    fecha_c date default current_timestamp(),
    estado_c bit(1) default 0,
    id_usuario int(11) NOT NULL,
    FOREIGN KEY(id_usuario) REFERENCES tbl_usuario(id_u));

create table if not exists tbl_seccion(
    id_secc int(11) PRIMARY KEY AUTO_INCREMENT,
    titulo_secc varchar(50),
    titulo_lecc varchar(50),
    contenido_secc JSON,
    id_curso int(11),
    FOREIGN KEY(id_curso) REFERENCES tbl_curso(id_c));

-- create table if not exists tbl_leccion(
--     id_leccion int(11) PRIMARY KEY AUTO_INCREMENT,
--     titulo_lecc varchar(50),
--     tipo_lecc varchar(8),
--     contenido_lecc longtext,
--     id_seccion int(11),
--     FOREIGN KEY(id_seccion) REFERENCES tbl_seccion(id_secc));

create table if not exists tbl_rating(
    id_rating int(11) PRIMARY KEY AUTO_INCREMENT,
    valor_rating float(3),
    id_curso int(11) NOT NULL,
    id_usuario int(11) NOT NULL,
    FOREIGN KEY(id_curso) REFERENCES tbl_curso(id_c));

create table if not exists tbl_config(
    -- id_config int(11) PRIMARY KEY AUTO_INCREMENT,
    dark_mode bit(1) default 0,
    id_usuario int(11) UNIQUE NOT NULL,
    FOREIGN KEY(id_usuario) REFERENCES tbl_usuario(id_u));

# -> EN DEUSO POR EL MOMENTO FOREIGN KEY(id_usuario) REFERENCES tbl_curso(id_usuario)

# -> PARA INSERTAR CURSOS INICIALES DE PRUEBA
INSERT INTO tbl_curso (id_c, imgurl_c, nombre_c, desc_c, id_usuario) VALUES (1,'../Views/Cursos/Imgs/Html_logo.svg','HTML 5','En este curso gratuito, aprenderas todos los aspectos fundamentales para empezar a crear paginas web con HTML 5',1),(2,'../Views/Cursos/Imgs/Css_logo.svg','Css 3','En este curso gratuito, aprenderas a darle estilo a tus documentos html con CSS3, tu unico limite sera la imaginacion',1),(3,'../Views/Cursos/Imgs/Js_logo.svg','JavaScript','En este curso gratuito de JavaScript aprenderas desde las operaciones basicas, hasta funciones complejas con arrays y manejo de numerosos datos',1),(4,'../Views/Cursos/Imgs/PHP_logo.svg','PhP','En este curso aprenderas los conceptos basicos de PHP mediante la realizacion de un crud (CREATE, READ, UPDATE & DELETE)',1);

DELIMITER $$
-- *PROCEDURES DE USUARIO*
-- Crear Usuario
CREATE PROCEDURE createUsuario(in imgurl varchar(50),in email varchar(150),in nombre varchar(100),in contrasena varchar(255))
BEGIN
INSERT INTO tbl_usuario(imgurl_u, email_u, nombre_u, contrasena_u) VALUES (imgurl, email, nombre, contrasena);
END $$

-- Relaciónar Configuración a Usuario
CREATE PROCEDURE linkConfig(in id int(11))
BEGIN
INSERT IGNORE INTO tbl_config(id_usuario) VALUES (id);
END $$

-- Traer datos de Usuario por Nombre
CREATE PROCEDURE readUsuariobyname(in nombre varchar(100))
BEGIN
SELECT * FROM tbl_usuario WHERE nombre_u = nombre;
END $$

-- Traer datos de Usuario por ID
CREATE PROCEDURE readUsuariobyid(in id int(11))
BEGIN
SELECT * FROM tbl_usuario WHERE id_u = id;
END $$

-- Recuperar Contraseña de Usuario
CREATE PROCEDURE recoverPassword(in newpwd varchar(255), in email varchar(150))
BEGIN
UPDATE tbl_usuario SET contrasena_u = newpwd WHERE email_u = email;
END $$

-- Actualizar Datos de Usuario
CREATE PROCEDURE updateUsuario(in id int(11),in imgurl varchar(50), in nombre varchar(100),in email varchar(150))
BEGIN
UPDATE tbl_usuario SET imgurl_u= imgurl, nombre_u= nombre, email_u = email  WHERE id_u = id;
END $$

-- Eliminar Datos de Usuario
CREATE PROCEDURE deleteUsuario(in id int(11),in id_c int(11))
BEGIN
DELETE FROM tbl_seccion WHERE id_curso = id_c;
DELETE FROM tbl_curso WHERE id_usuario = id;
DELETE FROM tbl_usuario WHERE id_u = id;
END $$

-- Consultar Configuración
CREATE PROCEDURE checkConfig(in id int(11))
BEGIN
SELECT dark_mode FROM tbl_config WHERE id_usuario = id;
END $$

-- Actualizar Configuración
CREATE PROCEDURE updateConfig(in id int(11), in newthemestatus bit(1))
BEGIN
UPDATE tbl_config SET dark_mode = newthemestatus WHERE id_usuario = id;
END $$

-- *PROCEDURES DE CURSO*
-- Crear Curso
-- CREATE PROCEDURE createUsuario(in imgurl_c varchar(50),in imgname_c varchar(150),in ctg_c varchar(100),in nombre_c varchar(255), desc_c, id_usuario)
-- BEGIN
-- INSERT INTO tbl_usuario(imgurl_c, imgname_c, ctg_c, nombre_c, desc_c, id_usuario) VALUES (imgurl, email, nombre, contrasena);
-- END $$

-- -- Traer datos de Curso por ID
-- CREATE PROCEDURE readUsuariobyid(in id int(11))
-- BEGIN
-- SELECT * FROM tbl_usuario WHERE id_u = id;
-- END $$

-- -- Actualizar Datos de Curso
-- CREATE PROCEDURE updateUsuario(in id int(11),in imgurl varchar(50), in nombre varchar(100),in email varchar(150))
-- BEGIN
-- UPDATE tbl_usuario SET imgurl_u= imgurl, nombre_u= nombre, email_u = email  WHERE id_u = id;
-- END $$

-- -- Eliminar Curso
-- CREATE PROCEDURE deleteUsuario(in id int(11),in id_c int(11))
-- BEGIN
-- DELETE FROM tbl_seccion WHERE id_curso = id_c;
-- DELETE FROM tbl_curso WHERE id_usuario = id;
-- DELETE FROM tbl_usuario WHERE id_u = id;
-- END $$

-- Publicar Curso
CREATE PROCEDURE publishCurso(in id int(11))
BEGIN
UPDATE tbl_curso SET estado_c = 1  WHERE id_c = id;
END $$

-- Anular Publicacion Curso
CREATE PROCEDURE unpublishCurso(in id int(11))
BEGIN
UPDATE tbl_curso SET estado_c = 0  WHERE id_c = id;
END $$

-- Contar lecciones
CREATE PROCEDURE countLecciones (IN id_c int(11))
BEGIN
SELECT COUNT(id_curso) AS num_lecciones FROM tbl_seccion  WHERE id_curso = 6;
END $$

DELIMITER ;