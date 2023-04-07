CREATE DATABASE `semana9` /*!40100 DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

CREATE TABLE `insumos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `empresa` varchar(45) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `precio` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
