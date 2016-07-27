
CREATE TABLE `usr_usuarios` (
  `id_usuario` int(10)   NOT NULL AUTO_INCREMENT,
  `password` varchar(50) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `nro_documento` int(11) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `id_rol` int(10)   DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `usr_roles` (
  `id_rol` int(10)   NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `usr_recursos` (
  `id_recurso` int(10)   NOT NULL AUTO_INCREMENT,
  `nombre_recurso` varchar(50) NOT NULL,
  `titulo_recurso` varchar(80) NOT NULL,
  `descripcion_recurso` varchar(50) NOT NULL,
  `url_recurso` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_recurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `usr_recursos_roles` (
  `id_recurso` int(10)   NOT NULL DEFAULT '0',
  `id_rol` int(10)   NOT NULL DEFAULT '0',
  `alta` int(10)   DEFAULT NULL,
  `baja` int(10)   DEFAULT NULL,
  `modificacion` int(10)   DEFAULT NULL,
  `consulta` int(10)   DEFAULT NULL,
  PRIMARY KEY (`id_recurso`,`id_rol`),
  KEY `fk_RecursoRoles_Roles` (`id_rol`),
  CONSTRAINT `fk_usr_recursos_roles_1` FOREIGN KEY (`id_recurso`) REFERENCES `usr_recursos` (`id_recurso`),
  CONSTRAINT `fk_RecursoRoles_Roles` FOREIGN KEY (`id_rol`) REFERENCES `usr_roles` (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `usr_historico_usuarios` (
  `id_hist_usuario` int(10)   NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10)   DEFAULT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `date_login` datetime DEFAULT NULL,
  `date_logout` datetime DEFAULT NULL,
  PRIMARY KEY (`id_hist_usuario`),
  KEY `fk_Usuarios_HistoricoUsuarios` (`id_usuario`),
  CONSTRAINT `fk_Usuarios_HistoricoUsuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usr_usuarios` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


# usuarios
INSERT INTO usr_usuarios (id_usuario, nombre, apellido, nro_documento, mail, password, nombre_usuario, id_rol) VALUES
(1, 'mariano', 'apellido1', 234234, 'asdasdasd', '0804048efcb1f0b3c2f18a4412b1016c', 'mariano',1),
(2, 'martin', 'apellido1', 234234, 'asdasdasd', '925d7518fc597af0e43f5606f9a51512', 'martin',1),
(3, 'agustin', 'apellido1', 234234, 'asdasdasd', '4ff413b71217b7b2c3e845c71fc834a9', 'agustin',1),
(4, 'supervisor', 'apellido supervisor', 234234, 'asdasdasd', '09348c20a019be0318387c08df7a783d', 'supervisor',2),
(5, 'alumno', 'apellido alumno', 234234, 'asdasdasd', 'c6865cf98b133f1f3de596a4a2894630', 'alumno',3);


# roles
insert into usr_roles (id_rol, nombre, descripcion) values (1,'administrador','rol administrador ');
insert into usr_roles (id_rol, nombre, descripcion) values (2,'supervisor','rol supervisor ');
insert into usr_roles (id_rol, nombre, descripcion) values (3,'alumno','rol alumno ');
insert into usr_roles (id_rol, nombre, descripcion) values (4,'publicador','rol publicador ');



# recursos
INSERT INTO `usr_recursos` (`id_recurso`, `nombre_recurso`,`titulo_recurso`,`descripcion_recurso`, `url_recurso`) 
	VALUES ('1', 'Publicidades', 'Publicidades' ,'Publicidades del sitio', 'index.php/Admin/Publicidades');

INSERT INTO `usr_recursos` (`id_recurso`, `nombre_recurso`, `titulo_recurso`,`descripcion_recurso`, `url_recurso`) 
	VALUES ('2', 'gestion_evaluaciones', 'Evaluaciones','Evaluaciones del sitio', 'index.php/Admin/gestion_evaluaciones/materias');

INSERT INTO `usr_recursos` (`id_recurso`, `nombre_recurso`, `titulo_recurso`,`descripcion_recurso`, `url_recurso`) 
	VALUES ('3', 'Interesados','Interesados', 'Interesados del sitio', 'index.php/Admin/Interesados');
	
INSERT INTO `usr_recursos` (`id_recurso`, `nombre_recurso`,`titulo_recurso`, `descripcion_recurso`, `url_recurso`) 
	VALUES ('4', 'gestion_usuarios', 'Gestion usuarios','Gestion usuarios', 'index.php/Admin/gestion_usuarios/usuarios');	
	
	
# administrador
INSERT INTO usr_recursos_roles(id_recurso,id_rol,alta,baja,modificacion,consulta) VALUES (1,1,1,1,1,1);
INSERT INTO usr_recursos_roles(id_recurso,id_rol,alta,baja,modificacion,consulta) VALUES (2,1,1,1,1,1);
INSERT INTO usr_recursos_roles(id_recurso,id_rol,alta,baja,modificacion,consulta) VALUES (3,1,1,1,1,1);
INSERT INTO usr_recursos_roles(id_recurso,id_rol,alta,baja,modificacion,consulta) VALUES (4,1,1,1,1,1);

# supervisor	
INSERT INTO usr_recursos_roles(id_recurso,id_rol,alta,baja,modificacion,consulta) VALUES (2,2,1,1,1,1);

# alumno	
INSERT INTO usr_recursos_roles(id_recurso,id_rol,alta,baja,modificacion,consulta) VALUES (2,3,1,1,1,1);




commit;



