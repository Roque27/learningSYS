
CREATE TABLE publicidades (
`id_publicidad` INT NOT NULL AUTO_INCREMENT ,
`nombre` VARCHAR(200) NOT NULL,
`texto_html` TEXT NOT NULL ,
`file_url` VARCHAR(200),
`fecha_creacion` DATETIME NOT NULL ,
`fecha_modificacion` DATETIME NOT NULL ,
PRIMARY KEY ( `id_publicidad` )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `publicidades` (`nombre`, `texto_html`, `fecha_modificacion`) VALUES ('matematica', '<p><ul><li>Matematica</li><li>computación</li><li>Filosofia</li></ul></p><hr>', '2015-09-09 12:12:00');
INSERT INTO `publicidades` (`nombre`, `texto_html`, `fecha_modificacion`) VALUES ('quimica', '<p><ul><li>Matematica</li><li>computación</li><li>Filosofia</li></ul></p><hr>' , '2015-09-09 12:12:00');
INSERT INTO `publicidades` (`nombre`, `texto_html`, `fecha_modificacion`) VALUES ('fisica', '<p><ul><li>Matematica</li><li>computación</li><li>Filosofia</li></ul></p><hr>' , '2015-09-09 12:12:00');







