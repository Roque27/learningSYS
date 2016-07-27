# CREATE SCHEMA `examinar` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS interesados (
id_interesado INT UNSIGNED AUTO_INCREMENT,
nombre VARCHAR(50),
apellido VARCHAR(50),
email VARCHAR(100),
comentario TEXT,
fecha_recibido DATETIME,
PRIMARY KEY (id_interesado)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS  `ci_sessions` (
	session_id varchar(40) DEFAULT '0' NOT NULL,
	ip_address varchar(45) DEFAULT '0' NOT NULL,
	user_agent varchar(120) NOT NULL,
	last_activity int(10) unsigned DEFAULT 0 NOT NULL,
	user_data text NOT NULL,
	PRIMARY KEY (session_id),
	KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
