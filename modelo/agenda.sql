-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.28-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para agenda
CREATE DATABASE IF NOT EXISTS `agenda` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `agenda`;

-- Copiando estrutura para tabela agenda.pessoas
CREATE TABLE IF NOT EXISTS `pessoas` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nome` varchar(100) NOT NULL,
	`email` varchar(100) NOT NULL,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,
	PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela agenda.pessoas: ~18 rows (aproximadamente)
INSERT INTO `pessoas` (`id`, `nome`, `email`, `created`, `modified`) VALUES
																		 (2, 'Ivana Dominato de Ferreira', 'ivana@gmail.com', '2023-08-30 19:30:19', '2023-08-30 19:30:28'),
																		 (8, 'Douglas dos Santos Silva', 'douglas@gmail.com', '2023-08-30 19:30:19', '2023-08-30 19:30:29'),
																		 (10, 'Eleriane Valdirene de Barreto', 'eleiriane@gmail.com', '2023-08-30 19:30:20', '2023-08-30 19:30:30'),
																		 (11, 'Elano Caldeira Dias', 'manuelapereira.braga@yahoo.com', '2023-08-30 19:30:20', '2023-08-30 19:30:29'),
																		 (12, 'Paulo Micael Galvão', 'margaridamartins.braga@gmail.com', '2023-08-30 19:30:27', '2023-08-30 19:30:30'),
																		 (13, 'Jaqueline Aranda da Silva', 'cecliareis16@hotmail.com', '2023-08-30 19:30:21', '2023-08-30 19:30:32'),
																		 (14, 'Clarice Fonseca Reis', 'lorenasaraiva44@yahoo.com', '2023-08-30 19:30:21', '2023-08-30 19:30:32'),
																		 (15, 'Rafaela Nádia de Lira', 'lauracarvalho.albuquerque@live.com', '2023-08-30 19:30:26', '2023-08-30 19:30:33'),
																		 (16, 'Hellen Margarida Carrara Marin da Cunha', 'elsiobarros_souza72@live.com', '2023-08-30 19:30:22', '2023-08-30 19:30:33'),
																		 (17, 'Demian Jardel de DAvila', 'larissamoraes_santos60@yahoo.com', '2023-08-30 19:30:22', '2023-08-30 19:30:34'),
	(18, 'Alessandra Burgos Herrera', 'calebexavier_barros37@gmail.com', '2023-08-30 19:30:23', '2023-08-30 19:30:34'),
	(19, 'Gigi Assunção Bezerra', 'analauraoliveira_barros@live.com', '2023-08-30 19:30:23', '2023-08-30 19:30:35'),
	(20, 'Jorge Kim Camacho Jr.', 'denevalsilva.pereira@yahoo.com', '2023-08-30 19:30:25', '2023-08-30 19:30:36'),
	(21, 'Aparecida Cristina Godói', 'brenosaraiva.carvalho@gmail.com', '2023-08-30 19:30:23', '2023-08-30 19:30:36'),
	(22, 'Malena Gomes de Pacheco', 'fabrciaalbuquerque_batista49@bol.com.br', '2023-08-30 19:30:24', '2023-08-30 19:30:36'),
	(23, 'Camilo Assunção Filho', 'helenanogueira.oliveira@live.com', '2023-08-30 19:30:24', '2023-08-30 19:30:37'),
	(24, 'Maria de Jesus de Freitas Lima', 'mariadejesusde@bol.com.br', '2023-08-31 02:04:17', '2023-08-31 02:04:17');


-- Copiando estrutura para tabela agenda.contatos
CREATE TABLE IF NOT EXISTS `contatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `telefone` varchar(20) NOT NULL,
  `pessoas_id` int(11) NOT NULL DEFAULT 0,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__pessoas` (`pessoas_id`) USING BTREE,
  CONSTRAINT `FK__pessoas` FOREIGN KEY (`pessoas_id`) REFERENCES `pessoas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela agenda.contatos: ~21 rows (aproximadamente)
INSERT INTO `contatos` (`id`, `telefone`, `pessoas_id`, `created`, `modified`) VALUES
	(5, '(86) 89755-8574', 2, '2023-08-30 19:34:35', '2023-08-30 19:34:54'),
	(8, '(95) 85785-4878', 2, '2023-08-30 19:34:36', '2023-08-30 19:34:55'),
	(9, '(85) 96878-5888', 2, '2023-08-30 19:34:35', '2023-08-30 19:34:54'),
	(10, '(86) 95895-8999', 8, '2023-08-30 19:34:37', '2023-08-30 19:34:53'),
	(12, '(83) 93876-1222', 18, '2023-08-30 19:34:37', '2023-08-30 19:34:53'),
	(13, '(65) 93725-3774', 21, '2023-08-30 19:34:37', '2023-08-30 19:34:52'),
	(14, '(55) 92497-6563', 23, '2023-08-30 19:34:38', '2023-08-30 19:34:52'),
	(15, '(85) 93345-9465', 14, '2023-08-30 19:34:39', '2023-08-30 19:34:51'),
	(16, '(68) 93384-6981', 17, '2023-08-30 19:34:39', '2023-08-30 19:34:51'),
	(17, '(31) 93445-7251', 8, '2023-08-30 19:34:40', '2023-08-30 19:34:50'),
	(18, '(65) 93128-1554', 11, '2023-08-30 19:34:41', '2023-08-30 19:34:50'),
	(19, '(73) 92146-6665\r\n', 10, '2023-08-30 19:34:41', '2023-08-30 19:34:50'),
	(20, '(63) 93427-5860\r\n', 19, '2023-08-30 19:34:42', '2023-08-30 19:34:49'),
	(21, '(83) 93454-3864\r\n', 16, '2023-08-30 19:34:42', '2023-08-30 19:34:49'),
	(22, '(84) 92571-9364', 2, '2023-08-30 19:34:42', '2023-08-30 19:34:48'),
	(23, '(51) 92376-9349', 13, '2023-08-30 19:34:43', '2023-08-30 19:34:47'),
	(24, '(88) 93852-8620\r\n', 20, '2023-08-30 19:34:43', '2023-08-30 19:34:48'),
	(25, '(27) 93526-6818\r\n', 22, '2023-08-30 19:34:44', '2023-08-30 19:34:47'),
	(27, '(68) 93082-4868\r\n', 12, '2023-08-30 19:34:45', '2023-08-30 19:34:45');


-- Copiando estrutura para tabela agenda.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela agenda.users: ~4 rows (aproximadamente)
INSERT INTO `users` (`id`, `username`, `password`, `tipo`, `created`, `modified`) VALUES
	(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMINISTRADOR', '2023-08-30 19:29:27', '2023-08-31 02:25:06'),
	(2, 'bruno', '21232f297a57a5a743894a0e4a801fc3', 'ADMINISTRADOR', '2023-08-31 02:24:48', '2023-08-31 02:24:48'),
	(3, 'root', '21232f297a57a5a743894a0e4a801fc3', 'ADMINISTRADOR', '2023-09-06 18:21:55', '2023-09-06 18:21:55'),
	(4, 'ifma', '21232f297a57a5a743894a0e4a801fc3', 'ADMINISTRADOR', '2023-09-06 18:24:09', '2023-09-06 18:24:09');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
