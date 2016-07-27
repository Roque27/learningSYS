
CREATE TABLE IF NOT EXISTS  eval_materias (
   id_materia  int(10) NOT NULL AUTO_INCREMENT,
   nombre_materia  varchar(50) NOT NULL,
   descripcion_materia  varchar(100) NULL,
   id_usuario  int NOT NULL,
  PRIMARY KEY ( id_materia ),
  FOREIGN KEY (id_usuario) REFERENCES usr_usuarios(id_usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS  eval_temas  (
   id_tema  int(10) NOT NULL AUTO_INCREMENT,
   id_materia  int(10) NOT NULL,
   nombre_tema  varchar(50) NOT NULL,
   descripcion  varchar(100) NULL,
  PRIMARY KEY ( id_tema ),
  FOREIGN KEY (id_materia) REFERENCES eval_materias(id_materia)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS  eval_tipos_evaluacion  (
   id_tipo_evaluacion  int(10) NOT NULL AUTO_INCREMENT,
   tipo_evaluacion  varchar(50) NOT NULL,
   descripcion  varchar(100) NULL,
  PRIMARY KEY ( id_tipo_evaluacion )
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS  eval_evaluaciones  (
   id_evaluacion  int(10) NOT NULL AUTO_INCREMENT,
   id_materia  int(10) NOT NULL,
   id_usuario  int(10) NOT NULL,
   id_tema     int(10) NOT NULL,
   puntaje     FLOAT(4,2) NOT NULL,
   fecha_creacion datetime DEFAULT NULL,
  FOREIGN KEY (id_usuario) REFERENCES usr_usuarios(id_usuario),
  FOREIGN KEY (id_materia) REFERENCES eval_materias(id_materia),
  FOREIGN KEY (id_tema)    REFERENCES eval_temas(id_tema),
  PRIMARY KEY ( id_evaluacion )
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS  eval_preguntas  (
   id_pregunta  int(10) NOT NULL AUTO_INCREMENT,
   id_tema  int(10) NOT NULL,
   pregunta  text NULL,
   id_tipo_evaluacion  int(10) NULL,
  FOREIGN KEY (id_tema) REFERENCES eval_temas(id_tema),
  FOREIGN KEY (id_tipo_evaluacion) REFERENCES eval_tipos_evaluacion(id_tipo_evaluacion),
  PRIMARY KEY ( id_pregunta )
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS  eval_respuestas  (
   id_respuesta  int(10) NOT NULL AUTO_INCREMENT,
   id_pregunta  int(10) NOT NULL,
   respuesta  text NOT NULL,
   es_correcta  char NOT NULL, 
  FOREIGN KEY (id_pregunta) REFERENCES eval_preguntas(id_pregunta),
  PRIMARY KEY ( id_respuesta )
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS  eval_detalles_evaluaciones  (
   id_detalle_evaluacion  int(10) NOT NULL AUTO_INCREMENT,
   id_evaluacion  int(10) NOT NULL,
   id_pregunta  int(10) NOT NULL,
   id_respuestas_correctas  VARCHAR(20) NOT NULL,
   id_respuestas_seleccionadas  VARCHAR(20) NOT NULL,
  FOREIGN KEY (id_evaluacion) REFERENCES eval_evaluaciones(id_evaluacion),
  FOREIGN KEY (id_pregunta) REFERENCES eval_preguntas(id_pregunta),
  PRIMARY KEY ( id_detalle_evaluacion )
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO eval_tipos_evaluacion (id_tipo_evaluacion,tipo_evaluacion,descripcion) VALUES (1,'respuesta_unica','respuesta unica');
INSERT INTO eval_tipos_evaluacion (id_tipo_evaluacion,tipo_evaluacion,descripcion) VALUES (2,'respuesta_multiple','respuesta multiple');


INSERT INTO eval_materias (id_materia, nombre_materia, descripcion_materia, id_usuario) VALUES (1,'Matematica','materia matematica', 1);
INSERT INTO eval_materias (id_materia, nombre_materia, descripcion_materia, id_usuario) VALUES (2,'Fisica','materia fisica', 1);
INSERT INTO eval_materias (id_materia, nombre_materia, descripcion_materia, id_usuario) VALUES (3,'Quimica','materia quimica', 1);
INSERT INTO eval_materias (id_materia, nombre_materia, descripcion_materia, id_usuario) VALUES (4,'Historia','materia Historia', 1);

INSERT INTO eval_temas (id_tema, id_materia, nombre_tema, descripcion) values (1, 1, 'A-Matematica', 'descripcion A-Matematica');
INSERT INTO eval_temas (id_tema, id_materia, nombre_tema, descripcion) values (2, 1, 'B-Matematica', 'descripcion B-Matematica');

INSERT INTO eval_temas (id_tema, id_materia, nombre_tema, descripcion) values (3, 2, 'A-Fisica', 'descripcion A-Fisica');
INSERT INTO eval_temas (id_tema, id_materia, nombre_tema, descripcion) values (4, 2, 'B-Fisica', 'descripcion B-Fisica');

INSERT INTO eval_temas (id_tema, id_materia, nombre_tema, descripcion) values (5, 3, 'A-Quimica', 'descripcion A-Quimica');
INSERT INTO eval_temas (id_tema, id_materia, nombre_tema, descripcion) values (6, 3, 'B-Quimica', 'descripcion B-Quimica');

INSERT INTO eval_temas (id_tema, id_materia, nombre_tema, descripcion) values (7, 4, 'A-Historia', 'descripcion A-Historia');
INSERT INTO eval_temas (id_tema, id_materia, nombre_tema, descripcion) values (8, 4, 'B-Historia', 'descripcion B-Historia');





INSERT INTO eval_preguntas(id_pregunta,id_tema,pregunta,id_tipo_evaluacion) values (1, 7, '<p>\n	&iquest;&Uacute;ltima letra del <strong>alfabeto griego?</strong></p>\n', '1');
INSERT INTO  eval_respuestas ( id_respuesta , id_pregunta , respuesta , es_correcta ) values (1, 1, 'Omega', 'S');
INSERT INTO  eval_respuestas ( id_respuesta , id_pregunta , respuesta , es_correcta ) values (2, 1, 'Alpha', 'N');
INSERT INTO  eval_respuestas ( id_respuesta , id_pregunta , respuesta , es_correcta ) values (3, 1, 'Zeta', 'N');


INSERT INTO eval_preguntas(id_pregunta,id_tema,pregunta,id_tipo_evaluacion) values (2, 7, '<p>\n	<strong>&iquest;Reptil </strong>cuya<strong> piel cambia de color?</strong></p>\n', '1');
INSERT INTO  eval_respuestas ( id_respuesta , id_pregunta , respuesta , es_correcta ) values (4, 2, 'Cobra', 'N');
INSERT INTO  eval_respuestas ( id_respuesta , id_pregunta , respuesta , es_correcta ) values (5, 2, 'Iguana', 'N');
INSERT INTO  eval_respuestas ( id_respuesta , id_pregunta , respuesta , es_correcta ) values (6, 2, 'Camaleón', 'S');


INSERT INTO eval_preguntas(id_pregunta,id_tema,pregunta,id_tipo_evaluacion) values (3, 7, '¿Ciudad italiana conocida como "La Novia del Mar?', '1');
INSERT INTO  eval_respuestas ( id_respuesta , id_pregunta , respuesta , es_correcta ) values (7, 3, 'Roma', 'N');
INSERT INTO  eval_respuestas ( id_respuesta , id_pregunta , respuesta , es_correcta ) values (8, 3, 'Venecia', 'S');
INSERT INTO  eval_respuestas ( id_respuesta , id_pregunta , respuesta , es_correcta ) values (9, 3, 'Florencia', 'N');

INSERT INTO eval_preguntas(id_pregunta,id_tema,pregunta,id_tipo_evaluacion) values (4, 7, '¿Órgano del cuerpo que produce la bilis?', '1');
INSERT INTO  eval_respuestas ( id_respuesta , id_pregunta , respuesta , es_correcta ) values (10, 4, 'Hígado', 'S');
INSERT INTO  eval_respuestas ( id_respuesta , id_pregunta , respuesta , es_correcta ) values (11, 4, 'Páncreas', 'N');
INSERT INTO  eval_respuestas ( id_respuesta , id_pregunta , respuesta , es_correcta ) values (12, 4, 'Riñón', 'N');

INSERT INTO eval_preguntas(id_pregunta,id_tema,pregunta,id_tipo_evaluacion) values (5, 7, '¿Década en que se terminó de construir el Empire State de Nueva York?', '1');
INSERT INTO  eval_respuestas ( id_respuesta , id_pregunta , respuesta , es_correcta ) values (13, 5, 'Cincuenta', 'N');
INSERT INTO  eval_respuestas ( id_respuesta , id_pregunta , respuesta , es_correcta ) values (14, 5, 'Cuarenta', 'N');
INSERT INTO  eval_respuestas ( id_respuesta , id_pregunta , respuesta , es_correcta ) values (15, 5, 'Treinta', 'S');

 






