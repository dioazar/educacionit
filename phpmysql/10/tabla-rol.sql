CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(200) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

insert into rol (id_rol, rol) VALUES(1,'administrador');
insert into rol (id_rol, rol) VALUES(2,'comprador');
insert into rol (id_rol, rol) VALUES(3,'vendedor');

ALTER TABLE usuarios ADD id_rol INT ;
ALTER TABLE usuarios ADD FOREIGN KEY (id_rol) REFERENCES rol(id_rol);