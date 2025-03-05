DROP TABLE IF EXISTS `correos`;
DROP TABLE IF EXISTS `alumni`;
CREATE TABLE `alumni` (
  `id_alumno` bigint NOT NULL AUTO_INCREMENT,
  `apellidos_alumno` varchar(255) DEFAULT NULL,
  `nombre_alumno` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `alumni` WRITE;
INSERT INTO `alumni` VALUES (1,'Avilés Vargas','Benjamín Alfredo'),(2,'Aznar Delgado','Juan Antonio'),(3,'Barroso Martínez','David'),(4,'Berrendero Toledano','Sergio'),(5,'Chacón Langa','Lucas'),(6,'Conforme Alarcón','Ainhoa Nicole'),(7,'El Farissi Ahram','Hicham'),(8,'El Haddad Rouas','Laila'),(9,'Gago Jiménez','Ivyel'),(10,'Garvín Navarrete','Lorena'),(11,'Guamán Álvarez','Noé Moisés'),(12,'Incio Hernández','Kevin'),(13,'Mancheño Sánchez','Ángela'),(14,'Martín García','Mario'),(15,'Páez Alvarado','Javier'),(16,'Sánchez Solera','Lucas'),(17,'Serrano Jiménez','Rodrigo'),(18,'Turro Arroyo','Iván');
UNLOCK TABLES;

CREATE TABLE `correos` (
  `id_alumno` bigint DEFAULT NULL,
  `id_email` bigint NOT NULL AUTO_INCREMENT,
  `correo_e` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_email`),
  KEY `FKtn6t45eh3siokcpusr4f0n2lu` (`id_alumno`),
  CONSTRAINT `FKtn6t45eh3siokcpusr4f0n2lu` FOREIGN KEY (`id_alumno`) REFERENCES `alumni` (`id_alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `correos` WRITE;
INSERT INTO `correos` VALUES (1,1,'benjamin.aviles1@educa.madrid.org'),(2,2,'juan.aznar2@educa.madrid.org'),(3,3,'dbm655@educa.madrid.org'),(4,4,'sergio.berrendero@educa.madrid.org'),(5,5,'lucas.chacon4@educa.madrid.org'),(6,6,'ainhoa.conforme1@educa.madrid.org'),(7,7,'hicham.el@educa.madrid.org'),(8,8,'laila.el18@educa.madrid.org'),(9,9,'diego.gago@educa.madrid.org'),(10,10,'lgn546@educa.madrid.org'),(11,11,'noe.guaman@educa.madrid.org'),(12,12,'kevin.incio@educa.madrid.org'),(13,13,'angela.mancheno@educa.madrid.org'),(14,14,'mario.martin53@educa.madrid.org'),(15,15,'javier.paezalvarado@educa.madrid.org'),(16,16,'lucas.sanchez3@educa.madrid.org'),(17,17,'rodrigo.serrano@educa.madrid.org'),(18,18,'ita917@educa.madrid.org');
UNLOCK TABLES;
