/*
Navicat MySQL Data Transfer

Source Server         : localdb
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : cursolaravel

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-07-18 20:56:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `directores`
-- ----------------------------
DROP TABLE IF EXISTS `directores`;
CREATE TABLE `directores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of directores
-- ----------------------------
INSERT INTO `directores` VALUES ('1', 'Steven Spilverg', '2018-07-12 20:40:47', '2018-07-12 20:40:47');
INSERT INTO `directores` VALUES ('2', 'Antonio del Toro', '2018-07-12 20:41:03', '2018-07-12 20:41:03');
INSERT INTO `directores` VALUES ('4', 'Perico Perez', '2018-07-12 20:45:46', '2018-07-12 20:45:46');

-- ----------------------------
-- Table structure for `director_pelicula`
-- ----------------------------
DROP TABLE IF EXISTS `director_pelicula`;
CREATE TABLE `director_pelicula` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pelicula_id` int(10) unsigned NOT NULL,
  `director_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `director_pelicula_pelicula_id_foreign` (`pelicula_id`),
  KEY `director_pelicula_director_id_foreign` (`director_id`),
  CONSTRAINT `director_pelicula_director_id_foreign` FOREIGN KEY (`director_id`) REFERENCES `directores` (`id`) ON DELETE CASCADE,
  CONSTRAINT `director_pelicula_pelicula_id_foreign` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of director_pelicula
-- ----------------------------
INSERT INTO `director_pelicula` VALUES ('1', '4', '2', '2018-07-18 20:07:58', '2018-07-18 20:07:58');
INSERT INTO `director_pelicula` VALUES ('2', '4', '4', '2018-07-18 20:07:58', '2018-07-18 20:07:58');
INSERT INTO `director_pelicula` VALUES ('3', '5', '1', '2018-07-18 20:47:46', '2018-07-18 20:47:46');

-- ----------------------------
-- Table structure for `generos`
-- ----------------------------
DROP TABLE IF EXISTS `generos`;
CREATE TABLE `generos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `genero` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of generos
-- ----------------------------
INSERT INTO `generos` VALUES ('1', 'Accion', '2018-07-05 20:44:25', '2018-07-05 20:44:25');
INSERT INTO `generos` VALUES ('2', 'Drama', '2018-07-12 20:13:19', '2018-07-12 20:13:19');
INSERT INTO `generos` VALUES ('3', 'Infantil', '2018-07-12 20:13:43', '2018-07-12 20:15:44');
INSERT INTO `generos` VALUES ('4', 'Terror', '2018-07-12 20:14:16', '2018-07-12 20:14:16');

-- ----------------------------
-- Table structure for `imagenes`
-- ----------------------------
DROP TABLE IF EXISTS `imagenes`;
CREATE TABLE `imagenes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelicula_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `imagenes_pelicula_id_foreign` (`pelicula_id`),
  CONSTRAINT `imagenes_pelicula_id_foreign` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of imagenes
-- ----------------------------
INSERT INTO `imagenes` VALUES ('1', 'cinema_1531961266.jpg', '5', '2018-07-18 20:47:46', '2018-07-18 20:47:46');

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('5', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('6', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('7', '2018_07_03_204653_create_generos_table', '1');
INSERT INTO `migrations` VALUES ('8', '2018_07_04_195650_create_peliculas_table', '1');
INSERT INTO `migrations` VALUES ('9', '2018_07_04_204919_create_directores_table', '2');
INSERT INTO `migrations` VALUES ('10', '2018_07_05_194743_create_imagenes_table', '3');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `peliculas`
-- ----------------------------
DROP TABLE IF EXISTS `peliculas`;
CREATE TABLE `peliculas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo` double(8,2) NOT NULL,
  `resumen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `estreno` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `genero_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `peliculas_genero_id_foreign` (`genero_id`),
  KEY `peliculas_user_id_foreign` (`user_id`),
  CONSTRAINT `peliculas_genero_id_foreign` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `peliculas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of peliculas
-- ----------------------------
INSERT INTO `peliculas` VALUES ('1', 'Transformers', '45.00', 'Pelicula de accion', '2018-07-05', '2018-07-05 20:49:10', '2018-07-05 20:49:10', '1', '1');
INSERT INTO `peliculas` VALUES ('3', 'Tiburon', '45.00', 'Resumen de la pelicula', '2018-07-11', '2018-07-18 20:01:19', '2018-07-18 20:01:19', '4', '1');
INSERT INTO `peliculas` VALUES ('4', 'El señor los anillos', '75.00', 'Resumen del señor de los anillos', '2018-07-19', '2018-07-18 20:07:58', '2018-07-18 20:07:58', '1', '1');
INSERT INTO `peliculas` VALUES ('5', 'Anabel', '65.00', 'resumen anabel', '2018-09-26', '2018-07-18 20:47:46', '2018-07-18 20:47:46', '4', '1');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('member','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Juan Perez', 'juan@gmail.com', '$2y$10$thBhkKFmBpv7RJByhbNxOO5Ps9dTnz/3Fztqe7FSnIqJQQCx.HkLq', 'member', 'gPt2TVqJITzKops71giVsBvrdjOPifaROxgPVfB3W7BIOUEYHWZ7tpZ3BSjw', '2018-07-05 20:12:48', '2018-07-05 20:12:48');
INSERT INTO `users` VALUES ('3', 'pedro', 'pedro@gmail.com', '$2y$10$XPR7xBFifkQbZ80QDwOpleSWItvz2YXknyXVNNVupNZyGj3YW0AGK', 'member', null, '2018-07-09 20:02:19', '2018-07-09 20:02:19');
INSERT INTO `users` VALUES ('5', 'Maria', 'maria@gmail.com', '$2y$10$BEa/pjk8WQ4Y.ONmZuQg3.zlQUbUjlfYjXMM6LLjKIfM8PrN69NPK', 'admin', null, '2018-07-09 20:03:07', '2018-07-09 20:03:07');
INSERT INTO `users` VALUES ('6', 'Marcos', 'marcos@gmail.com', '$2y$10$pUr0T63sd0oph7rhKdi8yusYwhTyk2cP6eDtogpMeTfx/JCYJIV4O', 'admin', null, '2018-07-09 20:03:35', '2018-07-09 20:03:35');
INSERT INTO `users` VALUES ('7', 'Ivan', 'ivan@gmail.com', '$2y$10$xDltHl1Jrwj3VRWMVz9kxOhWh5Oro16l0wwMM21JqqzTv6.SPQtgS', 'admin', null, '2018-07-10 19:52:36', '2018-07-10 19:52:36');
INSERT INTO `users` VALUES ('9', 'Armando', 'armando@gmail.com', '$2y$10$rjCRvYfrJ/7bX5cq5N79/.fA.si5IEo2veVdafEtPi8I3tEogOSRu', 'admin', null, '2018-07-10 19:57:43', '2018-07-10 19:57:43');
INSERT INTO `users` VALUES ('10', 'Alexis', 'alexisemail', '$2y$10$MCsw/w1wuNGQV5AJp5UEq.ASmn8DcksaOQK9rPC8atD4fiTkk6132', 'member', null, '2018-07-10 20:01:18', '2018-07-10 20:01:18');
INSERT INTO `users` VALUES ('11', 'A', 'asdf', '$2y$10$OT2o1h7W7kZcHQAbK/dFF.ji9q.cyTJMBRfjQjREuG5nuWUmm77KK', 'admin', null, '2018-07-11 20:07:32', '2018-07-11 20:07:32');
